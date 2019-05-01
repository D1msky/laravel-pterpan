<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use Illuminate\Cache\RedisTaggedCache;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index',['dosen' => $dosen]);
    }

    public function pengajuan()
    {
        $dosen = Dosen::all();
        return view('dosen.pengajuan',['dosen' => $dosen]);
    }

    public function create(Request $request)
    {
        //dd($request);
        $user = new \App\User();
        $user->role = $request->status;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $request->merge(['password' => $user->password]);
        Dosen::create($request->all());

        return redirect('/dosen')->with('sukses','Data Dosen Berhasil Diinputkan!');
    }

    public function edit($id_dosen)
    {
        $dosen = Dosen::find($id_dosen);
        return view('dosen.edit',['dosen' => $dosen]);
    }

    public function update(Request $request,$id_dosen)
    {
        $dosen =Dosen::find($id_dosen);
        $usr = \App\User::find($dosen->user_id);
        $usr->name = $request->nama;
        $usr->email = $request->email;
        if($request->password != $dosen->password){
            $usr->password = bcrypt($request->password);
            $request->merge(['password' => $usr->password]);
        }
        $usr->save();

        $dosen->update($request->all());

        return redirect('/dosen')->with('sukses','Data Dosen Berhasil Diupdated!');
    }

    public function delete($id_dosen)
    {
        $dosen = Dosen::find($id_dosen);
        $user = \App\User::find($dosen->user_id);
        $user->delete();
        $dosen->delete();

        return redirect('/dosen')->with('sukses','Data Dosen Berhasil Dihapus !');
    }
}
