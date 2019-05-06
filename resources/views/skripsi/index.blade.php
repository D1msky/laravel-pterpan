@extends('layouts.master')

@section('alert')
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
    {{session('sukses')}}
    </div>
@endif
@endsection
@section('judul')
<h1 class="h3 mb-0 text-gray-800">Skripsi</h1>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="col-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload Bab</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Bab</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skripsi as $skripsi)
                        <tr>
                            <td>{{$skripsi->judul}}</td>
                            <td>{{$skripsi->tgl_awal}}</td>
                            <td>{{$skripsi->tgl_akhir}}</td>
                            <td>
                                @if($skripsi->status == "Diterima")
                                    <button class="btn btn-success">{{$skripsi->status}}</button>
                                @elseif($skripsi->status == "Diproses")
                                    <button class="btn btn-warning">{{$skripsi->status}}</button>
                                @else
                                    <button class="btn btn-danger">{{$skripsi->status}}</button>
                                @endif
                            </td>
                            <td>
                                @if($skripsi->file)
                                <a href="/skripsi/download/{{$skripsi->file}}">Download File</a>
                                @else
                                <a href="#">File Tidak Tersedia</a>
                                @endif
                            </td>
                            <td>
                                <a href="/skripsi/{{$skripsi->id_skripsi}}/edit"><button class="btn btn-warning">Edit</button></a>
                                <a href="/detail_skripsi/{{$skripsi->id_skripsi}}"><button class="btn btn-success">Detail</button></a>
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