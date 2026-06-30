@extends('layouts.app')
@section('title', 'Tambah Produk')
@section('content')
<div class="card" style="max-width:580px">
    <h2 style="color:#1E3A5F;margin-bottom:20px">Tambah Produk</h2>
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Kategori <span style="color:red">*</span></label>
            <select name="kategori_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                <option value="{{ $k->id }}" {{ old('kategori_id')==$k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}</option>
                @endforeach
            </select>
            @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Nama Produk <span style="color:red">*</span></label>
            <input type="text" name="nama_produk" value="{{ old('nama_produk') }}">
            @error('nama_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Kode Produk <span style="color:red">*</span></label>
            <input type="text" name="kode_produk" value="{{ old('kode_produk') }}">
            @error('kode_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Harga <span style="color:red">*</span></label>
            <input type="number" name="harga" value="{{ old('harga') }}" min="0">
            @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Stok <span style="color:red">*</span></label>
            <input type="number" name="stok" value="{{ old('stok') }}" min="0">
            @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Foto Produk</label>
            <input type="file" name="foto" accept="image/*">
            <small style="color:#888">Format: jpg, jpeg, png. Maksimal 2MB</small>
            @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div style="display:flex;gap:8px">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('produk.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection