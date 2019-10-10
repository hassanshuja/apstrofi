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
        return view('backend.orders.index');
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
        //
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

        $url = "https://sandbox.kredivo.com/kredivo/v2/update?transaction_id={$request->transaction_id}&signature_key={$request->signature_key}";

        $curl = curl_init();


        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Accept-Encoding: gzip, deflate",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Host: https://sandbox.kredivo.com",
            "User-Agent: PostmanRuntime/7.17.1",
            "cache-control: no-cache"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // if ($err) {
        // echo "cURL Error #:" . $err;
        // } else {
        // echo $response;
        // }

        $new =  array("status" => "OK",
        "message" => "Received api request from kredivo for apstrofi",
        );

        return \response()->json($new);
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
