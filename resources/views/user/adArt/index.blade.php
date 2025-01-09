@extends('layouts.user')

@section('title', 'AD/ART IKF NTT')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h2 class="mb-4">Anggaran Dasar dan Anggaran Rumah Tangga IKF Kabupaten Sorong</h2>
        
        @if($adArt)

            <!-- Deskripsi -->
            <p class="mt-3" style="text-align: justify; font-size: 1.1rem; line-height: 1.8;">
                {{ $adArt->deskripsi }}
            </p>

            <!-- File Download -->
            @if($adArt->file)
                <a href="{{ asset('storage/' . $adArt->file) }}" class="btn btn-primary mt-3" target="_blank">
                    <i class="bi bi-file-earmark-arrow-down"></i> Unduh File
                </a>
            @endif
        @else
            <p class="text-muted">Data AD/ART belum tersedia.</p>
        @endif
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-4 text-center">
        <button class="btn btn-outline-secondary" onclick="history.back()">
            Kembali
        </button>
    </div>
</div>
@endsection
