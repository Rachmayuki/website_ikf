@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Visi Misi</h1>
    <form action="{{ route('visi_misi.update', $visiMisi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $visiMisi->judul }}" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="teks" class="form-label">Teks</label>
            <textarea name="teks" id="teks" class="form-control" required>{{ $visiMisi->teks }}</textarea>
        </div>
        <br>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            @if ($visiMisi->gambar)
                <img src="{{ asset('storage/' . $visiMisi->gambar) }}" alt="Gambar" width="100" class="d-block mb-2">
            @endif
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
