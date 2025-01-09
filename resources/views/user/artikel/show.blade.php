@extends('layouts.user')

@section('title', $artikel->judul)

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">{{ $artikel->judul }}</h1>

        <!-- Gambar Artikel -->
        @if($artikel->gambar)
            <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid rounded mb-4" style="max-width: 60%; height: auto;">
        @endif

        <!-- Teks Artikel -->
        <p class="text-justify" style="font-size: 1.1rem; line-height: 1.8;">
            {{ $artikel->teks }}
        </p>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('user.home.index') }}" class="btn btn-outline-secondary">
        </i> Kembali</a>
    </div>
</div>
@endsection
