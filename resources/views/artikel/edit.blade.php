@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Artikel</h1>
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $artikel->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="teks" class="form-label">Teks</label>
            <textarea class="form-control" id="teks"b name="teks" rows="5" required>{{ $artikel->teks }}</textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            @if ($artikel->gambar)
                <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar" width="100" class="mb-3">
            @endif
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
