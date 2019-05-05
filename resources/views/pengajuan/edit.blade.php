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
            <h6 class="m-0 font-weight-bold text-primary">Edit Pengajuan</h6>
        </div>
        <div class="card-body">
            <form action="/pengajuan/{{$pengajuan->id_pengajuan}}/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM" value="{{$pengajuan->judul}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dosen</label>
                    <input name="dosen" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama" value="{{$pengajuan->dosen->nama}}" disabled>
                </div>
                @if(auth()->user()->role == "Dosen")
                <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                            @if($pengajuan->status == "Diproses")
                            <option value="Diproses" selected>Diproses</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Diterima">Diterima</option>
                            @elseif($pengajuan->status == "Ditolak")
                            <option value="Diproses">Diproses</option>
                            <option value="Ditolak" selected>Ditolak</option>
                            <option value="Diterima">Diterima</option>
                            @else
                            <option value="Diproses">Diproses</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Diterima" selected>Diterima</option>
                            @endif
                        </select>
                </div>
                @else
                <div class="form-group">
                    <input name="status" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama" value="Diproses" hidden>
                </div>
                @endif
                <button class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection