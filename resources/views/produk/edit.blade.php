@extends('layouts.app')
@section('title', 'Edit Produk')
@section('content')
<div class="card" style="max-width:580px">
    <h2 style="color:#1E3A5F;margin-bottom:20px">Edit Produk</h2>
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Kategori <span style="color:red">*</span></label>
            <select name="kategori_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                <option value="{{ $k->id }}"
                    {{ old('kategori_id',$produk->kategori_id)==$k->id ? 'selected':'' }}>
                    {{ $k->nama_kategori }}</option>
                @endforeach
            </select>
            @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Nama Produk <span style="color:red">*</span></label>
            <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}">
            @error('nama_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Kode Produk <span style="color:red">*</span></label>
            <input type="text" name="kode_produk" value="{{ old('kode_produk', $produk->kode_produk) }}">
            @error('kode_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Harga <span style="color:red">*</span></label>
            <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" min="0">
            @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Stok <span style="color:red">*</span></label>
            <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}" min="0">
            @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Foto Produk</label>
            @if($produk->foto)
                <div style="margin-bottom:8px">
                    <img src="{{ asset('storage/'.$produk->foto) }}"
                         width="120" style="border-radius:6px;border:1px solid #ddd">
                    <p style="font-size:12px;color:#888">Foto saat ini</p>
                </div>
            @endif
            <input type="file" name="foto" accept="image/*">
            <small style="color:#888">Kosongkan jika tidak ingin mengubah foto</small>
            @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div style="display:flex;gap:8px">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('produk.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection