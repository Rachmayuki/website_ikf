@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Struktur Organisasi</h1>
    <form action="{{ route('struktur_organisasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
