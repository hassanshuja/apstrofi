<?php

namespace App\Http\Controllers\Front\Brand;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
{
    public function index()
    {
        return BrandResource::collection(
            Brand::orderBy('name','asc')->get()
        );
    }

    public function productList($slug){
        $brandId = Brand::where('slug',$slug)->value('id');

        Product::where('status',1)->where('brand_id',$brandId)->get();
    }
}
