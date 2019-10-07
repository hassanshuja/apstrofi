<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use App\Models\PromoCode;
use App\Models\Category;

class DiscountController extends Controller{

    public function index()
    {
        $product = Product::where('status',1)->pluck('name','id');
        $category = Category::where('status',1)->pluck('name','id');
        return view('backend.discount.index', ['page_title' => 'Discount Management','product'=>$product,'category'=>$category]);
    }

}