<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            
            return redirect('/dashboard');
            
        }else{
            return redirect()->back()->with('alert','Password / Username yang anda masukan salah');
        }
    }
}