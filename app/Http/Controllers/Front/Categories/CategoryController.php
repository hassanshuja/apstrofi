<?php

namespace App\Http\Controllers\Front\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(
            Category::with('children')->parents()->ordered()->get()
        );
    }

    public function menCategory(){
        $parent_id = Category::whereNull('parent_id')->pluck('id');
        $abc =Category::whereNotNull('parent_id')->with('parent', 'shops')->where('status',1)->whereHas('shops',function ($q){
            $q->where('code','men');
        })
        ->ordered()->get();
        return CategoryListResource::collection(
            
            $abc->unique('parent')
            
        );

        // $parent_id = Category::whereNull('parent_id')->pluck('id');
        //     $abc =Category::whereNotNull('parent_id')->with('parent', 'shops')->where('status',1)->whereHas('shops',function ($q){
        //         $q->where('code','men');
        //     })
        //     ->ordered()->get();
        //     $new = $abc->unique('parent');
        //     return response()->json($new);
    }

    public function menSubCategory($id){
        
        return CategoryListResource::collection(
            Category::whereNotNull('parent_id')->with('parent', 'shops')->where('status',1)->whereHas('shops',function ($q){
                $q->where('code','men');
            })->where('parent_id', $id)
            ->ordered()->get()
        );
    }

    // public function menSubCategoryItem($id){
    //     $subcategory_id = Request::get('subcategory_id');
    //     return CategoryListResource::collection(
    //         Category::whereNotNull('parent_id')->with('parent', 'shops')->where('status',1)->whereHas('shops',function ($q){
    //             $q->where('code','men');
    //         })->where('parent_id', $id)
    //         ->where('_id')
    //         ->ordered()->get()
    //     );
    // }
    
    public function womenCategory(){
        
        $abc = Category::whereNotNull('parent_id')
                    ->with('parent', 'shops')->where('status',1)
                    ->whereHas('shops',function ($q){
                                $q->where('code','women');
                    })->ordered()->get();

        return CategoryListResource::collection(
            $abc->unique('parent')
        );

    }

    public function womenSubCategory($id){
        
        return CategoryListResource::collection(
            Category::whereNotNull('parent_id')->with('parent', 'shops')->where('status',1)->whereHas('shops',function ($q){
                $q->where('code','women');
            })->where('parent_id', $id)
            ->ordered()->get()
        );
    }
}
