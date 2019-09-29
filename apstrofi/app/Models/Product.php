<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = ['name','name_l','modal','meta_title','meta_keywords','meta_description','description','description_l','sizing_detail','sizing_detail_l','shipping_return_detail','shipping_return_detail_l','brand_id','category_id','sizing_gender','weight','stock_availability','is_featured','is_new_arrival','is_sustainable','status','merchant_id','sizing_gender','sizing_type','sku','attribute_value_color_id', 'attribute_value_size_id','total_qty','price','sale_price','slug','is_sustainable'];


    public function getStatusValAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.product.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.product.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function product_categories(){

        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function product_brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function product_images(){
        return $this->hasMany(ProductImages::class,'product_id','id');
    }

    /*public function product_attribute(){
        return $this->belongsToMany(AttributeValue::class,'product_attribute_value','product_id','attribute_value_id');
    }*/

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id');
    }

}
