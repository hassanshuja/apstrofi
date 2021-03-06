<?php

namespace App\Http\Controllers\Front\Men;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Skus;
use App\Models\SubCategory;
use App\Models\Tag;
use Image;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class MenController extends Controller
{

    public function getAllProducts() {
        $products = Product::select('*')->whereHas('tags', function ($query) {
            $query->where('title', 'Men');
        })->latest()->with('tags', 'product_images', 'product_brand', 'product_categories')->limit(20)->get();
        return $products;
    }

    public function getFeaturedProducts() {
        $products = Product::select('*')->whereHas('tags', function ($query) {
            $query->where('title', 'Men');
        })->latest()->with('tags', 'product_images', 'product_brand', 'product_categories')->where('is_featured', 1)->take(8)->get();
        return $products;
    }
}
