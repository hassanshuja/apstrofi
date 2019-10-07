<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\DiscountProduct;


class DiscountProductController extends Controller{


    public function listAjax(){

        $request = request()->all();
        $data = [];
        $return_data = [];
        $query = new Discount();
        $query = $query->where('discount_related',2);
        $sortColumn = array('title','start_at','','','','status');
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
            if($val['data'] == 'offer_period' && trim($val['search']['value']) != ''){
                $date = explode('-',$val['search']['value']);
                $fromDate = date('Y-m-d',strtotime(str_replace('/','-',$date[0])));
                $toDate = date('Y-m-d',strtotime(str_replace('/','-',$date[1])));
                $query = $query->whereDate('start_at','<=', $fromDate)->whereDate('end_at','>=',$toDate);

            }elseif(trim($val['search']['value']) != '') {
                $query = $query->where($val['data'],'like',"%" .$val['search']['value']. "%");
            }
        }
        $iTotalRecords = $query->count();
        $iDisplayLength = intval($request['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($request['start']);
        $sEcho = intval($request['draw']);
        $records = $query->with('discount_product:product_id,qty')->skip($iDisplayStart)->take($iDisplayLength)->get();
        foreach ($records as $key=>$val){
            $index = 0;
            $data[$key]['title'] = $val['title'];
            $data[$key]['offer_period'] = $val['start_at'].' to '.$val['end_at'];
            $data[$key]['type'] = $val['type'];
            $data[$key]['amount'] = $val['amount'];
            $data[$key]['offer_type'] = $val['offer_type_val'];
            $data[$key]['status'] = $val['status_val_category'];
            $action = '<div class="actions"><a class="edit btn btn-warning btn-sm" data-toggle="modal" data-modal="#kt_table_3" data-type="edit"  data-key="'.$key.'" data-form_type="product" data-action="'.route('admin.discount-product.update',$val['id']).'"   href="#add-product-discount">Edit</a> <a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class="delete-data btn btn-danger btn-sm" data-modal="#kt_table_3" data-key="'.$key.'" data-action="'.route('admin.discount-product.delete',$val['id']).'">Delete  </a></div>'; /**/
            $data[$key]['action'] = $action;
            $return_data[$key] = $val;
            $return_data[$key]['product'] = $val['discount_product'];
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
            'title' => 'required',
            'title_l' => 'required',
            'description' => 'required',
            'description_l' => 'required',
            'amount'=> 'required|numeric',
            'offer_type'=> 'required',
            'start_at'=>'required',
            'end_at'=>'required',

        ]);
        $data['discount_related'] = 2;
        $record = Discount::create($data);
        if(!empty($data['product'])){

            $result = array();
            foreach($data['product'] as $k => $v) {
                $category_id = $v['product_id'];
                $result[$category_id][] = $v['qty'];
            }

            $new = array();
            foreach($result as $key => $value) {
                $new[] = array('product_id' => $key, 'qty' => array_sum($value));
            }

            foreach ($new as $key=>$val){
                $val['discount_id'] = $record['id'];
                DiscountProduct::create($val);
            }
        }

        return response()->json(['status'=>true,'msg'=>'Record Added Successfully.','table'=>'kt_table_3']);
    }
    public function changeStatus(){
        $request = request()->all();
        Discount::where('id',$request['id'])->update(['status'=>$request['status']]);
        return response()->json(true);
    }

    public function update($id){
        $data = request()->all();
        $this->validate(request(),[
            'type' => 'required',
            'title' => 'required',
            'title_l' => 'required',
            'description' => 'required',
            'description_l' => 'required',
            'amount'=> 'required|numeric',
            'offer_type'=> 'required',
            'start_at'=>'required',
            'end_at'=>'required',
        ]);
        $data = request()->only(['title','title_l','type','amount','description','description_l','start_at','end_at','status','product']);
        $record = Discount::find($id);
        $record->update($data);
        if(!empty($data['product'])){
            $existRecord = DiscountProduct::where('discount_id',$id)->pluck('product_id')->toArray();
            if(!empty($existRecord)){
                $extraMenuNewId = array_filter(array_pluck($data['product'],'product_id'));
                $result=array_diff($existRecord,$extraMenuNewId);
                if(!empty($result)){
                    DiscountProduct::where('discount_id',$id)->whereIn('product_id',$result)->delete();
                }
            }
            $result = array();
            foreach($data['product'] as $k => $v) {
                $category_id = $v['product_id'];
                $result[$category_id][] = $v['qty'];
            }

            $new = array();
            foreach($result as $key => $value) {
                $new[] = array('product_id' => $key, 'qty' => array_sum($value));
            }
            foreach ($new as $key=>$val){
                DiscountProduct::updateOrCreate(['discount_id'=>$id,'product_id'=>$val['product_id']],['qty'=>$val['qty']]);
            }


        }else{
            DiscountProduct::where('discount_id',$id)->delete();
        }
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.','table'=>'kt_table_3']);
    }

    public function destroy($id)
    {
        Discount::destroy($id);
        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }

    public function selectProduct(){
        $product = Discount::where('status',1)->get(['name','id']);
        $productArray = [];
        $i = 0;
        foreach ($product as $key=>$val){
            $productArray[$i]['text'] = $val['name'];
            $productArray[$i]['value'] = $val['id'];
            $i++;
        }
        return response()->json(['status'=>true,'product'=>$productArray]);
    }
}