@extends('layouts.master')

@section('alert')
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
    {{session('sukses')}}
    </div>
@endif
@endsection

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Mahasiswa</h1>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="col-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
                Tambah Mahasiswa
            </button>
            <br><br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mhs as $data)
                        <tr>
                            <td>{{$data->nim}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->password}}</td>
                            <td>
                                <a href="/mahasiswa/{{$data->id_mhs}}/edit"><button class="btn btn-warning">Edit</button></a>
                                <a href="/mahasiswa/{{$data->id_mhs}}/delete"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action="/mahasiswa/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIM</label>
                        <input name="nim" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="nama" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection