<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == "Admin" or  auth()->user()->role =="Dosen" or auth()->user()->role =="Kaprodi"){
            $pengajuan = \App\Pengajuan::all();
        }else{
            //dd(auth()->user()->mahasiswa->id_mhs);
            $pengajuan = \App\Pengajuan::where('id_mhs',auth()->user()->mahasiswa->id_mhs)->get();
        }
        
        $dosen = \App\Dosen::all();
        //$pengajuan = \App\Pengajuan::where('id_dosen',$id_dosen)->get();
        //dd($pengajuan[1]->dosen);
        return view('pengajuan.index',['pengajuan' => $pengajuan,'dosen' => $dosen]);
    }


    public function create(Request $request)
    {
        $request->request->add(['status' => "Diproses"]);
        dd($request);
        $pengajuan = \App\Pengajuan::create($request->all());
        return redirect('/dosen')->with('sukses','Data Pengjuan Berhasil Diinputkan!');
    }

    public function edit($id_pengajuan)
    {
        $pengajuan = \App\Pengajuan::find($id_pengajuan);
        return view('pengajuan.edit',['pengajuan' => $pengajuan]);
    }

    public function update(Request $request,$id_pengajuan)
    {
        $pengajuan = \App\Pengajuan::find($id_pengajuan);
        if($request->status == "Diterima"){
            $skripsi = \App\Skripsi::where('id_pengajuan',$id_pengajuan)->count();
            $request->request->add(['tgl_acc' => date('Y-m-d H:i:s')]);
            if($skripsi == 0){
                \App\Skripsi::create(['id_pengajuan' => $id_pengajuan,'judul' => 'BAB 1','status' => 'Diproses']);
                \App\Skripsi::create(['id_pengajuan' => $id_pengajuan,'judul' => 'BAB 2','status' => 'Diproses']);
                \App\Skripsi::create(['id_pengajuan' => $id_pengajuan,'judul' => 'BAB 3','status' => 'Diproses']);
                \App\Skripsi::create(['id_pengajuan' => $id_pengajuan,'judul' => 'BAB 4','status' => 'Diproses']);
            }
        }
        $pengajuan->update($request->all());
    }

    public function statistik()
    {
        return view('pengajuan.statistik');
    }
}
