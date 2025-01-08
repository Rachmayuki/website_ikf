@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-left mb-4">Detail Struktur Organisasi</h1>

    <div class="card shadow-lg border-0 mb-4" style="border-radius: 15px;">
        <div class="row g-0 align-items-center">
            <div class="col-md-5">
                @if ($strukturOrganisasi->foto)
                    <img src="{{ asset('storage/' . $strukturOrganisasi->foto) }}" class="img-fluid rounded-start" alt="Foto" style="object-fit: cover; height: 250px; width: 100%;">
                @else
                    <img src="https://via.placeholder.com/300x250" class="img-fluid rounded-start" alt="No Image" style="object-fit: cover; height: 250px; width: 100%;">
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h2 class="card-title mb-3">{{ $strukturOrganisasi->nama }}</h2>
                    <p class="card-text">
                        <strong>Jabatan:</strong> {{ $strukturOrganisasi->jabatan }}
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Dibuat pada: {{ $strukturOrganisasi->created_at->format('d M Y') }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <a href="{{ route('struktur_organisasi.index') }}" class="btn btn-primary mt-3">Kembali</a>
    <!-- <button>
            <a href="{{ route('struktur_organisasi.index') }}" class="btn btn-outline-primary">Kembali
    </button> -->
</div>
@endsection
