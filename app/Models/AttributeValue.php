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

}
