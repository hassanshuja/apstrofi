<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SkusAttributeValue extends Model {

    protected $table = 'skus_attribute_values';

    protected $fillable = ['product_id','skus_id','attribute_value_size_id','qty'];

}
