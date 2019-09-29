<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $table = 'blogs';

    protected $fillable = ['blog_category_id','author','author_l','title','title_l','subtitle','subtitle_l','slug','description','description_l','status'];

    public function getStatusValAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.blog.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.blog.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function products(){

        return $this->belongsToMany(Product::class,'blog_products','product_id','blog_id');
    }

    public function blog_images(){

        return $this->hasMany(BlogImages::class,'blog_id','id');
    }

    public function blog_category(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id','id');
    }
}
