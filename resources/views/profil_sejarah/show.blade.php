@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $profilSejarah->judul }}</h1>
    @if ($profilSejarah->gambar)
        <img src="{{ asset('storage/' . $profilSejarah->gambar) }}" alt="Gambar" class="img-fluid">
    @endif  
    <p>{{ $profilSejarah->teks }}</p>
    <a href="{{ route('profil_sejarah.index') }}"><button>Kembali</button></a>
    <!-- <a href="{{ route('profil_sejarah.index') }}" class="btn btn-secondary mt-4">Kembali</a> -->
</div>
@endsection
