@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Galeri</h1>
    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $galeri->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $galeri->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <select name="type" id="type" class="form-control" required>
                <option value="foto" {{ $galeri->type === 'foto' ? 'selected' : '' }}>Foto</option>
                <option value="video" {{ $galeri->type === 'video' ? 'selected' : '' }}>Video</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="file_path" class="form-label">File (opsional)</label>
            <input type="file" name="file_path" id="file_path" class="form-control">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah file.</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
