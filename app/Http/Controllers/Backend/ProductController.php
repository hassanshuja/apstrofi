<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Skus;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\ProductAttributeValue;
use Image;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class ProductController extends Controller{

    public function index()
    {
        $brand = Brand::where('status',1)->pluck('name','id');
        $colors = AttributeValue::where('attribute_id',2)->pluck('name','id');
        $subcategory = Category::whereNull('parent_id')->pluck('name','id');
        $query = Product::query();
        $data = request()->all();
        if(isset($data['name']) && $data['name'] != ''){
            $query = $query->where('name','like',"%" .$data['name']. "%");
        }
        if(isset($data['status']) && $data['status'] != ''){
            $query = $query->where('status',$data['status']);
        }

        $result = $query->latest('created_at')->with('product_images')->paginate(18);
        if(!empty($result)){
            foreach ($result as $key=>$val){
                if(!empty($val['product_images'])){
                    $result[$key]['preview_url'] = @$val['product_images'][0]['thumb_image_url'] && file_exists($val['product_images'][0]['thumb_image_url']) ? $val['product_images'][0]['thumb_image_url'] : url('images/notAvailable.png');
                }

            }
        }
        if (request()->ajax()) {
            return view('backend.product.list-ajax', ['data' => $result])->render();
        }
        return view('backend.product.index', ['page_title' => 'Product Management','brand'=>$brand,'colors'=>$colors,'subcategory'=>$subcategory,'data'=>$result]);
    }

    public function selectCategory(){

        $category = Category::where('status',1)->with('parent')->orderBy('category_id')->get(['name','id','parent_id']);
        $categoryArray = [];
        $i = 0;
        foreach ($category as $key=>$val){
            $categoryArray[$i]['text'] = $val['parent']['name']." (".$val['name'].")" ;
            $categoryArray[$i]['value'] = $val['id'];
            $i++;
        }
        return response()->json(['status'=>true,'category'=>$categoryArray]);
    }

    public function create(){
        $brand = Brand::where('status',1)->pluck('name','id');
        $colors = AttributeValue::where('attribute_id',2)->pluck('name','id');
        $category = Category::where('status',1)->whereNotNull('parent_id')->with('parent','shops')->orderBy('parent_id')->get(['name','id','parent_id']);
        $tag = Tag::where('status',1)->pluck('title','id');
        $products = Product::groupBy('modal')->pluck('modal');
        $categoryArray = [];
        $i = 0;
        foreach ($category as $key=>$val){
            $categoryArray[$i]['text'] = $val['parent']['name']." (".$val['name'].")"." (".implode(',',array_pluck($val['shops'],'name')) .")";
            $categoryArray[$i]['value'] = $val['id'];
            $i++;
        }
        return view('backend.product.add', ['page_title' => 'Product Management','brand'=>$brand,'colors'=>$colors,'subcategory'=>$categoryArray,'tags'=>$tag,'products'=>$products]);
    }
    public function store()
    {
        $data = request()->all();
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'price'=> 'required|numeric',
            'sku' => 'required|unique:products,sku,NULL,id,deleted_at,NULL'
        ]);

        if($data['product_group'] != ''){
            $data['modal'] = $data['product_group'];
        }
        if(!isset($data['is_featured'])){
            $data['is_featured'] = 0;
        }
        if(!isset($data['status'])){
            $data['status'] = 0;
        }
        if(!isset($data['is_new_arrival'])){
            $data['is_new_arrival'] = 0;
        }
        if(!isset($data['is_sustainable'])){
            $data['is_sustainable'] = 0;
        }
        $data['slug'] = str_slug(trim($data['name']).'-'.$data['sku']);
        $record = Product::create($data);
        if(@$data['tag_id'] && !empty($data['tag_id'])){

            $record->tags()->sync($data['tag_id']);
        }
        if(request()->hasFile('image')) {
            $files = request()->file('image');
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
                $image_url = $file->storePubliclyAs('images/product/'.$record['id'], $filenametostore);
                $thumbnail_image_url = $file->storePubliclyAs('images/product/thumbnail/'.$record['id'], $smallthumbnail);
                /*$files->storePubliclyAs('images/profile_images/thumbnail', $mediumthumbnail);
                $files->storePubliclyAs('images/profile_images/thumbnail', $largethumbnail);*/

                //create small thumbnail
                $smallthumbnailpath = public_path('storage/images/product/thumbnail/'.$record['id'].'/'.$smallthumbnail);
                $this->createThumbnail($smallthumbnailpath, 112, 168);

                /*//create medium thumbnail
                $mediumthumbnailpath = public_path('storage/images/product/thumbnail/'.$mediumthumbnail);
                $this->createThumbnail($mediumthumbnailpath, 300, 185);

                //create large thumbnail
                $largethumbnailpath = public_path('storage/images/product/thumbnail/'.$largethumbnail);
                $this->createThumbnail($largethumbnailpath, 550, 340);*/

                if($flag){
                    $lastOrderBy = ProductImages::where('product_id',$record['id'])->orderBy('created_at','DESC')->value('order_by');
                }


                if($lastOrderBy != ''){
                    $lastOrderBy = $lastOrderBy+1;
                    $orderBy = $lastOrderBy;
                    $flag = false;
                }
                ProductImages::create(['image_url'=>'storage/'.$image_url,'thumb_image_url'=>'storage/'.$thumbnail_image_url,'product_id'=>$record['id'],'order_by'=>$orderBy]);
            }

        }
        return response()->json(['status'=>true,'msg'=>'Record Added Successfully.','url'=>route('admin.product.index')]);
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function listAjax(){


    }

    public function listAjax1(){

        $request = request()->all();
        $data = [];
        $return_data = [];
        $query = new Product();
        $sortColumn = array('name','','brand_id','status');
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
        $records = $query->with('product_subcategories','product_brand')->skip($iDisplayStart)->take($iDisplayLength)->get();
        foreach ($records as $key=>$val){
            $index = 0;
            $data[$key]['name'] = $val['name'];
            $data[$key]['category'] = $val['product_subcategories']['name'];
            $data[$key]['brand'] = $val['product_brand']['name'];
            $data[$key]['status'] = $val['status_val'];
            $action = '<div class="actions"><a class="btn btn-warning btn-sm"  href="'.route('admin.product.edit',$val['id']).'">Edit</a> <a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class="delete-data btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="'.$key.'" data-action="'.route('admin.product.delete',$val['id']).'">Delete  </a></div>';
            $data[$key]['action'] = $action;
            $return_data[$key] = $val;
        }
        $records["aaData"] = $data;
        $records["record_data"] = $return_data;
        $records["sEcho"] = $sEcho;
        $records["iTotalDisplayRecords"] = $iTotalRecords;
        $records["iTotalRecords"] = $iTotalRecords;

        return response()->json($records);
    }

    public function changeStatus(){
        $request = request()->all();
        Product::where('id',$request['id'])->update(['status'=>$request['status']]);
        return response()->json(true);
    }

    public function update($id){
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'price'=> 'required|numeric',
            'sku' => 'required|unique:products,sku,'.$id.',id,deleted_at,NULL'
        ]);
        $data = request()->only(['name','name_l','modal','meta_title','meta_keywords','meta_description','description','description_l','sizing_detail','sizing_detail_l','shipping_return_detail','shipping_return_detail_l','brand_id','category_id','sizing_gender','weight','stock_availability','is_featured','is_new_arrival','is_sustainable','status','merchant_id','sizing_gender','sizing_type','sku','attribute_value_color_id','attribute_value_size_id','total_qty','price','sale_price','slug']);


        if(!isset($data['is_featured'])){
            $data['is_featured'] = 0;
        }
        if(!isset($data['status'])){
            $data['status'] = 0;
        }
        if(!isset($data['is_new_arrival'])){
            $data['is_new_arrival'] = 0;
        }
        if(!isset($data['is_sustainable'])){
            $data['is_sustainable'] = 0;
        }
        $record = Product::find($id);
        $data['slug'] = str_slug(trim($data['name']).'-'.$data['sku']);
        $record->update($data);
        //$data['subcategory_id'] = array_filter($data['subcategory_id']);
        if(@$data['tag_id'] && !empty($data['tag_id'])){

            $record->tags()->sync($data['tag_id']);
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
                $image_url = $file->storePubliclyAs('images/product/'.$record['id'], $filenametostore);
                $thumbnail_image_url = $file->storePubliclyAs('images/product/thumbnail/'.$record['id'], $smallthumbnail);
                /*$files->storePubliclyAs('images/profile_images/thumbnail', $mediumthumbnail);
                $files->storePubliclyAs('images/profile_images/thumbnail', $largethumbnail);*/

                //create small thumbnail
                $smallthumbnailpath = public_path('storage/images/product/thumbnail/'.$record['id'].'/'.$smallthumbnail);
                $this->createThumbnail($smallthumbnailpath, 112, 168);

                /*//create medium thumbnail
                $mediumthumbnailpath = public_path('storage/images/product/thumbnail/'.$mediumthumbnail);
                $this->createThumbnail($mediumthumbnailpath, 300, 185);

                //create large thumbnail
                $largethumbnailpath = public_path('storage/images/product/thumbnail/'.$largethumbnail);
                $this->createThumbnail($largethumbnailpath, 550, 340);*/
                if($flag){
                    $lastOrderBy = ProductImages::where('product_id',$record['id'])->orderBy('created_at','DESC')->value('order_by');
                }


                if($lastOrderBy != ''){
                    $lastOrderBy = $lastOrderBy+1;
                    $orderBy = $lastOrderBy;
                    $flag = false;
                }
                ProductImages::create(['image_url'=>'storage/'.$image_url,'thumb_image_url'=>'storage/'.$thumbnail_image_url,'product_id'=>$record['id'],'order_by'=>$orderBy]);
            }



        }
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.']);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }

    public function edit($id){
        $product = Product::where('id',$id)->with('product_images','tags')->first()->toArray();
        $brand = Brand::where('status',1)->pluck('name','id');
        $colors = AttributeValue::where('attribute_id',2)->pluck('name','id');
        $sizes = AttributeValue::where('attribute_id',1)->pluck('name','id');

        $sized = ProductAttributeValue::where('product_id', $id)
        ->leftJoin('attribute_values', 'attribute_values.id', '=', 'product_attribute_value.attribute_value_size_id')
        ->select('attribute_values.name', 'attribute_values.name_l', 'product_attribute_value.*')
        ->get();

        $product['tag_id'] = !empty($product['tags']) ? array_pluck($product['tags'],'id'):[];
        //$product['category_id'] = !empty($product['product_categories']) ? Arr::pluck($product['product_categories'],  'id') : [];
        $category = Category::whereNotNull('parent_id')->where('status',1)->with('parent','shops')->orderBy('parent_id')->get(['name','id','parent_id']);
        $tag = Tag::where('status',1)->pluck('title','id');
        $products = Product::groupBy('modal')->pluck('modal');
        $categoryArray = [];
        $i = 0;
        foreach ($category as $key=>$val){
            $categoryArray[$i]['text'] = $val['parent']['name']." (".$val['name'].")"." (".implode(',',array_pluck($val['shops'],'name')) .")";
            $categoryArray[$i]['value'] = $val['id'];
            $i++;
        }

        return view('backend.product.edit', ['page_title' => 'Product Management', 'sized' => $sized, 'brand'=>$brand,'colors'=>$colors,'product'=>$product,'subcategory'=>$categoryArray,'tags'=>$tag,'products'=>$products, 'sizes' => $sizes]);
    }



    public function deleteImage($id)
    {
        $image = ProductImages::find($id);
        $productImage = str_replace('/storage', '', $image->image_url);
        $productImage = str_replace('/storage', '', $image->image_url);

        Storage::delete('/public' . $productImage);
        $image->delete();

        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }

    public function listImages($id){
        $request = request()->all();
        $image = ProductImages::where('product_id',$id)->select([
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
data-placement="top" href="javascript:void(0);" data-title="delete"  class="delete-data btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="'.$key.'" data-action="'.route('admin.product.delete-image',$val['id']).'" data-id="'.$val["id"] .'">Delete </a></div>'; /**/
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

    public function updateProductImageOrder(){
        $request = request()->all();
        if(!empty($request['seqs'])){
            foreach ($request['seqs'] as $key=>$val){
               ProductImages::where('id',$val['id'])->update(['order_by'=>$val['new_seq']]);
            }
        }
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.']);
    }

    public function add_sizes(Request $request) {
        // dd($request->all());
       //$check_record = ProductAttributeValue::findOrNew($request->product_id);
       $check_record =  ProductAttributeValue::updateOrCreate(
                        ['attribute_value_size_id' => $request->attribute_value_size_id,
                        'product_id' => $request->product_id, 
                        ] , $request->all());
        
       $getRecords = ProductAttributeValue::where('product_id', $request->product_id)
                    ->leftJoin('attribute_values', 'attribute_values.id', '=', 'product_attribute_value.attribute_value_size_id')
                    ->select('attribute_values.name', 'attribute_values.name_l', 'product_attribute_value.*')
                    ->get()->toArray();

        return \response()->json($getRecords);

   }

   public function delete_size($id)
    {
        $delete_size = ProductAttributeValue::find($id);
        $product_id = $delete_size->product_id;

        $delete_size->delete();

        $getRecords = ProductAttributeValue::where('product_id', $product_id)
                    ->leftJoin('attribute_values', 'attribute_values.id', '=', 'product_attribute_value.attribute_value_size_id')
                    ->select('attribute_values.name', 'attribute_values.name_l', 'product_attribute_value.*')
                    ->get()->toArray();

        return response()->json($getRecords);
    }
}

