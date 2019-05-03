<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function index()
    {
        return view('skripsi.index');
    }
    
    public function detail($id_pengajuan)
    {
        $skripsi = \App\Skripsi::where('id_pengajuan',$id_pengajuan)->get();
        return view('skripsi.index',['skripsi' => $skripsi]);
    }
}
