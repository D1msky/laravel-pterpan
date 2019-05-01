@extends('layouts.master')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Dosen</h1>
@endsection

@section('content')
<!-- Basic Card Example -->
<div class="col-sm-2"></div>
<div class="col-sm-7">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Dosen</h6>
        </div>
        <div class="card-body">
            <form action="/dosen/{{$dosen->id_dosen}}/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama" value="{{$dosen->nama}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$dosen->email}}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$dosen->password}}">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                            @if($dosen->status == "Dosen")
                            <option selected>Dosen</option>
                            <option >Kaprodi</option>
                            @else
                            <option>Dosen</option>
                            <option selected>Kaprodi</option>
                            @endif
                        </select>
                    </div>
                <button class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection