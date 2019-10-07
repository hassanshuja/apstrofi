<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model {
    use SoftDeletes;

    protected $table = 'brands';

    protected $fillable = ['slug','name','name_l','description','description_l','country_name','country_name_l','brand_since','image_url','banner_url','status'];

    protected $appends = ['key','key_l'];

    public function getImageAttribute()
    {
        return $this->attributes['image_url'] != '' && file_exists($this->attributes['image_url']) ? '<img src="'.url($this->attributes['image_url']).'" width="75px" height="75px" />' : '<img src="'.url('images/notAvailable.png').'" width="75px" height="75px" />';
    }

    public function getStatusValAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.brand.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.brand.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function shops(){

        return $this->belongsToMany(Shop::class,'shop_brand','brand_id','shop_id');
    }

    public function getKeyAttribute(){
        return ucfirst(substr($this->attributes['name'], 0, 1));

    }

    public function getKeyLAttribute(){
        return ucfirst(substr($this->attributes['name_l'], 0, 1));

    }
}
