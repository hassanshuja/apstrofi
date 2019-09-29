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
        return [
            'name' => $lang ? $this->name : $this->name_l,
            'description'=> $lang ? $this->description : $this->description_l,
            'image_url'=>$this->image_url,
            'slug' => $this->slug
        ];
    }
}
