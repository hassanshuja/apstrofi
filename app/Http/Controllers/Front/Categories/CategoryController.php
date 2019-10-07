<?php

namespace App\Http\Controllers\Front\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(
            Category::with('children')->parents()->ordered()->get()
        );
    }

    public function menCategory(){

        return CategoryListResource::collection(
            Category::whereNull('parent_id')->where('status',1)->whereHas('shops',function ($q){
                $q->where('code','men');
            })->ordered()->get()
        );
    }

    public function womenCategory(){

        return CategoryListResource::collection(
            Category::whereNull('parent_id')->where('status',1)->whereHas('shops',function ($q){
                $q->where('code','women');
            })->ordered()->get()
        );
    }
}
