<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */


    public function toArray($request)
    {
        $lang = $request->header('lang');
        return [
            'title' => $lang ? $this->title : $this->title_l,
            'subtitle'=> $lang ? $this->subtitle : $this->subtitle_l,
            'description'=> $lang ? $this->description : $this->description,
            'author'=> $lang ? $this->author : $this->author_l,
            'date'=> date('d F Y',strtotime($this->created_at)),
            'images'=>$this->blog_images,
            'slug' => $this->slug,
            'products' => $this->products,
            'category_name'=> $lang ? $this->blog_category->name : $this->blog_category->name_l,
            'category_url'=> $this->blog_category->slug,
        ];
    }
}
