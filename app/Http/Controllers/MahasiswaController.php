<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mhs = \App\Mahasiswa::all();
        return view('mahasiswa.index',['mhs' => $mhs]);
    }

    public function edit($id_mhs)
    {
        $mhs = \App\Mahasiswa::find($id_mhs);
        return view('mahasiswa.edit',['mhs' => $mhs]); 
    }

    public function update(Request $request,$id_mhs)
    {
        $mhs = \App\Mahasiswa::find($id_mhs);
        $usr = \App\User::find($mhs->user_id);
        $usr->email = $request->email;
        $usr->password = $request->password;
        $usr-save();
        $mhs->update($request->all());

        return redirect('/mahasiswa')->with('sukses','Data Berhasil Diupdated');
    }

    public function delete($id_mhs)
    {
        $mhs = \App\Mahasiswa::find($id_mhs);
        $usr = \App\User::find($mhs->user_id);
        $mhs->delete();
        $usr->delete();
        return redirect('/mahasiswa')->with('sukses','Data Berhasil Dihapus !');
    }
}
