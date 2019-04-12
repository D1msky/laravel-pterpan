@extends('layouts.master')

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
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bab 1</td>
                                    <td>20 Feb 2019</td>
                                    <td><button type="button" class="btn btn-warning">Belum Diterima</button></td>
                                    <form action="#">
                                            <td>
                                                    <a href="">File Tidak Tersedia</a>
                                            </td>
                                            <td>
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                            </td>
                                    </form>  
                                </tr>
                                <tr>
                                    <td>Bab 2</td>
                                    <td>21 Feb 2019</td>
                                    <td><button type="button" class="btn btn-success">Diterima</button></td>
                                    <form action="#">
                                            <td>
                                                    <a href="">Download File</a>
                                            </td>
                                            <td>
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                            </td>
                                    </form>  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
</div>
@endsection