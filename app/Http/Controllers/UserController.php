<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\Dealer;
use App\Models\Property;
use App\Models\Seller;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $user_service;

    public function __construct(UserServices $user_service)
    {
        $this->user_service = $user_service;
    }


    public function signup(SignupRequest $request){

        $res = $this->user_service->signup($request);

        if ($res){
            $role = session('role');
            return redirect()->route($role.'_index');
        }else{
            return redirect()->route('index');
        }

    }

    public function loginPage(){
        return view('pages.login');
    }

    public function login(LoginRequest $request){
        $user_role = $request['role'];
        session()->put('role', $user_role);
        session()->put('email', $request['email']);

        $user_data = $this->user_service->getUser();
        session()->put('user', $user_data);


        return redirect()->route($user_role.'_index');
    }

    public function logout(){
        Session::flush();
        return redirect()->route('index');
    }

    public function index()
    {
        $properties = Property::where('bid_status', 'on')->limit(13)->get();

//        dd($properties);
        return view('pages.index',compact('properties'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function agents()
    {
        return view('pages.agents');
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function blogdetail()
    {
        return view('pages.blogdetail');
    }

    public function buysalerent()
    {
        return view('pages.buysalerent');
    }

    public function property_detail($id)
    {
        $property = Property::where('id', $id)->first();
        $hot_properties = Property::where('hot_status','yes')->take(4)->get();

        if ($property['act_seller_id'] != null){
            $dealer_detail = Seller::find($property['act_seller_id']);
        }else{
            $dealer_detail = Dealer::find($property['act_dealer_id']);
        }
        return view('pages.property-detail',compact('property','hot_properties','dealer_detail'));
    }

    public function register()
    {
        return view('pages.register');
    }
}
