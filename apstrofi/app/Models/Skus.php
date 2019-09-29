<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Skus extends Model {

    protected $table = 'skus';

    protected $fillable = ['product_id','sku','attribute_value_color_id','price','sale_price','preview_image_url','slug','total_qty'];



}
