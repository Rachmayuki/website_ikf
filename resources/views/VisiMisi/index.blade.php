@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Visi Misi</h1>
    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($visiMisi)
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Teks</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $visiMisi->judul }}</td>
                    <td>{{ Str::limit($visiMisi->teks, 50) }}</td>
                    <td>
                        @if ($visiMisi->gambar)
                            <img src="{{ asset('storage/' . $visiMisi->gambar) }}" alt="Gambar" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('visi_misi.show', $visiMisi->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('visi_misi.edit', $visiMisi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('visi_misi.destroy', $visiMisi->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Data belum tersedia. Silakan tambahkan data di halaman admin.</p>
    @endif
</div>
@endsection
