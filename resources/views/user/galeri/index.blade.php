@extends('layouts.user')

@section('title', 'Galeri')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Galeri</h1>

    @if($galeri->isEmpty())
        <p class="text-center text-muted">Belum ada data galeri yang tersedia.</p>
    @else
        <!-- Foto -->
        <h2 class="mb-4">Foto</h2>
        <div class="row">
            @foreach($galeri->where('type', 'foto') as $foto)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $foto->file_path) }}" class="card-img-top" alt="{{ $foto->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $foto->judul }}</h5>
                            <p class="card-text">{{ $foto->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Video -->
        <h2 class="mt-5 mb-4">Video</h2>
        <div class="row">
            @foreach($galeri->where('type', 'video') as $video)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <video controls class="card-img-top">
                            <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->judul }}</h5>
                            <p class="card-text">{{ $video->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    <!-- Tombol Kembali -->
        <div class="mb-4">
            <button class="btn btn-outline-secondary" onclick="history.back()">kembali</button>
        </div>
    @endif
</div>

@endsection
