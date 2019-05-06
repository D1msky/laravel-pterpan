@extends('layouts.master')

@section('head')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('judul')
<h1 class="h3 mb-0 text-gray-800">Skripsi</h1>
@endsection
@section('content')
<!-- Basic Card Example -->
<div class="col-sm-2"></div>
<div class="col-sm-7">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Skripsi</h6>
        </div>
        <div class="card-body">
            <form action="/skripsi/{{$skripsi->id_skripsi}}/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="id_skripsi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$skripsi->id_skripsi}}" hidden>
                <input name="id_pengajuan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$skripsi->id_pengajuan}}" hidden>
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$skripsi->judul}}" disabled>
                </div>
                @if(auth()->user()->role == "Mahasiswa")
                <div class="form-group">
                <label for="exampleInputEmail1">File</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input name="file" type="file" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">
                                @if($skripsi->file)
                                    {{$skripsi->file}}
                                @else
                                    Choose file
                                @endif
                            </label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                        </div>
                    </div>
                    <script>
                    // Add the following code if you want the name of the file appear on select
                    $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    });
                    </script>
                </div>
                <div class="form-group">
                    <label for="datepicker">Tanggal Awal</label>                  
                                <input name="tgl_awal" id="datepicker" width="276" value="{{$skripsi->tgl_awal}}"/>
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                </div>
                <div class="form-group">
                    <label for="datepicker" >Tanggal Akhir</label>                  
                                <input name="tgl_akhir" id="datepicker1" width="276"  value="{{$skripsi->tgl_akhir}}"/>
                                <script>
                                    $('#datepicker1').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                </div>
                @else
                <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                            @if($skripsi->status == "Diproses")
                            <option value="Diproses" selected>Diproses</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Diterima">Diterima</option>
                            @elseif($skripsi->status == "Ditolak")
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
                @endif
                <button class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection