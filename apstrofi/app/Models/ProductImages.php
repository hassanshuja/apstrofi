<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model {

    protected $table = 'product_images';

    protected $fillable = ['product_id','image_url','thumb_image_url','order_by'];

    public function getImageAttribute()
    {
        return $this->attributes['thumb_image_url'] != '' ? '<img src="'.url($this->attributes['thumb_image_url']).'" width="75px" height="75px" />' : '<img src="'.url('images/user-image.jpg').'" width="75px" height="75px" />';


    }
}
