@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Galeri</h1>
    <div class="card">
        @if($galeri->type === 'foto')
            <img src="{{ asset('storage/' . $galeri->file_path) }}" class="card-img-top" alt="{{ $galeri->judul }}">
        @else
            <video controls class="w-100">
                <source src="{{ asset('storage/' . $galeri->file_path) }}" type="video/mp4">
            </video>
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $galeri->judul }}</h5>
            <p class="card-text">{{ $galeri->deskripsi }}</p>
            <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
