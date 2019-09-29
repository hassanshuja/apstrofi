<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model {
    use SoftDeletes;

    protected $table = 'discounts';

    protected $fillable = ['title','title_l','type','amount','description','description_l','offer_type','start_at','end_at','status','max_discount_amount','min_order_amount','discount_related'];


    public function getStatusValCartAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.discount-cart.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.discount-cart.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function getStatusValCategoryAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.discount-category.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.discount-category.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function getStatusValProductAttribute(){
        if($this->attributes['status']){
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.discount-product.change-status").'" class="change_status" checked="checked" name=""><span></span></label></span></div>';
        }else{
            return '<div class="col-3"><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label><input type="checkbox" data-id="'.$this->attributes['id'].'" data-action="'.route("admin.discount-product.change-status").'" class="change_status" ><span></span></label></span></div>';
        }

    }

    public function getDiscountRelatedValAttribute(){
        if($this->attributes['discount_related'] == 0){
            return 'Cart';
        }elseif ($this->attributes['discount_related'] == 1){
            return 'Category';
        }elseif ($this->attributes['discount_related'] == 2){
            return 'Product';
        }
    }

    public function getOfferTypeValAttribute(){
        if($this->attributes['offer_type'] == 0){
            return 'Individual';
        }elseif ($this->attributes['offer_type'] == 1){
            return 'Combo';
        }
    }

    public function discount_category(){
        return $this->belongsToMany(Category::class,'category_discounts','discount_id','category_id')->withPivot('qty');
    }



    public function discount_product(){
        return $this->belongsToMany(Product::class,'product_discounts','discount_id','product_id')->withPivot('qty');
    }
}
