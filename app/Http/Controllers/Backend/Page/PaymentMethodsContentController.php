<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use App\Models\CommonPageContent;


class PaymentMethodsContentController extends Controller{

    public function index()
    {
        $page = CommonPageContent::where('slug','paymentmethods')->first();
        return view('backend.page.paymentmethods.index', ['page_title' => 'Payment Methods Content','page'=>$page]);
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
        $data['slug'] = 'paymentmethods';
        CommonPageContent::updateOrCreate(['slug'=>'paymentmethods'],$data);
    }

}
