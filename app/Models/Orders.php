<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';

    protected $fillable = ['invoice_id', 'shipping_details', 'shipping_amount', 
                            'shipping_discount', 'subtotal', 'grandtotal', 'merchants', 
                            'customer_id'];

    public function getOrderId(){
        
        $order_id = $this::orderby('created_at', 'desc')->first();
        if($order_id == NULL){
            $num = 10000;
            $invoice_id = str_pad($num, 4, '0', STR_PAD_LEFT);
        }else{
            $invoice_id = $order_id->invoice_id + 1;
        }
        return $invoice_id;
    }
}
