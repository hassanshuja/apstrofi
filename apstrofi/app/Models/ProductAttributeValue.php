<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttributeValue extends Model {
    use SoftDeletes;

    protected $table = 'product_attribute_value';

    protected $fillable = ['product_id','attribute_value_size_id','qty','min_size','max_size'];

}
