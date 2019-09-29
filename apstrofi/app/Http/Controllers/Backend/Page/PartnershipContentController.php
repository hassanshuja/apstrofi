<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonPageContent;


class PartnershipContentController extends Controller{

    public function index()
    {
        $page = CommonPageContent::where('slug','partnership')->first();
        return view('backend.page.partnership.index', ['page_title' => 'Partnership Content','page'=>$page]);
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
        $data['slug'] = 'partnership';
        CommonPageContent::updateOrCreate(['slug'=>'partnership'],$data);
    }

}
