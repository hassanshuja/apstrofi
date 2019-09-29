<?php

namespace App\Http\Controllers\Front\Products;

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
use App\Models\ProductAttributeValue;

class ProductsController extends Controller
{
    public function show($id)
    {

        $product = Product::where('id',$id)->with('product_images','tags', 'product_categories')->first()->toArray();
        // $modal_colors = Product::where('modal', $product['modal'])->pluck('attribute_value_color_id');
        $modal_colors = Product::where('modal', $product['modal'])->get()->pluck('attribute_value_color_id')->toArray();
        $modal_colors_productsid = Product::where('modal', $product['modal'])->get()->pluck('id')->toArray();
// dd($modal_colors);
        $modal_sizes = Product::where('modal', $product['modal'])->pluck('attribute_value_size_id');
        $brand = Brand::where('status',1)->pluck('name','id');
        $colors = AttributeValue::where('attribute_id',2)->whereIn('id', $modal_colors)->pluck('name')->toArray();

        $sizes = ProductAttributeValue::where('product_id', $id)->where('qty', '>', '0')
        ->leftJoin('attribute_values', 'attribute_values.id', '=', 'product_attribute_value.attribute_value_size_id')
        ->select('attribute_values.name', 'product_attribute_value.id')
        ->get();

        $product['tag_id'] = !empty($product['tags']) ? array_pluck($product['tags'],'id'):[];

        //$product['category_id'] = !empty($product['product_categories']) ? Arr::pluck($product['product_categories'],  'id') : [];
        $category = Category::whereNotNull('parent_id')->where('id', $product['category_id'])->with('parent','shops')->orderBy('parent_id')->get(['name','id','parent_id']);
        $tag = Tag::where('status',1)->pluck('title','id');
        $products = Product::groupBy('modal')->pluck('modal');
        $categoryArray = [];
        $i = 0;
        foreach ($category as $key=>$val){
            $categoryArray[$i]['text'] = $val['parent']['name']." (".$val['name'].")"." (".implode(',',array_pluck($val['shops'],'name')) .")";
            $categoryArray[$i]['value'] = $val['id'];
            $i++;
        }

        return response()->json([
          'brand'=>$brand,
          'productsId'=> $modal_colors_productsid,
          'colors'=>$colors,
          'modal_colors'=> $modal_colors,
          'sizes'=>$sizes,
          'product'=>$product,
          'category'=>$category,
          'tags'=>$tag,
          'products'=>$products]
        );
    }

}
