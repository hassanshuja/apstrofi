<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DiscountProduct extends Model {

    protected $table = 'product_discounts';

    protected $fillable = ['discount_id','product_id','qty'];

    public function discount(){
        return $this
                ->belongsTo(Discount::class,'discount_id','id')
                ->where('status', 1)
                ->where('start_at', '<=', date('Y-m-d'))
                ->where('end_at', '>=', date('Y-m-d'));
    }

}
