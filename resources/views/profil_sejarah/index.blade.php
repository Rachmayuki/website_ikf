@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sejarah IKF Kabupaten Sorong</h1>
    @if (session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($profilSejarah)
        <table class="table mt-4">
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
                    <td>{{ $profilSejarah->judul }}</td>
                    <td>{{ $profilSejarah->teks }}</td>
                    <td>
                        @if ($profilSejarah->gambar)
                            <img src="{{ asset('storage/' . $profilSejarah->gambar) }}" alt="Gambar" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('profil_sejarah.show', $profilSejarah->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('profil_sejarah.edit', $profilSejarah->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('profil_sejarah.destroy', $profilSejarah->id) }}" method="POST" style="display: inline-block;">
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
