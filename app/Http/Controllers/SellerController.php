<?php

namespace App\Http\Controllers;

use App\Services\SellerServices;
use Illuminate\Http\Request;

class SellerController extends Controller
{

    private $seller_service;

    public function __construct(SellerServices $seller_service)
    {
        $this->seller_service = $seller_service;
    }


    public function index()
    {
        return view('pages.seller.index');
    }

    public function addPropertyPage(Request $request){

        return view('pages.seller.addProperty');
    }
}
