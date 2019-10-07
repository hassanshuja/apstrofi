<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonPageContent;


class ContactContentController extends Controller{

    public function index()
    {
        $page = CommonPageContent::where('slug','contact')->first();
        return view('backend.page.contact.index', ['page_title' => 'Conatct Content Management','page'=>$page]);
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
        $data['slug'] = 'contact';
        CommonPageContent::updateOrCreate(['slug'=>'contact'],$data);
    }

}
