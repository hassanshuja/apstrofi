<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\OrderDetails;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Orders::all();
        return view('backend.orders.index',['page_title' => 'Orders Management','orders'=>$orders]);
    }

    public function listAjax(){

        $request = request()->all();
        // dd($request);
        $data = [];
        $return_data = [];
        $query = new Orders();
        $sortColumn = array('date','invoice_id','subtotal', 'shipping_discount', 'grandtotal', 'payment_status');
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
            $data[$key]['date'] = $val['date'];
            $data[$key]['invoice_id'] = $val['invoice_id'];
            $data[$key]['subtotal'] = $val['subtotal'];
            $data[$key]['shipping_discount'] = $val['shipping_discount'];
            $data[$key]['grandtotal'] = $val['grandtotal'];
            $data[$key]['payment_status'] = $val['payment_status'];
            $action = '<div class="actions"> <a data-toggle="confirmation"
            data-placement="top" href="javascript:void(0);" data-title="update" data-id="'.$val['id'].'" class="update-order btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="'.$key.'" data-action="'.route('admin.orders.update',$val['id']).'">Confirm</a></div>'; /**/
            $action_paid = $val['payment_status'];
            $data[$key]['action'] = $val['payment_status'] == 'Paid' ?  $action_paid : $action;
            $return_data[$key] = $val;
        }
        $records["aaData"] = $data;
        $records["record_data"] = $return_data;
        $records["sEcho"] = $sEcho;
        $records["iTotalDisplayRecords"] = $iTotalRecords;
        $records["iTotalRecords"] = $iTotalRecords;

        return response()->json($records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //getting invoice id for increment if there is no 
        //record then generate invoice id
        $order_id = Orders::orderby('created_at', 'desc')->first();
        if($order_id == NULL){
            $num = 1000;
            $invoice_id = str_pad($num, 4, '0', STR_PAD_LEFT);
        }else{
            $invoice_id = $order_id->invoice_id + 1;
        }


        try{
        $order = new Orders();
        $order->invoice_id = $invoice_id;
        $order->shipping_details = json_encode($request->final_detail['shipping_details']);
        $order->shipping_amount = $request->final_detail['shipping_total']; 
        $order->shipping_discount = $request->final_detail['shipping_discount'];
        $order->subtotal = $request->sub_total;
        $order->grandtotal = $request->final_detail['grandTotal'];
        $order->merchants = json_encode($request->final_detail['merchants']); 
        $order->customer_id = 1;
        $order->payment_status = 0;

        $order->save();

        }catch (\Exception $e) {

            return response()->json($e->getMessage());
        }

        try{

            foreach($request->list as $key => $orderItem) {
                $order_details = new OrderDetails();
                $order_details->orders_id = $order->id;
                $order_details->product_id = $orderItem['id'];
                $order_details->category = json_encode($orderItem['category']); 
                $order_details->product_merchant = $orderItem['product_merchant'];
                $order_details->total_price = $orderItem['total_price'];
                $order_details->selected_color = json_encode($orderItem['selected_color']);
                $order_details->selected_size = json_encode($orderItem['selected_size']); 
                $order_details->selected_quantity = $orderItem['selected_quantity'];
                $order_details->product_name = $orderItem['name'];
                $order_details->product_price = $orderItem['price'];
                $order_details->modals = $orderItem['modal'];
                $order_details->full_obj = json_encode($orderItem); 
                $order_details->save();
            }
        }catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return \response()->json(['success'=> true, 'message' => 'order saved Successfully']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orders = Orders::find($id);
        $orders->payment_status = 'Paid';
        $orders->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getOrderId(){
        $orders = new Orders();
       $orderId =  $orders->getOrderId();
      

       return response()->json($orderId);
    }

    public function kredivoPushUri(Request $request){

        $order_id = $request->order_id;
        $order_payment = Orders::where('invoice_id', $order_id)->first();
        if($request->status == 'OK'){
            $order_payment->payment_status = 1;
        }else{
            $order_payment->payment_status = 0;
        }

        $order_payment->save();


        $payment = new Payment();
        $payment->order_id = $request->order_id;
        $payment->transaction_status = $request->transaction_status; 
        $payment->amount = $request->amount; 
        $payment->payment_type = $request->payment_type; 
        $payment->message = $request->message; 
        $payment->json_obj = json_encode($request->all()); 
        $payment->transaction_time = $request->transaction_time; 
        $payment->transaction_id = $request->transaction_id; 
        $payment->signature_key = $request->signature_key;

        $payment->save();

        $param = array(
				'transaction_id' =>  $request->transaction_id,
				'signature_key' => $request->signature_key,
			);
			
   // print_r($param);		

    $url = 'https://sandbox.kredivo.com/kredivo/v2/update?' . http_build_query($param);
    //echo $url;
   	
	$post = 0;
	$request = array();
		
	$ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL            => $url,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_TIMEOUT        => 13,
            CURLOPT_USERAGENT      => "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36",
            CURLOPT_CUSTOMREQUEST  => $post ? 'POST' : 'GET',
            CURLOPT_POST           => $post,
            CURLOPT_POSTFIELDS     => json_encode($request),
            CURLOPT_HTTPHEADER     => array(
                'Content-Type: application/json; charset=UTF-8',                
            ),
        ));

        $response = curl_exec($ch);   
        
		// save information that you need in your side
		// status settlement : merchant update transaction into paid 
		//var_dump ( $response);
		
		$response = array (
				    "status"	=> 'OK',
					"message"	=> 'Message if any',					
	    );
		
		echo json_encode($response);
        //exit();
		
        $info = curl_getinfo($ch);
        curl_close($ch);

        // if ($err) {
        // echo "cURL Error #:" . $err;
        // } else {
        // echo $response;
        // }

        // $new =  array("status" => "OK",
        // "message" => "Received api request from kredivo for apstrofi",
        // );

        // return \response()->json($new);
    }

    // public function kredivoNotify(Request $request){
        
    //     $order_id = $request->order_id;
    //     $order_payment = Orders::where('invoice_id', $order_id)->first();
    //     if($request->status == 'OK'){
            
    //         $order_payment->payment_status = 1;
    //     }else{
    //         $order_payment->payment_status = 0;
    //     }

    //     $order_payment->save();


    //     $payment = new Payment();
    //     $payment->order_id = $request->order_id;
    //     $payment->transaction_status = $request->transaction_status; 
    //     $payment->amount = $request->amount; 
    //     $payment->payment_type = $request->payment_type; 
    //     $payment->message = $request->message; 
    //     $payment->json_obj = json_encode($request->all()); 
    //     $payment->transaction_time = $request->transaction_time; 
    //     $payment->transaction_id = $request->transaction_id; 
    //     $payment->signature_key = $request->signature_key;

    //     $payment->save();

    //     $url = "https://sandbox.kredivo.com/kredivo/v2/update?transaction_id={$request->transaction_id}&signature_key={$request->signature_key}";

    //     $curl = curl_init();


    //     curl_setopt_array($curl, array(
    //     CURLOPT_URL => $url,
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_HTTPHEADER => array(
    //         "Accept: */*",
    //         "Accept-Encoding: gzip, deflate",
    //         "Cache-Control: no-cache",
    //         "Connection: keep-alive",
    //         "Host: https://sandbox.kredivo.com",
    //         "User-Agent: PostmanRuntime/7.17.1",
    //         "cache-control: no-cache"
    //     ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //     echo "cURL Error #:" . $err;
    //     } else {
    //     echo $response;
    //     }
    //         }
        }
