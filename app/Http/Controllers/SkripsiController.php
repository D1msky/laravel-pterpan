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
        return view('skripsi.edit',['skripsi' => $skripsi]);
    }

    public function update(Request $request,$id_skripsi)
    {
        $skripsi = \App\Skripsi::find($id_skripsi);
        //dd($request->file);
        if($request->status == "Ditolak"){
            $notifikasi = \App\Notifikasi::create(['pesan' => $skripsi->judul.' anda Ditolak !', 'user_id' => $skripsi->pengajuan->mahasiswa->user_id,'status' => 'Ditolak']);
        }
        $id_pengajuan = '/skripsi/'.$skripsi->id_pengajuan;
        if($skripsi->judul == "BAB 4"){
            if($request->status == "Diterima"){
                $pengajuan = \App\Pengajuan::find($request->id_pengajuan);
                $pengajuan->tgl_selesai= date('Y-m-d');
                $pengajuan->save();
            }
        }
        $request->merge(['tgl_awal' => date('Y-m-d', strtotime($request->tgl_awal)),'tgl_akhir' => date('Y-m-d', strtotime($request->tgl_akhir))]);
        if($request->hasFile('file')){
            if($skripsi->file){
                unlink(public_path('pengajuan_upload/'.$skripsi->file));
            }
            $skripsi->update($request->all());
            if($request->hasFile('file')){
                $filename = time().'_'.$request->file('file')->getClientOriginalName();
                $request->file('file')->move('pengajuan_upload/',$filename);
                $skripsi->file = $filename;
                $skripsi->save();
            }
        }else{
            $skripsi->update($request->all());
        }
    

        return redirect($id_pengajuan)->with('sukses','Data Skripsi Berhasil Diupdated !');
    }

    public function download($file)
    {
        return response()->download(public_path('pengajuan_upload/'.$file));
    }
}
