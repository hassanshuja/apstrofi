<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tags';

    protected $fillable = ['title','title_l','slug','is_home_style','image_url'];
    public function getStatusValAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.tag.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.tag.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function getImageAttribute()
    {
        return $this->attributes['image_url'] != '' ? '<img src="'.url($this->attributes['image_url']).'" width="75px" height="75px" />' : '<img src="'.url('images/user-image.jpg').'" width="75px" height="75px" />';


    }

    public function getHomeStyleAttribute(){
        if($this->attributes['is_home_style']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.tag.change-home-style").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.tag.change-home-style").'" class="change_status" ><span></span></label></span></div>';
        }
    }
}
