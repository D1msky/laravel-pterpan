<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = \App\User::all();
        
        return view('users.index',['user' => $user]);
    }
}
