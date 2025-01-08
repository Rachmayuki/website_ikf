@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data Profil Sejarah</h1>
    <form action="{{ route('profil_sejarah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="teks">Teks</label>
            <textarea name="teks" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
