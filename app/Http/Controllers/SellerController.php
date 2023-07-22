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

    public function addPropertyPage(){

        return view('pages.seller.addProperty');
    }

    public function addProperty(Request $request){

        $this->seller_service->addProperty($request);
    }

    public function agents(Request $request){
        return view('pages.seller.agents');
    }

    public function my_agents(Request $request){
        return view('pages.seller.myAgents');
    }
}
