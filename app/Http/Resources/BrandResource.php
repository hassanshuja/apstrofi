<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
            'key'=>$lang ? $this->key : $this->key_l,
            'name' => $lang ? $this->name : $this->name_l,
            'slug'=> $this->slug,
            'image'=>$this->image_url ? url($this->image_url) : url('images/nopreview.png'),
        ];
    }
}
