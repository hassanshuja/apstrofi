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
		$subcategory_id = isset($request->subcategory_id) ? json_decode($request->subcategory_id) : null;
        $sizing_gender = isset($request->sizing_gender) ? $request->sizing_gender : null;
        $sortby = isset($request->sortby) ? $request->sortby : null;
        // dd($sizing_gender,$request->sizing_gender,isset($request->sizing_gender));
        $category_id = $request->route('id');
        // dd($category_id);
        $query = Product::query()
                ->select('products.id', 'products.name','products.brand_id', 'products.name_l', 
                        'products.sizing_gender','products.sizing_type','products.category_id', 
                        'price')
                ->leftJoin('categories', 'categories.id', '=','products.category_id' )
                ->where('categories.parent_id', $category_id);
        if($subcategory_id){
            $query->where('products.category_id', $subcategory_id);
        }
        if($colors) {
        	$query->whereIn('products.attribute_value_color_id', $colors);
        }
        if($size) {
            $query->whereIn('products.attribute_value_size_id', $size);
        }
        $query->whereIn('products.sizing_gender', [$sizing_gender, 'NONE']);

        $query->where('products.status', 1);
        
        // $query->with(['product_categories' => function($q, $category_id){
        //     $q->where('parent_id', $category_id);
        // }]);
        if($sortby){
            if($sortby == 'asc' || $sortby == 'desc'){
                $query->orderBy('price', $sortby);
            }else{
                $query->latest('products.created_at');
            }
        }
        $result = $query->with(['product_images', 'product_brand' ])->paginate(12);
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
