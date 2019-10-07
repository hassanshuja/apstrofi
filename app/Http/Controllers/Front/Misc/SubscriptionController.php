<?php

namespace App\Http\Controllers\Front\Misc;

use App\Http\Controllers\Controller;
// use App\Http\Resources\SubscriptionResource;
use Illuminate\Http\Request;

use App\Models\Subscription;
// use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function index()
    {
        // return SubscriptionResource::collection(
        //     Brand::orderBy('name','asc')->get()
        // );
    }

    public function subscription(Request $request){

        $this->validate(request(),[
            'email' => 'required|email|unique:email_subscription|max:100',
        ]);


        $subscribe = new Subscription();
        $subscribe->email = $request->email;
        $subscribe->status = 1;

        if($subscribe->save()){
            return response()->json([
                'error' => false,
                'message' => 'Email Subscription Successfull'
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'There is some error contact admin'
            ]);
        }


        // $brandId = Brand::where('slug',$slug)->value('id');

        // Product::where('status',1)->where('brand_id',$brandId)->get();
    }
}
