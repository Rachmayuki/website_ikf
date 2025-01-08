@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $artikel->judul }}</h1>
    <br>
    @if ($artikel->gambar)
        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar" class="img-fluid">
    @endif
    <p>{{ $artikel->teks }}</p>
    <a href="{{ route('artikel.index') }}" class="btn btn-secondary mt-4">Kembali</a>
</div>  
@endsection
