<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front/front_home');
    }

    public function shop() 
    {
        return view('front/front_shop');
    }

    public function about()
    {
        return view('front/front_about');
    }

    public function contact()
    {
        return view('front/front_about');
    }
}
