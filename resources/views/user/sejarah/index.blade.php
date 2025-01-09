@extends('layouts.user')

@section('title', 'Sejarah IKF NTT')

@section('content')
<div class="text-center">
    <!-- Judul -->
    <h1 class="mb-4">{{ $profilSejarah->judul }}</h1>

    <!-- Gambar -->
    @if($profilSejarah->gambar)
        <img src="{{ asset('storage/' . $profilSejarah->gambar) }}" alt="Sejarah" class="img-fluid rounded" style="max-width: 60%; height: auto;">
    @endif

    <!-- Teks -->
    <p class="mt-4" style="text-align: justify; font-size: 1.1rem; line-height: 1.8;">
        {{ $profilSejarah->teks }}
    </p>

    <!-- Tombol Kembali -->
    <div class="mb-4">
        <button class="btn btn-outline-secondary" onclick="history.back()">
            kembali
        </button>
    </div>
</div>
@endsection
