<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasi = \App\Notifikasi::where('user_id',auth()->user()->id)->get();
        return view('notifikasi.index',['notifikasi' => $notifikasi]);
    }
}
