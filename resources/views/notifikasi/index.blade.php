@extends('layouts.master')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Notifikasi</h1>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="col-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Notifikasi</h6>
        </div>
        <div class="card-body">
            <br><br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Notifikasi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notifikasi as $notifikasi)
                        <tr>
                            <td>{{$notifikasi->pesan}}</td>
                            <td>{{$notifikasi->created_at}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection