@extends('layouts.app')

@section('content')
<div class="container">
    <h1>AD/ART IKF</h1>

    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($adArt)
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $adArt->judul }}</td>
                    <td>{{ Str::limit($adArt->deskripsi, 50) }}</td>
                    <td>
                        @if ($adArt->file)
                            <a href="{{ asset('storage/' . $adArt->file) }}" target="_blank">Lihat File</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('ad_art.show', $adArt->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('ad_art.edit', $adArt->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('ad_art.destroy', $adArt->id) }}" method="POST" style="display:inline;">
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
