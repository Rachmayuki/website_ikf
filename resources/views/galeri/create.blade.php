@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Galeri</h1>
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <select name="type" id="type" class="form-control" required>
                <option value="foto">Foto</option>
                <option value="video">Video</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="file_path" class="form-label">File</label>
            <input type="file" name="file_path" id="file_path" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
