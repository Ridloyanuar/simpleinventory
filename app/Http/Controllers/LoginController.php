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
        if (Auth::attempt($attributes)) {
            $id= Auth::id();
            $role = User::find($id);
            
            return redirect('/user/all');
            
        }else{
            return redirect()->back()->with('alert','Password / Username yang anda masukan salah');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
