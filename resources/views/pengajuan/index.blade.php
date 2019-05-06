@extends('layouts.master')

@section('alert')
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
    {{session('sukses')}}
    </div>
@endif
@endsection
@section('judul')
<h1 class="h3 mb-0 text-gray-800">Pengajuan</h1>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="col-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Judul Skripsi</h6>
        </div>
        <div class="card-body">
            @if(auth()->user()->role == "Mahasiswa")
                @if(auth()->user()->mahasiswa->pengajuan)

                @else
                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Tambah Pengajuan
                </button>
                @endif
            @endif
            <br><br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul Skripsi</th>
                            @if(auth()->user()->role == "Dosen")
                            <th>Nama Mahasiswa</th>
                            @else
                            <th>Nama Dosen</th>
                            @endif
                            <th>Status</th>
                            <th>Tgl Acc</th>
                            <th>Tgl Selesai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengajuan as $pengajuan)
                        <tr>
                            <td>{{$pengajuan->judul}}</td>
                            @if(auth()->user()->role == "Dosen")
                            <td>{{$pengajuan->mahasiswa->nama}}</td>
                            @else
                            <td>{{$pengajuan->dosen->nama}}</td>
                            @endif
                            <td>
                                @if($pengajuan->status == "Diterima")
                                    <button class="btn btn-success">{{$pengajuan->status}}</button>
                                @elseif($pengajuan->status == "Diproses")
                                    <button class="btn btn-warning">{{$pengajuan->status}}</button>
                                @else
                                    <button class="btn btn-danger">{{$pengajuan->status}}</button>
                                @endif
                            </td>
                            <td>{{$pengajuan->tgl_acc}}</td>
                            <td>{{$pengajuan->tgl_selesai}}</td>
                            <td>
                                <a href="/pengajuan/{{$pengajuan->id_pengajuan}}/edit"><button class="btn btn-warning">Edit</button></a>
                                @if($pengajuan->skripsi()->count() > 0)
                                <a href="/skripsi/{{$pengajuan->id_pengajuan}}"><button class="btn btn-success">Detail</button></a>
                                @endif
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pengajuan/create" method="POST">
                    {{csrf_field()}}
                    @if(auth()->user()->role == "Mahasiswa")
                    <input name= "id_mhs" type="hidden" class="form-control" aria-describedby="emailHelp" value="{{auth()->user()->mahasiswa->id_mhs}}">
                    @endif
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul Mahasiswa</label>
                        <input name= "judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Judul">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Dosen</label>
                        <select name="id_dosen" class="form-control" id="exampleFormControlSelect1">
                            @foreach($dosen as $dosen)
                            <option value="{{$dosen->id_dosen}}">{{$dosen->nama}}</option>
                            @endforeach
                        </select>
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