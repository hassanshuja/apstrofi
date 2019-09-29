<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Shop;

class ShopController extends Controller{

    public function index()
    {
        return view('backend.shop.index', ['page_title' => 'Gender Management']);
    }

    public function listAjax(){

        $request = request()->all();
        $data = [];
        $return_data = [];
        $query = new Shop();
        $sortColumn = array('code','name','','','status');
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
            $data[$key]['code'] = $val['code'];
            $data[$key]['name'] = $val['name'];
            $data[$key]['photo'] = $val['image'];
            $data[$key]['note'] = $val['note'];
            $data[$key]['status'] = $val['status_val'];
            $action = '<div class="actions"><a class="edit btn btn-warning btn-sm" data-toggle="modal" data-modal="#kt_table_1" data-type="edit"  data-key="'.$key.'" data-action="'.route('admin.shop.update',$val['id']).'"   href="#add">Edit</a> <a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class="delete-data btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="'.$key.'" data-action="'.route('admin.shop.delete',$val['id']).'">Delete  </a></div>'; /**/
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
            'name' => 'required|string|max:255',
            'code' => 'required|unique:shops,code,NULL,id,deleted_at,NULL'
        ]);
        $image_url = '';
        if ( request()->hasFile('image')){
            if (request()->file('image')->isValid()){
                $file_url = request()->file('image')->storePubliclyAs('images/shop',request()->file('image')->getClientOriginalName());
                $image_url = 'storage/'.$file_url;
            }
        }
        $data['image_url'] = $image_url;

        Shop::create($data);
        return response()->json(['status'=>true,'msg'=>'Record Added Successfully.']);
    }
    public function changeStatus(){
        $request = request()->all();
        Shop::where('id',$request['id'])->update(['status'=>$request['status']]);
        return response()->json(true);
    }

    public function update($id){
        $data = request()->all();
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'code' => 'required|unique:shops,code,'.$id.',id,deleted_at,NULL'
        ]);
        $record = Shop::find($id);
        if ( request()->hasFile('image')){
            if (request()->file('image')->isValid()){
                $file_url = request()->file('image')->storePubliclyAs('images/shop',request()->file('image')->getClientOriginalName());
                $image_url = 'storage/'.$file_url;
                $record->image_url =$image_url;
            }
        }
        $record->name = $data['name'];
        $record->name_l = $data['name_l'];
        $record->code = $data['code'];
        $record->note = $data['note'];
        $record->save();
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.']);
    }

    public function destroy($id)
    {
        Shop::destroy($id);
        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }
}