<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        return view('pengajuan.index');
    }

    public function statistik()
    {
        return view('pengajuan.statistik');
    }
}
