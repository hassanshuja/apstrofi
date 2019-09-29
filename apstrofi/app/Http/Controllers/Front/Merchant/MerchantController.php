<?php

namespace App\Http\Controllers\Front\Merchant;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller{

    private $apiurl;
    private $apikey;
    public function __construct()
    {
        $this->apiurl="https://api.shipper.id/prod/";

        $this->apikey="apiKey=b9ea898678816b4b3cd248727a322f4f";
    }

    public function merchantDetails(Request $request)
    {
        $getMerchants = Merchant::whereIn('name', $request->merchants)->get()->toArray();
    //    $getMerchants =  $request->all();

        return response()->json($getMerchants);
    }

}