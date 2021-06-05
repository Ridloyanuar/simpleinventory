<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth/login');
    }

    // authentikasi login
    public function authenticate(Request $requestFields)
    {   
        $attributes = $requestFields->only(['username', 'password']);
        if (Auth::guard('admin')->attempt($attributes)) {
            return redirect()->intended('admin/user/all');
        }

        return redirect()->back()->with('alert','Password / Username yang anda masukan salah');
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();

        return redirect('/login/admin');
    }
}
