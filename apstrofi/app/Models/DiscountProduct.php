<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DiscountProduct extends Model {

    protected $table = 'product_discounts';

    protected $fillable = ['discount_id','product_id','qty'];
}
