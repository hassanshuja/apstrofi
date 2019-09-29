<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonPageContent;


class PrivacyPolicyContentController extends Controller{

    public function index()
    {
        $page = CommonPageContent::where('slug','privacypolicy')->first();
        return view('backend.page.privacypolicy.index', ['page_title' => 'Privacy Policy Content','page'=>$page]);
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
        $data['slug'] = 'privacypolicy';
        CommonPageContent::updateOrCreate(['slug'=>'privacypolicy'],$data);
    }

}
