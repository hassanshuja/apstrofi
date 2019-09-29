<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Merchant;

class MerchantController extends Controller{

    private $apiurl;
    private $apikey;
    public function __construct()
    {
        $this->apiurl="https://api.shipper.id/prod/";

        $this->apikey="apiKey=b9ea898678816b4b3cd248727a322f4f";
    }

    public function index()
    {
        return view('backend.merchant.index', ['page_title' => 'Merchant Management']);
    }

    public function listAjax(){

        $request = request()->all();
        $data = [];
        $return_data = [];
        $query = new Merchant();
        $sortColumn = array('name','email','status');
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
            $data[$key]['email'] = $val['email'];
            /*$data[$key]['photo'] = $val['image'];*/
            $data[$key]['status'] = $val['status_val'];
            $action = '<div class="actions"><a class="edit btn btn-warning btn-sm" data-toggle="modal" data-modal="#kt_table_1" data-type="edit"  data-key="'.$key.'" data-action="'.route('admin.merchant.update',$val['id']).'"   href="#add">Edit</a> </div>'; /*<a data-toggle="confirmation"
data-placement="top" href="javascript:void(0);" data-title="delete"  class=" btn btn-danger btn-sm delete-data" data-modal="#m_table_1" data-key="'.$key.'" data-action="'.route('admin.system-user.delete',$val['id']).'"><i class="fa fa-trash"></i>  </a>*/
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
            'email' => 'required|string|email|max:255|unique:merchants',
            'phone' => 'required|numeric|unique:merchants',
            'password' => 'required|string|min:6'
        ]);
        /*$image_url = '';
        if ( request()->hasFile('image')){
            if (request()->file('image')->isValid()){
                $file_url = request()->file('image')->storePubliclyAs('images/merchant',request()->file('image')->getClientOriginalName());
                $image_url = 'storage/'.$file_url;
            }
        }
        $data['image_url'] = $image_url;*/

        Merchant::create($data);
        return response()->json(['status'=>true,'msg'=>'Record Added Successfully.']);
    }
    public function changeStatus(){
        $request = request()->all();
        Merchant::where('id',$request['id'])->update(['status'=>$request['status']]);
        return response()->json(true);
    }

    public function update($id){
        $data = request()->all();
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:merchants,email,'.$id.',id',
            'phone' => 'required|numeric|unique:merchants,phone,'.$id.',id'
        ]);
        $data = request()->only(['name','email','phone','password','image_url','province','city','subdistrict','area','code','address','zip_code','province_id','city_id','suburb_id','area_id','notes','gender','verification_code','status_verification','status']);
        $record = Merchant::find($id);
       /* $image_url = '';
        if ( request()->hasFile('image')){
            if (request()->file('image')->isValid()){
                $file_url = request()->file('image')->storePubliclyAs('images/merchant',request()->file('image')->getClientOriginalName());
                $image_url = 'storage/'.$file_url;
            }
            $data['image_url'] = $image_url;
        }*/

        $record->update($data);
        return response()->json(['status'=>true,'msg'=>'Record Updated Successfully.']);
    }

    public function destroy($id)
    {
        Merchant::destroy($id);
        return response()->json(['status'=>true,'msg'=>'Record Deleted Successfully.']);
    }

    public function getprovince()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header('Content-Type: application/json');

        $url=$this->apiurl."public/v1/provinces?".$this->apikey;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL =>$url,
            CURLOPT_USERAGENT => 'Shipper/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(

            ),
        ));

        //curl_setopt($curl, CURLOPT_POST, true);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);



        /*if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }*/

        $response=json_decode($response);

        echo(json_encode($response->data->rows));



    }

    public function getcity()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header('Content-Type: application/json');

        $data=request()->all();


        $url=$this->apiurl."public/v1/cities?province=".$data['id']."&".$this->apikey;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL =>$url,
            CURLOPT_USERAGENT => 'Shipper/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(

            ),
        ));

        //curl_setopt($curl, CURLOPT_POST, true);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        /*if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }*/

        $response=json_decode($response);
        echo(json_encode($response->data->rows));
    }

    public function getsuburb()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header('Content-Type: application/json');

        $data=request()->all();

        $url=$this->apiurl."public/v1/suburbs?city=".$data['id']."&".$this->apikey;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL =>$url,
            CURLOPT_USERAGENT => 'Shipper/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(

            ),
        ));

        //curl_setopt($curl, CURLOPT_POST, true);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        /*if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }*/

        $response=json_decode($response);
        echo(json_encode($response->data->rows));
    }

    public function getarea()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header('Content-Type: application/json');

        $data=request()->all();

        $url=$this->apiurl."public/v1/areas?suburb=".$data['id']."&".$this->apikey;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL =>$url,
            CURLOPT_USERAGENT => 'Shipper/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(

            ),
        ));

        //curl_setopt($curl, CURLOPT_POST, true);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        /*if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }*/

        $response=json_decode($response);
        echo(json_encode($response->data->rows));
    }
}