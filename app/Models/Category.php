<?php

namespace App\Models;
use App\Models\Traits\HasChildren;
use App\Models\Traits\IsOrderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
    use SoftDeletes , HasChildren, IsOrderable;

    protected $table = 'categories';

    protected $fillable = ['slug','name','name_l','parent_id','description','description_l','image_url','status','order','old_id'];


    public function getStatusValAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.category.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.category.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getImageAttribute()
    {
        return $this->attributes['image_url'] != '' && file_exists($this->attributes['image_url']) ? '<img src="'.url($this->attributes['image_url']).'" width="75px" height="75px" />' : '<img src="'.url('images/notAvailable.png').'" width="75px" height="75px" />';


    }
    public function shops(){

        return $this->belongsToMany(Shop::class,'categories_shops','category_id','shop_id');
    }

    public function parent(){

        return$this->belongsTo(Category::class,'parent_id','id');
    }

}
