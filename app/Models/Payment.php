<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payment';

    protected $fillable = ['order_id', 'transaction_status', 'amount', 
                            'payment_type', 'message', 'json_obj', 'transaction_time', 
                            'transaction_id', 'signature_key'];
}
