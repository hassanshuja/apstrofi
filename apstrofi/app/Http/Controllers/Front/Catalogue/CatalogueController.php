<?php

namespace App\Http\Controllers\Front\Catalogue;

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
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index(Request $request)
    {
        $colors = isset($request->colors) ? json_decode($request->colors) : null;
		$size = isset($request->size) ? json_decode($request->size) : null;
        $query = Product::query()->select('id', 'name','brand_id', 'name_l', 'sizing_gender','sizing_type','category_id');
        if($colors) {
        	$query->whereIn('attribute_value_color_id', $colors);
        }
        if($size) {
            $query->whereIn('attribute_value_size_id', $size);
        }
        $result = $query->latest('created_at')->with('product_images', 'product_brand', 'product_categories')->paginate(12);
        return $result;
    }

    public function getProductColors () {
        $colors = AttributeValue::select('id', 'name', 'attribute_id')->where('attribute_id',2)->get();
        return $colors;
    }

    public function getProductSizes () {
        $colors = AttributeValue::select('id', 'name', 'attribute_id')->where('attribute_id',1)->get();
        return $colors;
    }
}
