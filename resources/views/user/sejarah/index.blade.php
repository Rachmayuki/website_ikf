@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="text-center">IKF NTT Kabupaten Sorong</h1>
    <div class="row text-center mt-4">
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block">Profil</a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block">Galeri</a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block">Informasi Sektor & Anggota</a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block">Pengumuman</a>
        </div>
    </div>

    <div class="row text-center mt-4">
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block">Agenda</a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block">Forum</a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block">Artikel</a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block">Donasi & Sponsor</a>
        </div>
    </div>

    <h2 class="mt-5">Liputan Acara</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="path/to/image1.jpg" class="img-fluid">
            <p>Kegiatan Inovasi 2024...</p>
        </div>
        <div class="col-md-6">
            <img src="path/to/image2.jpg" class="img-fluid">
            <p>Kegiatan Inovasi 2024...</p>
        </div>
    </div>

    <h2 class="mt-5">Kegiatan Sosial</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="path/to/image3.jpg" class="img-fluid">
            <p>Kegiatan Sosial...</p>
        </div>
        <div class="col-md-6">
            <img src="path/to/image4.jpg" class="img-fluid">
            <p>Kegiatan Sosial...</p>
        </div>
    </div>
</div>
@endsection
