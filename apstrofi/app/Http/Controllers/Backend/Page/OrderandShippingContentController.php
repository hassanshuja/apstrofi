<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonPageContent;


class OrderandShippingContentController extends Controller{

    public function index()
    {
        $page = CommonPageContent::where('slug','orderandshipping')->first();
        return view('backend.page.orderandshipping.index', ['page_title' => 'Order & Shipping Content','page'=>$page]);
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
        $data['slug'] = 'orderandshipping';
        CommonPageContent::updateOrCreate(['slug'=>'orderandshipping'],$data);
    }

}
