<?php

namespace App\Http\Controllers\Front\Women;

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

class WomenController extends Controller
{
    public function getAllProducts() {
        $products = Product::select('*')->whereHas('tags', function ($query) {
            $query->where('title', 'Women');
        })->latest()->with('tags', 'product_images', 'product_brand', 'product_categories')->get();
        return $products;
    }

    public function getFeaturedProducts() {
        $products = Product::select('*')->whereHas('tags', function ($query) {
            $query->where('title', 'Women');
        })->latest()->with('tags', 'product_images', 'product_brand', 'product_categories')->where('is_featured', '=', 1)->take(8)->get();
        return $products;
    }
}
