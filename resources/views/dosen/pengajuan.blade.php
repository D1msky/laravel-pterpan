@extends('layouts.master')

@section('alert')
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
    {{session('sukses')}}
    </div>
@endif
@endsection
@section('judul')
<h1 class="h3 mb-0 text-gray-800">Dosen</h1>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="col-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosen as $data)
                        <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->email}}</td>
                            <td>
                                <a href="/pengajuan/{{$data->id_dosen}}/detail"><button class="btn btn-warning">Detail Pengajuan</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection