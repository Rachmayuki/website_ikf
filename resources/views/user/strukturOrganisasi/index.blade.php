@extends('layouts.user')

@section('title', 'Struktur Organisasi')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">Struktur Organisasi IKF Kabupaten Sorong</h1>
        <div class="row">
            @forelse($strukturOrganisasi as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <!-- Foto -->
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 250px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-user.png') }}" class="card-img-top" alt="Default Image" style="height: 250px; object-fit: cover;">
                        @endif

                        <!-- Detail -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->jabatan }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Data struktur organisasi belum tersedia.</p>
            @endforelse
        </div>
        <!-- Tombol Kembali -->
        <div class="mb-4">
            <button class="btn btn-outline-secondary" onclick="history.back()">
                kembali
            </button>
        </div>
    </div>
</div>
@endsection
