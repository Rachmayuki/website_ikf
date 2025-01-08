@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Galeri</h1>
    <a href="{{ route('galeri.create') }}" class="btn btn-primary mb-4">Tambah Galeri</a>

    {{-- Bagian Foto --}}
    <h2 class="mb-3">Foto</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($galeri->where('type', 'foto') as $foto)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $foto->file_path) }}" class="card-img-top" alt="{{ $foto->judul }}" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $foto->judul }}</h5>
                        <div class="card-text" style="max-height: 100px; overflow-y: auto;">
                            <p>{{ $foto->deskripsi }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('galeri.edit', $foto->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('galeri.destroy', $foto->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada foto yang tersedia.</p>
        @endforelse
    </div>

    {{-- Bagian Video --}}
    <h2 class="mt-5 mb-3">Video</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($galeri->where('type', 'video') as $video)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <video controls class="w-100" style="object-fit: cover; height: 200px;">
                        <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">{{ $video->judul }}</h5>
                        <div class="card-text" style="max-height: 100px; overflow-y: auto;">
                            <p>{{ $video->deskripsi }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('galeri.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('galeri.destroy', $video->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada video yang tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
