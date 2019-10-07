<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DiscountCategory extends Model {

    protected $table = 'category_discounts';

    protected $fillable = ['discount_id','category_id','qty'];

}
