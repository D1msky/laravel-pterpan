@extends('layouts.home')

@section('content')
<body class="text-center">

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">Sistem Pengajuan Skripsi</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="/">Home</a>
        @if(auth()->user())
          @if(auth()->user()->role == "Admin")
          <a class="nav-link" href="/mahasiswa">Dashboard</a>
          @elseif(auth()->user()->role == "Dosen" || auth()->user()->role == "Mahasiswa")
          <a class="nav-link" href="/pengajuan">Dashboard</a>
          @elseif(auth()->user()->role == "Kaprodi")
          <a class="nav-link" href="/statistik">Dashboard</a>
          @endif
        @else
        <a class="nav-link" href="/login">Login</a>
        @endif
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h1 class="cover-heading">Sistem Informasi Pengajuan Skripsi</h1>
    <p class="lead"></p>
    <p class="lead">
      <a href="#" class="btn btn-lg btn-secondary">Peterpan 2019</a>
    </p>
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by peterpan@2019</a>.</p>
    </div>
  </footer>
</div>

@endsection