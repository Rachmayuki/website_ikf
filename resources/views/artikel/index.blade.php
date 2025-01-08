@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Artikel</h1>
    <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Data</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Teks</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artikel as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ Str::limit($item->teks, 50) }}</td>
                <td>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('artikel.show', $item->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" style="display: inline-block;">
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
