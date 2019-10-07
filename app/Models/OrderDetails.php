<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    protected $table = 'order_details';

    protected $fillable = ['orders_id', 'product_id', 'category', 
                            'product_merchant', 'total_price', 'selected_color',
                            'selected_size', 'selected_quantity', 'product_name', 
                            'product_price', 'modals', 'full_obj'  ];
}
