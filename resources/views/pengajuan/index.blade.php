@extends('layouts.master')

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
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
                Tambah Pengajuan
            </button>
            <br><br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul Skripsi</th>
                            <th>Dosen</th>
                            <th>Status</th>
                            <th>Tgl Acc</th>
                            <th>Tgl Selesai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sistem Informasi Bank Sampah</td>
                            <td>Lussy</td>
                            <td><button class="btn btn-warning">Diproses</button></td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <a href=""><button class="btn btn-warning">Edit</button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Sistem Informasi Pelacakan Koruptor</td>
                            <td>Lussy</td>
                            <td><button class="btn btn-success">Diterima</button></td>
                            <td>12-01-2019</td>
                            <td>-</td>
                            <td>
                                <a href=""><button class="btn btn-warning">Edit</button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Sistem Informasi Pencatatan Kepolisian</td>
                            <td>Lussy</td>
                            <td><button class="btn btn-danger">Ditolak</button></td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <a href=""><button class="btn btn-warning">Edit</button></a>
                            </td>
                        </tr>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul Mahasiswa</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Judul">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Dosen</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Lussy</option>
                            <option>Halim</option>
                            <option>Argo</option>
                            <option>Erick</option>
                            <option>Katon</option>
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