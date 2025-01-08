@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Anggota</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama Lengkap: {{ $keanggotaan->nama_lengkap }}</h5>
            <p class="card-text"><strong>Tempat Lahir:</strong> {{ $keanggotaan->tempat_lahir }}</p>
            <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $keanggotaan->tanggal_lahir }}</p>
            <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $keanggotaan->jenis_kelamin }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $keanggotaan->alamat }}</p>
            <p class="card-text"><strong>No. HP:</strong> {{ $keanggotaan->no_hp }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('keanggotaan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
