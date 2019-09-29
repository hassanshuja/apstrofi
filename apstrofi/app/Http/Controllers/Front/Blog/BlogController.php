<?php

namespace App\Http\Controllers\Front\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status',1)->latest()->with('blog_images','products')->limit(10)->get();
       // pr($blogs); die;
        if(!empty($blogs)){
           // pr($blogs); die;
            foreach ($blogs as $key=>$val){
                //pr($val); die;
                if(!empty($val['blog_images'])){
                    foreach ($val['blog_images'] as $k=>$v){
                        $v->image_url = url($v->image_url);
                        $v->thumb_image_url = url($v->thumb_image_url);
                    }
                }

            }
        }
///pr($blogs); die;
        return BlogResource::collection(
            $blogs
        );


    }

    public function detail($slug){
        $blogs = Blog::where('slug',$slug)->where('status',1)->with('blog_images','products')->first();
        if(!empty($blogs['blog_images'])){
            foreach ($blogs['blog_images'] as $k=>$v){
                $v->image_url = url($v->image_url);
                $v->thumb_image_url = url($v->thumb_image_url);
            }
        }
        return new BlogResource($blogs);
    }
}
