<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller{

    public function index()
    {
        return view('backend.tag.index', ['page_title' => 'Tags Management']);
    }

    public function listAjax(){

        $request = request()->all();
        $data = [];
        $return_data = [];
        $query = new Tag();
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
        $records = $query->skip($iDisplayStart)->take($iDisplayLength)->get();
        foreach ($records as $key=>$val){
            $index = 0;
            $none = '';
            $men = '';
            $women = '';
            $data[$key]['title'] = $val['title'];
            $data[$key]['title_l'] = $val['title_l'];
            $data[$key]['image'] = $val['image'];

            if($val['sizing_gender'] == 'NONE'){
                $none = 'selected';
            }elseif($val['sizing_gender'] == 'MEN'){
                $men = 'selected';
            }elseif($val['sizing_gender'] == 'WOMEN'){
                $women = 'selected';
            }

            $data[$key]['sizing_gender'] = '<div >
            <select class="change_status form-control m-select2 select2-hidden-accessible" id="sizing_gender" name="sizing_gender"  data-action="'.route("admin.tag.change-gender").'" data-id="'.$val['id'].'" tabindex="-1" aria-hidden="true" >
            <option value="NONE" data-select2-id="NONE" '.$none.'>NONE</option>
            <option value="MEN" data-select2-id="MEN" '.$men.' >MEN</option>
            <option value="WOMEN" data-select2-id="WOMEN" '.$women.' > WOMEN</option></select></div>';
            // '<select class="form-control m-select2 select2-hidden-accessible" id="sizing_gender" name="sizing_gender" data-select2-id="'+$val['id']+'" tabindex="-1" aria-hidden="true"><option value="NONE" data-select2-id="NONE">NONE</option><option value="MEN" data-select2-id="MEN">MEN</option><option value="WOMEN" data-select2-id="WOMEN">WOMEN</option></select>';
            $data[$key]['home_style'] = $val['home_style'];
            $data[$key]['status'] = $val['status_val'];
            $action = '<div class="actions"><a class="edit btn btn-warning btn-sm" data-toggle="modal" data-modal="#kt_table_1" data-type="edit"  data-key="'.$key.'" data-action="'.route('admin.tag.update',$val['id']).'"   href="#add">Edit</a> <a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class="delete-data btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="'.$key.'" data-action="'.route('admin.tag.delete',$val['id']).'">Delete </a></div>'; /**/
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

    public function store(){
        $data = request()->all();
        $this->validate(request(),[
            'title' => 'required|string|max:255'
        ]);
        $data['slug'] = str_slug($data['title']);
        $record = Tag::create($data);
        if(request()->hasFile('image')) {
            $file = request()->file('image');
            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $file->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $image_url = $file->storePubliclyAs('images/tag/'.$record['id'], $filenametostore);
            $record->image_url = 'storage/'.$image_url;
            $record->save();
        }
        return response()->json(['status'=>true,'msg'=>'Record Added Successfully.']);
    }
    public function changeStatus(){
        $request = request()->all();
        Tag::where('id',$request['id'])->update(['status'=>$request['status']]);
        return response()->json(true);
    }

    public function changegender(){
        $request = request()->all();
        Tag::where('id',$request['id'])->update(['sizing_gender'=>$request['status']]);
        return response()->json(true);
    }

    public function update($id){
        $data = request()->all();
        $this->validate(request(),[
            'title' => 'required|string|max:255'
        ]);
        $record = Tag::find($id);
        $record->title = $data['title'];
        $record->title_l = $data['title_l'];
        $record->slug = str_slug($data['title']);
        if(request()->hasFile('image')) {
            $file = request()->file('image');
            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $file->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $image_url = $file->storePubliclyAs('images/tag/'.$record['id'], $filenametostore);
            $record->image_url = 'storage/'.$image_url;
        }
        $record->save();
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.']);
    }

    public function destroy($id)
    {
        Tag::destroy($id);
        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }

    public function changeHomeStyle(){
        $request = request()->all();
        Tag::where('id',$request['id'])->update(['is_home_style'=>$request['status']]);
        return response()->json(true);
    }

    public function menTags(){

        $tags = Tag::where('status', 1)
                    ->where('is_home_style', 1)
                    ->whereIn('sizing_gender', ['MEN', 'NONE'])
                    ->get()->toArray();
        

        return \response()->json($tags);
    }

    public function womenTags() {
        $tags = Tag::where('status', 1)
                    ->where('is_home_style', 1)
                    ->whereIn('sizing_gender', ['WOMEN', 'NONE'])
                    ->get()->toArray();
        

        return \response()->json($tags);
    }
}