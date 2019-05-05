<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class SkripsiController extends Controller
{
    public function index($id_pengajuan)
    {
        $skripsi = \App\Skripsi::where('id_pengajuan',$id_pengajuan)->get();
        return view('skripsi.index',['skripsi' => $skripsi]);
    }

    public function edit($id_skripsi)
    {
        $skripsi = \App\Skripsi::find($id_skripsi);
        return view('skripsi.index',['skripsi' => $skripsi]);
    }

    public function update(Request $request,$id_skripsi)
    {
        $skripsi = \App\Skripsi::find($id_skripsi);
        $id_pengajuan = '/skripsi/'.$skripsi->id_pengajuan;
        if($skripsi->judul == "BAB 4"){
            if($request->status == "Diterima"){
                #tgl_acc
            }
        }

        if($skripsi->file){
            unlink(public_path('pengajuan/'.$skripsi->file));
        }

        $skripsi->update($request->all());
        if($request->hasFile('file')){
            $filename = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move('pengajuan/',$filename);
            $skripsi->file = $filename;
            $skripsi->save();
        }


        return redirect($id_pengajuan)->with('sukses','Data Skripsi Berhasil Diupdated !');
    }
}
