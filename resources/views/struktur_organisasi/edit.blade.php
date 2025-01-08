@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Struktur Organisasi</h1>
    <form action="{{ route('struktur_organisasi.update', $strukturOrganisasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $strukturOrganisasi->nama }}" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $strukturOrganisasi->jabatan }}" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <div class="mb-2">
                @if ($strukturOrganisasi->foto)
                    <img src="{{ asset('storage/' . $strukturOrganisasi->foto) }}" alt="Foto" width="100">
                @endif
            </div>
            <input type="file" name="foto" id="foto" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>
@endsection
