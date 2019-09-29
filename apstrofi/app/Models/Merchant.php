<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchant extends Model {
    use SoftDeletes;

    protected $table = 'merchants';

    protected $fillable = ['name','email','phone','password','image_url','province','city','suburb','area','code','address','zip_code','province_id','city_id','suburb_id','area_id','notes','gender','verification_code','status_verification','status'];


    public function getStatusValAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.merchant.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.merchant.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function getImageAttribute()
    {
        return $this->attributes['image_url'] != '' ? '<img src="'.url($this->attributes['image_url']).'" width="75px" height="75px" />' : '<img src="'.url('images/user-image.jpg').'" width="75px" height="75px" />';


    }

}
