<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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
