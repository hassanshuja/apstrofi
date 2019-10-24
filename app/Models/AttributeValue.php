<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeValue extends Model {
    use SoftDeletes;

    protected $table = 'attribute_values';

    protected $fillable = ['name','name_l','attribute_id'];


    public function attribute(){
        return $this->belongsTo(Attribute::class,'attribute_id','id');
    }

    public function getid(){
        return $this->belongsToMany(Product::class,'attribute_values', 'name', 'id', 'modal', 'attribute_value_color_id')
                ->where('attribute_id', 2);
    }

}
