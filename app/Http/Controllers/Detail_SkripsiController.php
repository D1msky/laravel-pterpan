<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Detail_SkripsiController extends Controller
{
    public function index($id_skripsi)
    {
        $catatan = \App\Detail_Skripsi::where('id_skripsi',$id_skripsi)->get();
        return view('detail_skripsi.index',['catatan' => $catatan]);
    }

    public function create(Request $request)
    {
        $detail = \App\Detail_Skripsi::create($request->all());
        $id_skripsi = '/detail_skripsi/'.$request->id_skripsi;
        return redirect($id_skripsi)->with('sukses','Data Catatan Berhasil Diinputkan!');
    }

    public function edit($id_dtl)
    {
        
    }

    public function update(Request $request,$id_dtl)
    {
        # code...
    }

    public function delete($id_dtl)
    {
        $detail = \App\Detail_Skripsi::find($id_dtl);  
        $id_skripsi = '/detail_skripsi/'.$detail->id_skripsi;
        $detail->delete();
        return redirect($id_skripsi)->with('sukses','Data Catatan Berhasil Dihapus!');
    }
}
