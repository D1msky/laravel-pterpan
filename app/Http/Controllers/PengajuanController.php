<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index($id_dosen)
    {
        $pengajuan = \App\Pengajuan::where('id_dosen',$id_dosen)->get();
        //dd($pengajuan[1]->dosen);
        return view('pengajuan.index',['pengajuan' => $pengajuan]);
    }

    public function detail(Type $var = null)
    {
        # code...
    }

    public function create(Request $request)
    {
        $pengajuan = \App\Pengajuan::create($request->all());
        return redirect('/dosen')->with('sukses','Data Pengjuan Berhasil Diinputkan!');
    }

    public function edit($id_pengajuan)
    {
        $pengajuan = \App\Pengajuan::find($id_pengajuan);
        return view('pengajuan.edit',['pengajuan' => $pengajuan]);
    }

    public function statistik()
    {
        return view('pengajuan.statistik');
    }
}
