@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah AD/ART</h1>
    <form action="{{ route('ad_art.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
        </div>
        <br>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
