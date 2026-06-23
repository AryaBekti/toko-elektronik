@extends('layouts.app')
@section('title', 'Produk')
@section('content')
<div class="page-header">
    <h2>Data Produk</h2>
    @if(Auth::user()->isAdmin())
        <a href="{{ route('produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    @endif
</div>
<table>
    <thead>
        <tr>
            <th>No</th><th>Nama Produk</th><th>Kode</th>
            <th>Kategori</th><th>Harga</th><th>Stok</th>
            @if(Auth::user()->isAdmin())<th>Aksi</th>@endif
        </tr>
    </thead>
    <tbody>
        @foreach($produk as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama_produk }}</td>
            <td>{{ $p->kode_produk }}</td>
            <td>{{ $p->kategori->nama_kategori }}</td>
            <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
            <td>{{ $p->stok }}</td>
            @if(Auth::user()->isAdmin())
            <td>
                <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('produk.destroy', $p->id) }}" method="POST"
                      style="display:inline"
                      onsubmit="return confirm('Hapus produk ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
