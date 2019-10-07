<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\PromoCode;

class PromoCodeController extends Controller{

    public function index()
    {
        return view('backend.promo.index', ['page_title' => 'Promo Code Management']);
    }

    public function listAjax(){

        $request = request()->all();
        $data = [];
        $return_data = [];
        $query = new PromoCode();
        $sortColumn = array('code','type','','','start_at','end_at','status');
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
            $data[$key]['type'] = $val['type'];
            $data[$key]['value'] = $val['value'];
            $data[$key]['description'] = $val['description'];
            $data[$key]['start_at'] = $val['start_at'];
            $data[$key]['end_at'] = $val['end_at'];
            $data[$key]['status'] = $val['status_val'];
            $action = '<div class="actions"><a class="edit btn btn-warning btn-sm" data-toggle="modal" data-modal="#kt_table_1" data-type="edit"  data-key="'.$key.'" data-action="'.route('admin.promo.update',$val['id']).'"   href="#add">Edit</a> <a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class="delete-data btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="'.$key.'" data-action="'.route('admin.promo.delete',$val['id']).'">Delete  </a></div>'; /**/
            $data[$key]['action'] = $action;
            $return_data[$key] = $val;
            $return_data[$key]['shop_id'] = !empty($val['shops']) ?  array_pluck($val['shops'],'id') : [];
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
            'type' => 'required',
            'code' => 'required|unique:promo_codes,code,NULL,id,deleted_at,NULL',
            'value'=> 'required|numeric',
            'start_at'=>'required',
            'end_at'=>'required'
        ]);

        PromoCode::create($data);
        return response()->json(['status'=>true,'msg'=>'Record Added Successfully.']);
    }
    public function changeStatus(){
        $request = request()->all();
        PromoCode::where('id',$request['id'])->update(['status'=>$request['status']]);
        return response()->json(true);
    }

    public function update($id){
        $data = request()->all();

        $this->validate(request(),[
            'type' => 'required|string|max:255',
            'code' => 'required|unique:promo_codes,code,'.$id.',id,deleted_at,NULL'
        ]);
        $record = PromoCode::find($id);

        $record->type = $data['type'];
        $record->value = $data['value'];
        $record->code = $data['code'];
        $record->start_at = $data['start_at'];
        $record->end_at = $data['end_at'];
        $record->save();
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.']);
    }

    public function destroy($id)
    {
        PromoCode::destroy($id);
        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }
}