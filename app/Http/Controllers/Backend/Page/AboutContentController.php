<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonPageContent;


class AboutContentController extends Controller{

    public function index()
    {
        $page = CommonPageContent::where('slug','about')->first();
        return view('backend.page.about.index', ['page_title' => 'About Content Management','page'=>$page]);
    }



    public function store(){
        $data = request()->all();
        $niceNames = [
            'title' => 'Title',
            'description'=> 'Content'
        ];
        $this->validate(request(), [
            'title' => 'required',
            'description'=> 'required'
        ],[], $niceNames);
        $data['slug'] = 'about';
        CommonPageContent::updateOrCreate(['slug'=>'about'],$data);
    }

}
