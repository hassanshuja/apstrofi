<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonPageContent;


class TermsAndConditionsContentController extends Controller{

    public function index()
    {
        $page = CommonPageContent::where('slug','termsandconditions')->first();
        return view('backend.page.termsandconditions.index', ['page_title' => 'Terms & Conditions Content','page'=>$page]);
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
        $data['slug'] = 'termsandconditions';
        CommonPageContent::updateOrCreate(['slug'=>'termsandconditions'],$data);
    }

}
