@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Keanggotaan</h1>
    <a href="{{ route('keanggotaan.create') }}" class="btn btn-primary mb-3">Tambah Anggota Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keanggotaan as $anggota)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $anggota->nama_lengkap }}</td>
                    <td>{{ $anggota->no_hp }}</td>
                    <td>
                        <a href="{{ route('keanggotaan.show', $anggota->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('keanggotaan.edit', $anggota->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('keanggotaan.destroy', $anggota->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
