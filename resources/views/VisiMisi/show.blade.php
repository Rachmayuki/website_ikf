@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $visiMisi->judul }}</h1>
    @if ($visiMisi->gambar)
        <img src="{{ asset('storage/' . $visiMisi->gambar) }}" alt="Gambar" width="300">
    @endif
    <p>{{ $visiMisi->teks }}</p>
    <br>
    <a href="{{ route('visi_misi.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
