@extends('layouts.user')

@section('title', 'Keanggotaan')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Keanggotaan</h1>

    @if($keanggotaan->isEmpty())
        <p class="text-center text-muted">Belum ada data keanggotaan yang tersedia.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keanggotaan as $key => $anggota)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $anggota->nama_lengkap }}</td>
                            <td>{{ $anggota->jenis_kelamin }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-4 text-center">
        <a href="{{ route('user.home.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>
@endsection
