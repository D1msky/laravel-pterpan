<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        if(auth()->user()){
            return redirect('/');
        }else{
            return view('login.index'); 
        }  
    }

    public function postlogin(Request $request)
    {
        //dd($request->all());
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }
        return redirect('/login')->with('gagal','Email/Password Salah !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
