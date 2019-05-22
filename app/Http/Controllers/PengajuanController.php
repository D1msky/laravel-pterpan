<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PengajuanController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == "Admin" or auth()->user()->role =="Kaprodi"){
            $pengajuan = \App\Pengajuan::all();
        }elseif(auth()->user()->role =="Dosen"){
            $pengajuan = \App\Pengajuan::where('id_dosen',auth()->user()->dosen->id_dosen)->get();
        }   
        else{
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
        //dd($request);
        $nim = auth()->user()->mahasiswa->nim;
        $dosen = \App\Dosen::where('id_dosen',$request->id_dosen)->first();
        $notifikasi = \App\Notifikasi::create(['pesan' => $nim.' Pengajuan Skripsi dengan judul '.$request->judul, 'user_id' => $dosen->user_id,'status' => 'Sukses']);
        $pengajuan = \App\Pengajuan::create($request->all());
        return redirect('/pengajuan')->with('sukses','Data Pengajuan Berhasil Diinputkan!');
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
            if($skripsi == 0){
                $notifikasi = \App\Notifikasi::create(['pesan' => 'Pengajuan Telah Diterima', 'status' => 'Sukses', 'user_id' => $pengajuan->mahasiswa->user_id]);
                $request->request->add(['tgl_acc' => date('Y-m-d H:i:s')]);
                \App\Skripsi::create(['id_pengajuan' => $id_pengajuan,'judul' => 'BAB 1','status' => 'Diproses']);
                \App\Skripsi::create(['id_pengajuan' => $id_pengajuan,'judul' => 'BAB 2','status' => 'Diproses']);
                \App\Skripsi::create(['id_pengajuan' => $id_pengajuan,'judul' => 'BAB 3','status' => 'Diproses']);
                \App\Skripsi::create(['id_pengajuan' => $id_pengajuan,'judul' => 'BAB 4','status' => 'Diproses']);
            }
        }elseif($request->status == "Ditolak"){
            $notifikasi = \App\Notifikasi::create(['pesan' => 'Pengajuan Ditolak', 'status' => 'Ditolak', 'user_id' => $pengajuan->mahasiswa->user_id]);
            
        }
        $pengajuan->update($request->all());

        return redirect('/pengajuan')->with('sukses','Data Pengajuan Berhasil Diupdated!');
    }

    public function statistik()
    {
        $statistik = \App\Pengajuan::whereNotNull('tgl_selesai')->get();

        $nim = [];
        $lama = [];
        foreach($statistik as $stk){
            $nim[] = $stk->mahasiswa->nim;
            $tgl1 = Carbon::parse($stk->tgl_selesai);
            $tgl2 = Carbon::parse($stk->tgl_acc);
          
            $lama[] = $tgl1->diffInMonths($tgl2);
        }
        //dd(json_encode($lama));
        return view('pengajuan.statistik',['statistik' => $statistik,'nim' => json_encode($nim),'lama' => json_encode($lama)]);
    }

    public function filter(Request $request)
    {
        //dd($request->tgl2);
        $statistik = \App\Pengajuan::where('tgl_selesai','>',date('Y-m-d', strtotime($request->tgl1)))->where('tgl_selesai', '<' ,date('Y-m-d', strtotime($request->tgl2)))->get();

        $nim = [];
        $lama = [];
        foreach($statistik as $stk){
            $nim[] = $stk->mahasiswa->nim;
            $tgl1 = Carbon::parse($stk->tgl_selesai);
            $tgl2 = Carbon::parse($stk->tgl_acc);
          
            $lama[] = $tgl1->diffInMonths($tgl2);
        }
        //dd(json_encode($lama));
        return view('pengajuan.statistik',['statistik' => $statistik,'nim' => json_encode($nim),'lama' => json_encode($lama)]);
    }
}
