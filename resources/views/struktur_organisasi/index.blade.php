@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Struktur Organisasi IKF</h1>
    <a href="{{ route('struktur_organisasi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('struktur_organisasi.show', $item->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('struktur_organisasi.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('struktur_organisasi.destroy', $item->id) }}" method="POST" style="display:inline;">
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
