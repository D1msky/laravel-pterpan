@extends('layouts.master')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Catatan</h1>
@endsection

@section('content')
<!-- Basic Card Example -->
<div class="col-sm-2"></div>
<div class="col-sm-7">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Catatan</h6>
        </div>
        <div class="card-body">
            <form action="/detail_skripsi/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                        <input name="id_skripsi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama" value="{{$detail->id_skripsi}}" hidden>
                        <input name="id_dtl" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama" value="{{$detail->id_dtl}}" hidden>
                </div>
                <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$detail->catatan}}</textarea>
                </div>
                <button class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection