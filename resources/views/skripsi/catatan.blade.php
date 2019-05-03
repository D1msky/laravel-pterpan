@extends('layouts.master')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Catatan Dosen</h1>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="col-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catatan Dosen</h6>
        </div>
        <div class="card-body">
            @if(auth()->user()->role == "Dosen")
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
                Tambah Catatan
            </button>
            @endif
            <br><br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Bab</th>
                            <th>Catatan</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catatan as $catatan)
                        <tr>
                            <td>{{$catatan->skripsi->judul}}</td>
                            <td>{{$catatan->catatan}}</td>
                            <td>{{$catatan->created_at}}</td>
                            <td>
                                <a href=""><button class="btn btn-warning">Edit</button></a>
                                <a href=""><button class="btn btn-danger">Delete</button></a>
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
                <form action="/detail_skripsi/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Bab</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Bab 1</option>
                            <option>Bab 2</option>
                            <option>Bab 3</option>
                            <option>Bab 4</option>
                            <option>Bab 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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