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
        $user = \App\User::find($mhs->user_id);
        return view('mahasiswa.edit',['mhs' => $mhs, 'user' => $user]); 
    }

    public function update(Request $request,$id_mhs)
    {
        return "update";
    }

    public function delete($id_mhs)
    {
        $mhs = \App\Mahasiswa::find($id_mhs);
        $mhs->delete();
        return redirect('/mahasiswa')->with('sukses','Data Berhasil Dihapus !');
    }
}
