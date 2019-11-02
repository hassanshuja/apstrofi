<?php

namespace App\Http\Controllers\Snap;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Veritrans\Midtrans;
use App\Models\Orders;
use App\Models\OrderDetails;

class SnapController extends Controller
{
    public function __construct()
    {   

        // serverKey : 'VT-client-kev115vEOPOwkRiV',
        //       clientKey : 'VT-server-hYR70nG06FzM39QWP588bnS1'
        Midtrans::$serverKey = 'VT-server-wUBr0PzaPAfqxchKI3HqnMQ8';
        
        //set is production to true for production mode
        Midtrans::$isProduction = true;
    }

    public function snap()
    {
        return view('snap_checkout');
    }

    public function token(Request $request) 
    {
    // error_log('masuk ke snap token dri ajax');
        $midtrans = new Midtrans;

        //getting invoice id for increment if there is no 
        //record then generate invoice id
        $order_id = Orders::orderby('created_at', 'desc')->first();
        if($order_id == NULL){
            $num = 1000;
            $invoice_id = str_pad($num, 4, '0', STR_PAD_LEFT);
        }else{
            $invoice_id = $order_id->invoice_id + 1;
        }


        // return response()->json(array(
        //     'all' => $request->all()
        //     )
        // );

        try{
        $order = new Orders();
        $order->invoice_id = $invoice_id;
        $order->shipping_details = json_encode($request->final_detail['shipping_details']);
        $order->shipping_amount = $request->final_detail['shipping_total']; 
        $order->shipping_discount = $request->final_detail['shipping_discount'];
        $order->discount_promo_obj = json_encode($request->discount);
        $order->subtotal = $request->sub_total;
        $order->grandtotal = $request->final_detail['grandTotal'];
        $order->merchants = json_encode($request->final_detail['merchants']); 
        $order->customer_id = 1;
        $order->payment_status = 'Unpaid';
        //2 for midtrans
        $order->payment_method = 2;

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
                $order_details->product_discount = $orderItem['product_discount'];
                $order_details->modals = $orderItem['modal'];
                $order_details->full_obj = json_encode($orderItem); 
                $order_details->save();
            }
        }catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        

        


        $transaction_details = array(
            'order_id'      => $invoice_id,
            'gross_amount'  => $request->final_detail['grandTotal']
        );

        // // Populate items

        foreach($request->list as $key => $orderItem) {
             
            $itemData = array(
                'id'        => $orderItem['id'],
                'price'     => $orderItem['price'],
                'quantity'  => $orderItem['selected_quantity'],
                'name'      => $orderItem['name']
            );

            $items[$key] = $itemData;
        }
// return response()->json(array('item' => $items, 'total'=>$transaction_details));
        $items[count($items)] = array(
            'id'        => 'shipping',
            'price'     => $request->final_detail['shipping_total_after_discount'],
            'quantity'  => 1,
            'name'      => 'Shipping'
        );
        // // Populate customer's billing address
        $items[count($items)] = array(
            'id'        => 'cart_discount',
            'price'     => '-'.$request->discount['cart_discount'],
            'quantity'  => 1,
            'name'      => 'Cart Discount'
        );

        if($request->discount['category_discount']){
            $items[count($items)] = array(
                'id'        => 'category_discount',
                'price'     => '-'.$request->discount['category_discount'],
                'quantity'  => 1,
                'name'      => 'Category Discount'
            );
        }
        
        if($request->discount['promo_total']){
            $items[count($items)] = array(
                'id'        => 'promo_total',
                'price'     => '-'.$request->discount['promo_total'],
                'quantity'  => 1,
                'name'      => 'Promo Discount'
            );
        }
        
// return response()->json(array('item' => $items, 'total'=>$transaction_details));

        $billing_address = array(
            'first_name'    => $request->final_detail['shipping_details']['name'],
            'last_name'     => "",
            'address'       => $request->final_detail['shipping_details']['address'],
            'city'          => $request->final_detail['shipping_details']['city'],
            'postal_code'   => $request->final_detail['shipping_details']['zipcode'],
            'phone'         => $request->final_detail['shipping_details']['phone'],
            'country_code'  => 'IDN'
            );
            
        // Populate customer's shipping address
        $shipping_address = array(
            'first_name'    => $request->final_detail['shipping_details']['name'],
            'last_name'     => "",
            'address'       => $request->final_detail['shipping_details']['address'],
            'city'          => $request->final_detail['shipping_details']['city'],
            'postal_code'   => $request->final_detail['shipping_details']['zipcode'],
            'phone'         => $request->final_detail['shipping_details']['phone'],
            'country_code'  => 'IDN'
            );

        // Populate customer's Info
        $customer_details = array(
            'first_name'    => $request->final_detail['shipping_details']['name'],
            'last_name'     => "",
            'phone'         => $request->final_detail['shipping_details']['phone'],
            'email'           => "andrisetiawan@asdasd.com",
            'phone'         => $request->final_detail['shipping_details']['phone'],
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
            );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        $credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit'       => 'hour', 
            'duration'   => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        
        // return response()->json($transaction_data);

    
        try
        {
            $snap_token = $midtrans->getSnapToken($transaction_data);
            //return redirect($vtweb_url);
            echo $snap_token;
        } 
        catch (Exception $e) 
        {   
            return $e->getMessage;
        }
    }

    public function finish(Request $request)
    {
        $result = $request->input('result_data');
        $result = json_decode($result);
        echo $result->status_message . '<br>';
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>' ;
    }

    public function notification()
    {
        $midtrans = new Midtrans;
        echo 'test notification handler';
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);

        if($result){
        $notif = $midtrans->status($result->order_id);
        }

        error_log(print_r($result,TRUE));

        /*
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
          // For credit card transaction, we need to check whether transaction is challenge by FDS or not
          if ($type == 'credit_card'){
            if($fraud == 'challenge'){
              // TODO set payment status in merchant's database to 'Challenge by FDS'
              // TODO merchant should decide whether this transaction is authorized or not in MAP
              echo "Transaction order_id: " . $order_id ." is challenged by FDS";
              } 
              else {
              // TODO set payment status in merchant's database to 'Success'
              echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
              }
            }
          }
        else if ($transaction == 'settlement'){
          // TODO set payment status in merchant's database to 'Settlement'
          echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
          } 
          else if($transaction == 'pending'){
          // TODO set payment status in merchant's database to 'Pending'
          echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
          } 
          else if ($transaction == 'deny') {
          // TODO set payment status in merchant's database to 'Denied'
          echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }*/
   
    }
}    