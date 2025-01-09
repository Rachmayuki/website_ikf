@extends('layouts.user')

@section('title', 'Visi Misi IKF NTT')

@section('content')
    <div class="text-center">
        <!-- Judul -->
        <h1 class="mb-4">{{ $visiMisi->judul }}</h1>

        <!-- Gambar -->
        @if($visiMisi->gambar)
            <img src="{{ asset('storage/' . $visiMisi->gambar) }}" alt="Visi Misi" class="img-fluid rounded" style="max-width: 60%; height: auto;">
        @endif

        <!-- Teks -->
        <p class="mt-4" style="text-align: justify; font-size: 1.1rem; line-height: 1.8;">
            {{ $visiMisi->teks }}
        </p>

        <!-- Tombol Kembali -->
        <div class="mb-4">
            <button class="btn btn-outline-secondary" onclick="history.back()">
                kembali
            </button>
        </div>
    </div>
@endsection
