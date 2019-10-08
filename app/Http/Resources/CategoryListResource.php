<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryListResource extends JsonResource
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
        $parent_name =  $this->parent['name'];
        $parent_lname =  $this->parent['name_l'];
        return [
            'id' => $this->id,
            'name' => $lang ? $this->name : $this->name_l,
            'parent_id' => $this->parent_id,
            'parent_name' =>  $parent_name,
            'parent_name_l' =>  $parent_lname,
            'description'=> $lang ? $this->description : $this->description_l,
            'image_url'=>   $this->image_url,
            'slug' => $this->slug
        ];
    }
}
