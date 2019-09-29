<?php

namespace App\Http\Controllers\Front\Page;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Http\Resources\HomeResource;
use App\Models\CommonContent;
use App\Models\PageBuilder;


class PageController extends Controller
{
    public function women()
    {
        $pageData =  PageBuilder::where('slug','women')->first();
        $page = [];
        $lang = request()->header('lang');
        /*if(!$lang){
            if(request()->segment(1) == 'id'){
                $lang = 'id';
            }else{
                $lang = 'en';
            }
        }*/
        if(!empty($pageData)){
            if ($pageData['section_1']){
                $page['section_1'] = json_decode($pageData['section_1'],true);
                $page['section_1']['image_url'] = url($page['section_1']['image_url']);
                $page['section_1']['mobile_image_url'] = url($page['section_1']['mobile_image_url']);
                $page['section_1']['button_text'] = $lang != 'id' ? $page['section_1']['button_text'] : $page['section_1']['button_text_l'];
                $page['section_1']['banner_text'] = $lang != 'id' ? $page['section_1']['banner_text'] : $page['section_1']['banner_text_l'];

            }else{
                $page['section_1'] = [];
            }
            if ($pageData['section_2']){
                $page['section_2'] = json_decode($pageData['section_2'],true);
                $page['section_2']['image_url'] = url($page['section_2']['image_url']);
                $page['section_2']['button_text'] = $lang != 'id' ? $page['section_2']['button_text'] : $page['section_2']['button_text_l'];
            }else{
                $page['section_2'] = [];
            }
            if ($pageData['section_3']){
                $page['section_3'] = json_decode($pageData['section_3'],true);
                $page['section_3']['image_url'] = url($page['section_3']['image_url']);
                $page['section_3']['button_text'] = $lang != 'id' ? $page['section_3']['button_text'] : $page['section_3']['button_text_l'];
            }else{
                $page['section_3'] = [];
            }
        }
        return new HomeResource($page);
    }
    public function men()
    {
        $pageData =  PageBuilder::where('slug','men')->first();
        $page = [];
        $lang = request()->header('lang');
        if(!empty($pageData)){
            if ($pageData['section_1']){
                $page['section_1'] = json_decode($pageData['section_1'],true);
                $page['section_1']['image_url'] = url($page['section_1']['image_url']);
                $page['section_1']['mobile_image_url'] = url($page['section_1']['mobile_image_url']);
                $page['section_1']['button_text'] = $lang != 'id' ? $page['section_1']['button_text'] : $page['section_1']['button_text_l'];
                $page['section_1']['banner_text'] = $lang != 'id' ? $page['section_1']['banner_text'] : $page['section_1']['banner_text_l'];
            }else{
                $page['section_1'] = [];
            }
            if ($pageData['section_2']){
                $page['section_2'] = json_decode($pageData['section_2'],true);
                $page['section_2']['image_url'] = url($page['section_2']['image_url']);
                $page['section_2']['button_text'] = $lang != 'id' ? $page['section_2']['button_text'] : $page['section_2']['button_text_l'];
            }else{
                $page['section_2'] = [];
            }
            if ($pageData['section_3']){
                $page['section_3'] = json_decode($pageData['section_3'],true);
                $page['section_3']['image_url'] = url($page['section_3']['image_url']);
                $page['section_3']['button_text'] = $lang != 'id' ? $page['section_3']['button_text'] : $page['section_3']['button_text_l'];
            }else{
                $page['section_3'] = [];
            }
        }
        return new HomeResource($page);
    }
    public function home(){
       $pageData =  PageBuilder::where('slug','home')->first();
        $page = [];
        $lang = request()->header('lang');
        if(!empty($pageData)){
            if ($pageData['section_1']){
                $page['section_1'] = json_decode($pageData['section_1'],true);
                $page['section_1']['image_url'] = url($page['section_1']['image_url']);
                $page['section_1']['button_text'] = $lang != 'id' ? $page['section_1']['button_text'] : $page['section_1']['button_text_l'];
            }else{
                $page['section_1'] = [];
            }
            if ($pageData['section_2']){
                $page['section_2'] = json_decode($pageData['section_2'],true);
                $page['section_2']['image_url'] = url($page['section_2']['image_url']);
                $page['section_2']['button_text'] = $lang != 'id' ? $page['section_2']['button_text'] : $page['section_2']['button_text_l'];
            }else{
                $page['section_2'] = [];
            }
            if ($pageData['section_3']){
                $page['section_3'] = json_decode($pageData['section_3'],true);
                $page['section_3']['image_url'] = url($page['section_3']['image_url']);
                $page['section_3']['button_text'] = $lang != 'id' ? $page['section_3']['button_text'] : $page['section_3']['button_text_l'];
            }else{
                $page['section_3'] = [];
            }
        }
        return new HomeResource($page);
    }

    public function common(){
        $commanData = CommonContent::first();
        return new CommonResource($commanData);
    }
}
