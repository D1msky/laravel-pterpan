@extends('layouts.master')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Pengajuan</h1>
@endsection
@section('content')
<!-- Basic Card Example -->
<div class="col-sm-2"></div>
<div class="col-sm-7">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Pengjuan</h6>
        </div>
        <div class="card-body">
            <form action="/mahasiswa/{{$mhs->id_mhs}}/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM" value="{{$mhs->nim}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama" value="{{$mhs->nama}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$mhs->email}}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$mhs->password}}">
                </div>
                <button class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection