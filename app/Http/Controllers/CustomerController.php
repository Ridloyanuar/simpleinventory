<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function login(Request $requestFields) 
    {
        $attributes = $requestFields->only(['username', 'password']);
        
        if (Auth::attempt($attributes)) {
            return redirect()->intended('/');
        }
        
        return redirect()->back()->with('alert','Password / Username yang anda masukan salah');
    }

    public function register(Request $request) 
    {
        $customer = new Customer();
        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        
        if ($request->password == $request->password_confirmation) {
            $customer->save();
            return redirect('/login');
        }

        return redirect()->back()->with('alert','Pastikan password sesuai');
    }
}
