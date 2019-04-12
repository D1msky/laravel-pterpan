<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index');   
    }

    public function postlogin(Request $request)
    {
        //dd($request->all());
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/mahasiswa');
        }
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
    }
}
