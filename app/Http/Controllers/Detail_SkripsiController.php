<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Detail_SkripsiController extends Controller
{
    public function index($id_skripsi)
    {
        $catatan = \App\Detail_Skripsi::where('id_skripsi',$id_skripsi)->get();
        return view('skripsi.catatan',['catatan' => $catatan]);
    }

    public function create()
    {
        # code...
    }
}
