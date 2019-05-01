<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

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
        $usr->name = $request->nama;
        $usr->email = $request->email;
        if($request->password != $mhs->password){
            $usr->password = bcrypt($request->password);
            $request->merge(['password' => $usr->password]);
        }
        $usr->save();
        $mhs->update($request->all());

        return redirect('/mahasiswa')->with('sukses','Data Mahasiswa Berhasil Diupdated');
    }

    public function create(Request $request)
    {
        $user = new \App\User();
        $user->role = 'Mahasiswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $request->merge(['password' => $user->password]);
        \App\Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('sukses','Data Mahasiswa Berhasil Diinput');
    }

    public function delete($id_mhs)
    {
        $mhs = \App\Mahasiswa::find($id_mhs);
        $usr = \App\User::find($mhs->user_id);
        $mhs->delete();
        $usr->delete();
        return redirect('/mahasiswa')->with('sukses','Data Mahasiswa Berhasil Dihapus !');
    }
}
