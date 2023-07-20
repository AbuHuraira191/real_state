<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
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
        session()->put('role', $request['role']);
        session()->put('email', $request['email']);

        return redirect()->route($request['role'].'_index');
    }

    public function logout(){
        Session::flush();
        return redirect()->route('index');
    }

    public function index()
    {
        return view('pages.index');
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

    public function property_detail()
    {
        return view('pages.property-detail');
    }

    public function register()
    {
        return view('pages.register');
    }
}
