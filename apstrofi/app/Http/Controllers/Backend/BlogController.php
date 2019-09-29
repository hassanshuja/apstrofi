<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImages;
use App\Models\BlogProducts;
use App\Models\Product;
use Image;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller{

    public function index()
    {
        $products = Product::where('status',1)->pluck('name','id');
        $category = BlogCategory::where('status',1)->pluck('name','id');
        return view('backend.blog.index', ['page_title' => 'Blog Management','products'=>$products,'category'=>$category]);
    }

    public function listAjax(){

        $request = request()->all();
        $data = [];
        $return_data = [];
        $query = new Blog();
        $sortColumn = array('title','title_l','status');
        $sort_order = $request['order']['0']['dir'];
        $order_field = $sortColumn[$request['order']['0']['column']];
        if($order_field != ''){
            if($sort_order == 'asc') {
                $query = $query->orderBy($order_field, 'ASC');
            }else{
                $query = $query->orderBy($order_field, 'DESC');
            }
        }
        foreach ($request['columns'] as $key=>$val){
            if (trim($val['search']['value']) != '') {
                $query = $query->where($val['data'],'like',"%" .$val['search']['value']. "%");
            }
        }
        $iTotalRecords = $query->count();
        $iDisplayLength = intval($request['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($request['start']);
        $sEcho = intval($request['draw']);
        $records = $query->with('products','blog_images')->skip($iDisplayStart)->take($iDisplayLength)->get();
        foreach ($records as $key=>$val){
            $index = 0;
            $data[$key]['title'] = $val['title'];
            $data[$key]['title_l'] = $val['title_l'];
            $data[$key]['status'] = $val['status_val'];
            $action = '<div class="actions"><a class="edit btn btn-warning btn-sm" data-toggle="modal" data-modal="#kt_table_1" data-type="edit"  data-key="'.$key.'" data-action="'.route('admin.blog.update',$val['id']).'"   href="#add">Edit</a> <a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class="delete-data btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="'.$key.'" data-action="'.route('admin.blog.delete',$val['id']).'">Delete </a> <a class="btn btn-primary btn-sm" data-toggle="modal" data-modal="#kt_table_1"   data-key="'.$key.'" data-action="'.route('admin.blog.list-images',$val['id']).'"   href="#view-images">View images</a></div>'; /**/
            $data[$key]['action'] = $action;
            $return_data[$key] = $val;
            $return_data[$key]['product_id'] = !empty($val['products']) ?  array_pluck($val['products'],'id') : [];
        }
        $records["aaData"] = $data;
        $records["record_data"] = $return_data;
        $records["sEcho"] = $sEcho;
        $records["iTotalDisplayRecords"] = $iTotalRecords;
        $records["iTotalRecords"] = $iTotalRecords;

        return response()->json($records);
    }

    public function store(){
        $data = request()->all();
        $this->validate(request(),[
            'title' => 'required|string|max:255',
            'title_l' => 'required|string|max:255'
        ]);
        $data['slug'] = str_slug(trim($data['title']));
        $record = Blog::create($data);
        if(@$data['product_id'] && !empty($data['product_id'])){

            $record->products()->sync($data['product_id']);
        }

        if(request()->hasFile('image')) {
            $files = request()->file('image');
            $images_array = [];
            $orderBy = 1;
            $flag= true;
            $lastOrderBy = '';
            foreach($files as $key=>$file){
                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $file->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;

                //small thumbnail name
                $smallthumbnail = $filename.'_small_'.time().'.'.$extension;

                /*//medium thumbnail name
                $mediumthumbnail = $filename.'_medium_'.time().'.'.$extension;

                //large thumbnail name
                $largethumbnail = $filename.'_large_'.time().'.'.$extension;*/

                //Upload File
                $image_url = $file->storePubliclyAs('images/blog/'.$record['id'], $filenametostore);
                $thumbnail_image_url = $file->storePubliclyAs('images/blog/thumbnail/'.$record['id'], $smallthumbnail);
                /*$files->storePubliclyAs('images/profile_images/thumbnail', $mediumthumbnail);
                $files->storePubliclyAs('images/profile_images/thumbnail', $largethumbnail);*/

                //create small thumbnail
                $smallthumbnailpath = public_path('storage/images/blog/thumbnail/'.$record['id'].'/'.$smallthumbnail);
                $this->createThumbnail($smallthumbnailpath, 150, 93);

                /*//create medium thumbnail
                $mediumthumbnailpath = public_path('storage/images/product/thumbnail/'.$mediumthumbnail);
                $this->createThumbnail($mediumthumbnailpath, 300, 185);

                //create large thumbnail
                $largethumbnailpath = public_path('storage/images/product/thumbnail/'.$largethumbnail);
                $this->createThumbnail($largethumbnailpath, 550, 340);*/

                if($flag){
                    $lastOrderBy = BlogImages::where('blog_id',$record['id'])->orderBy('created_at','DESC')->value('order_by');
                }


                if($lastOrderBy != ''){
                    $lastOrderBy = $lastOrderBy+1;
                    $orderBy = $lastOrderBy;
                    $flag = false;
                }
                BlogImages::create(['image_url'=>'storage/'.$image_url,'thumb_image_url'=>'storage/'.$thumbnail_image_url,'blog_id'=>$record['id'],'order_by'=>$orderBy]);
            }



        }
        return response()->json(['status'=>true,'msg'=>'Record Added Successfully.']);
    }
    public function changeStatus(){
        $request = request()->all();
        Blog::where('id',$request['id'])->update(['status'=>$request['status']]);
        return response()->json(true);
    }

    public function update($id){
        $data = request()->all();
        $this->validate(request(),[
            'title' => 'required|string|max:255'
        ]);
        $data = request()->only(['blog_category_id','author','author_l','title','title_l','subtitle','subtitle_l','slug','description','description_l','status']);
        $data['slug'] = str_slug(trim($data['title']));
        $record = Blog::find($id);
        $record->update($data);
        if(@$data['product_id'] && !empty($data['product_id'])){

            $record->products()->sync($data['product_id']);
        }

        if(request()->hasFile('image')) {
            $files = request()->file('image');
            $images_array = [];
            $orderBy = 1;
            $flag= true;
            $lastOrderBy = '';
            foreach($files as $key=>$file){
                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $file->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;

                //small thumbnail name
                $smallthumbnail = $filename.'_small_'.time().'.'.$extension;

                /*//medium thumbnail name
                $mediumthumbnail = $filename.'_medium_'.time().'.'.$extension;

                //large thumbnail name
                $largethumbnail = $filename.'_large_'.time().'.'.$extension;*/

                //Upload File
                $image_url = $file->storePubliclyAs('images/blog/'.$record['id'], $filenametostore);
                $thumbnail_image_url = $file->storePubliclyAs('images/blog/thumbnail/'.$record['id'], $smallthumbnail);
                /*$files->storePubliclyAs('images/profile_images/thumbnail', $mediumthumbnail);
                $files->storePubliclyAs('images/profile_images/thumbnail', $largethumbnail);*/

                //create small thumbnail
                $smallthumbnailpath = public_path('storage/images/blog/thumbnail/'.$record['id'].'/'.$smallthumbnail);
                $this->createThumbnail($smallthumbnailpath, 150, 93);

                /*//create medium thumbnail
                $mediumthumbnailpath = public_path('storage/images/product/thumbnail/'.$mediumthumbnail);
                $this->createThumbnail($mediumthumbnailpath, 300, 185);

                //create large thumbnail
                $largethumbnailpath = public_path('storage/images/product/thumbnail/'.$largethumbnail);
                $this->createThumbnail($largethumbnailpath, 550, 340);*/



                if($flag){
                    $lastOrderBy = BlogImages::where('blog_id',$record['id'])->orderBy('created_at','DESC')->value('order_by');
                }


                if($lastOrderBy != ''){
                    $lastOrderBy = $lastOrderBy+1;
                    $orderBy = $lastOrderBy;
                    $flag = false;
                }
                BlogImages::create(['image_url'=>'storage/'.$image_url,'thumb_image_url'=>'storage/'.$thumbnail_image_url,'blog_id'=>$record['id'],'order_by'=>$orderBy]);
            }



        }
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.']);
    }

    public function destroy($id)
    {
        Blog::destroy($id);
        BlogImages::where('blog_id',$id)->delete();
        BlogProducts::where('blog_id',$id)->delete();
        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }
    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
    public function viewImages($id){
        $blogImages = BlogImages::where('blog_id',$id)->pluck('thumb_image_url','id');
        $responseHtml = view('backend.blog.images',['images'=>$blogImages])->render();
        return response()->json(['status'=>true,'html'=>$responseHtml]);
    }
    public function deleteImage($id)
    {
        $image = BlogImages::find($id);
        $productImage = str_replace('/storage', '', $image->image_url);
        $productImage = str_replace('/storage', '', $image->image_url);

        Storage::delete('/public' . $productImage);
        $image->delete();

        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }

    public function listImages($id){
        $request = request()->all();
        $image = BlogImages::where('blog_id',$id)->select([
            'id',
            'image_url','thumb_image_url','order_by'
        ])->orderBy('order_by','ASC')->get();
        $iTotalRecords = $image->count();
        $iDisplayLength = 0;
        $sEcho = 1;
        $records = [];
        $return_data = [];
        $data = [];
        $index = 1;
        foreach ($image as $key=>$val){

            $data[$key]['order'] = $index;
            $data[$key]['image'] = $val['image'];
            $action = '<div class="actions" data-id="'.$val["id"].'_'.$val['order_by'].'"><a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class="delete-images btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="'.$key.'" data-action="'.route('admin.blog.delete-image',$val['id']).'" data-id="'.$val["id"] .'">Delete </a></div>'; /**/
            $data[$key]['action'] = $action;
            $return_data[$key] = $val;
            $index++;
        }
        $records["aaData"] = $data;
        $records["record_data"] = $return_data;
        $records["sEcho"] = $sEcho;
        $records["iTotalDisplayRecords"] = $iTotalRecords;
        $records["iTotalRecords"] = $iTotalRecords;
        return response()->json($records);
    }

    public function updateImageOrder(){
        $request = request()->all();
        if(!empty($request['seqs'])){
            foreach ($request['seqs'] as $key=>$val){
                BlogImages::where('id',$val['id'])->update(['order_by'=>$val['new_seq']]);
            }
        }
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.']);
    }
}