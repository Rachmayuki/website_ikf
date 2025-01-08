@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $adArt->judul }}</h1>
    <p>{{ $adArt->deskripsi }}</p>
    @if ($adArt->file)
        <a href="{{ asset('storage/' . $adArt->file) }}" class="btn btn-info" target="_blank">Lihat File</a>
    @endif
    <a href="{{ route('ad_art.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
