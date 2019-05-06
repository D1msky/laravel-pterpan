<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Detail_SkripsiController extends Controller
{
    public function index($id_skripsi)
    {
        //dd($id_skripsi);
        $catatan = \App\Detail_Skripsi::where('id_skripsi',$id_skripsi)->get();
        return view('detail_skripsi.index',['catatan' => $catatan,'id_skripsi' => $id_skripsi]);
    }

    public function create(Request $request)
    {
        $detail = \App\Detail_Skripsi::create($request->all());
        $id_skripsi = '/detail_skripsi/'.$request->id_skripsi;
        return redirect($id_skripsi)->with('sukses','Data Catatan Berhasil Diinputkan!');
    }

    public function edit($id_dtl)
    {
        $detail = \App\Detail_Skripsi::find($id_dtl);
        return view('detail_skripsi.edit',['detail' => $detail]);
    }

    public function update(Request $request)
    {
        $detail = \App\Detail_Skripsi::find($request->id_dtl);
        $id_skripsi = '/detail_skripsi/'.$request->id_skripsi;
        $detail->update($request->all());
        return redirect($id_skripsi)->with('sukses','Data Catatan Berhasil Diupdate!');
    }

    public function delete($id_dtl)
    {
        $detail = \App\Detail_Skripsi::find($id_dtl);  
        $id_skripsi = '/detail_skripsi/'.$detail->id_skripsi;
        $detail->delete();
        return redirect($id_skripsi)->with('sukses','Data Catatan Berhasil Dihapus!');
    }
}
