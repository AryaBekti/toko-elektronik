@extends('layouts.app')
@section('title', 'Kategori')
@section('content')
<div class="page-header">
    <h2>Data Kategori</h2>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
</div>
<table>
    <thead>
        <tr>
            <th>No</th><th>Nama Kategori</th><th>Deskripsi</th>
            <th>Jml Produk</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategori as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->nama_kategori }}</td>
            <td>{{ $k->deskripsi ?? '-' }}</td>
            <td>{{ $k->produk->count() }}</td>
            <td>
                <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST"
                      style="display:inline"
                      onsubmit="return confirm('Hapus kategori ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
