<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller{

    public function index()
    {
        return view('backend.blog-category.index', ['page_title' => 'Blog Category Management']);
    }

    public function listAjax(){

        $request = request()->all();
        $data = [];
        $return_data = [];
        $query = new BlogCategory();
        $sortColumn = array('name','name_l','status');
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
            $data[$key]['name'] = $val['name'];
            $data[$key]['name_l'] = $val['name_l'];
            $data[$key]['status'] = $val['status_val'];
            $action = '<div class="actions"><a class="edit btn btn-warning btn-sm" data-toggle="modal" data-modal="#kt_table_1" data-type="edit"  data-key="'.$key.'" data-action="'.route('admin.blog-category.update',$val['id']).'"   href="#add">Edit</a> <a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class="delete-data btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="'.$key.'" data-action="'.route('admin.blog-category.delete',$val['id']).'">Delete  </a></div>'; /**/
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
            'name' => 'required|unique:blog_categories,name,NULL,id,deleted_at,NULL'
        ]);

        $data['slug']= str_slug($data['name']);
        BlogCategory::create($data);
        return response()->json(['status'=>true,'msg'=>'Record Added Successfully.']);
    }
    public function changeStatus(){
        $request = request()->all();
        BlogCategory::where('id',$request['id'])->update(['status'=>$request['status']]);
        return response()->json(true);
    }

    public function update($id){
        $data = request()->all();
        $this->validate(request(),[
            'name' => 'required|unique:blog_categories,name,'.$id.',id,deleted_at,NULL'
        ]);
        $record = BlogCategory::find($id);
        $record->name = $data['name'];
        $record->name_l = $data['name_l'];
        $record->slug = str_slug($data['name']);
        $record->save();
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.']);
    }

    public function destroy($id)
    {
        BlogCategory::destroy($id);
        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }
}