<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonPageContent;


class SmartSizingController extends Controller{

    public function index()
    {
        $page = CommonPageContent::where('slug','smartsizing')->first();
        return view('backend.page.smartsizing.index', ['page_title' => 'Smart Sizing Content','page'=>$page]);
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
        $data['slug'] = 'smartsizing';
        CommonPageContent::updateOrCreate(['slug'=>'smartsizing'],$data);
    }

}
