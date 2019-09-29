<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'description'=> $lang ? $this->description : $this->name_l,
            'image_url'=>$this->image_url,
            'slug' => $this->slug,
            'children' => CategoryResource::collection($this->whenLoaded('children'))
        ];
    }
}
