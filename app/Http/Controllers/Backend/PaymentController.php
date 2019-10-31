<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Mail;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = array('data' => $request->all());
        Mail::send('emails.template.confirm-booking', $data , function($message) {
            $message->to('clientsoftech@gmail.com', 'Tutorials Point')->subject
               ('Laravel Basic Testing Mail');
            $message->from('hassaan@clientsoftech.com','Virat Gandhi');
         });

        //  $order_id = $request->order_id;
        //  $order_payment = Orders::where('invoice_id', $order_id)->first();
         
        //  if($request->status == 'OK'){
        //      //pending status is 4 in db and 0 is unpaid
        //      $order_payment->payment_status = 4;
        //  }else{
        //      $order_payment->payment_status = 0;
        //  }
 
        //  $order_payment->save();
 
        //This is created for adding payment through midtrans Api response
         $payment = new Payment();
         $payment->order_id = $request->order_id;
         $payment->transaction_status = $request->transaction_status; 
         $payment->payment_method = 2; 
         $payment->amount = $request->gross_amount; 
         $payment->payment_type = $request->payment_type; 
         $payment->message = $request->status_message; 
         $payment->json_obj = json_encode($request->all()); 
         $payment->transaction_time = $request->transaction_time; 
         $payment->transaction_id = $request->transaction_id; 
         $payment->signature_key = $request->signature_key;
 
        if($payment->save()){
            return response()->json($payment);
        }else{
            return response()->json(['error' => 'There is some error occured, Please contact Admin']);;
        }

         
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
        $payment_status = Payment::where('order_id', $request->order_id)->first();
        
        $payment_status->transaction_status = $request->transaction_status;

        if($payment_status->save()){
            return response()->json(array('message' => 'Updated successfull'), 201);
        }else{
            return response()->json(array('message' => 'Failed to Update'), 504);
        }
        
      
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
}
