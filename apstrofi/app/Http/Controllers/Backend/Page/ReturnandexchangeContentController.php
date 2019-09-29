<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonPageContent;


class ReturnandexchangeContentController extends Controller{

    public function index()
    {
        $page = CommonPageContent::where('slug','returnandexchange')->first();
        return view('backend.page.returnandexchange.index', ['page_title' => 'Return & Exchange Content','page'=>$page]);
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
        $data['slug'] = 'returnandexchange';
        CommonPageContent::updateOrCreate(['slug'=>'returnandexchange'],$data);
    }

}
