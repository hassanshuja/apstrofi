<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonContent;


class CommonContentController extends Controller{

    public function index()
    {
        $page = CommonContent::where('slug','common')->first();
        return view('backend.page.common.index', ['page_title' => 'Common Content Management','page'=>$page]);
    }



    public function store(){
        $data = request()->all();
        $niceNames = [
            'about_title' => 'Title',
            'about_title_l' => 'Title',
            'about_content'=> 'Content',
            'about_content_l'=> 'Content'
        ];
        $this->validate(request(), [
            'about_title' => 'required',
            'about_title_l' => 'required',
            'about_content'=> 'required',
            'about_content_l'=> 'required'
        ],[], $niceNames);
        $data['slug'] = 'common';
        CommonContent::updateOrCreate(['slug'=>'common'],$data);
    }

}