<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model {
    use SoftDeletes;

    protected $table = 'shops';

    protected $fillable = ['code','name','name_l','note','image_url','status'];

    public function getImageAttribute()
    {
        return $this->attributes['image_url'] != '' && file_exists($this->attributes['image_url']) ? '<img src="'.url($this->attributes['image_url']).'" width="75px" height="75px" />' : '<img src="'.url('images/notAvailable.png').'" width="75px" height="75px" />';


    }

    public function getStatusValAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.shop.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.shop.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function category(){

        return $this->belongsToMany(Category::class,'categories_shops','shop_id','category_id');
    }

}
