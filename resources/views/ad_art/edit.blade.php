@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit AD/ART</h1>
    <form action="{{ route('ad_art.update', $adArt->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $adArt->judul }}" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $adArt->deskripsi }}</textarea>
        </div>
        <br>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <div class="mb-2">
                @if ($adArt->file)
                    <a href="{{ asset('storage/' . $adArt->file) }}" target="_blank">Lihat File</a>
                @endif
            </div>
            <input type="file" name="file" id="file" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah file.</small>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
