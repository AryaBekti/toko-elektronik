@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('content')
<div class="card" style="max-width:580px">
    <h2 style="color:#1E3A5F;margin-bottom:20px">Tambah Kategori</h2>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Kategori <span style="color:red">*</span></label>
            <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}">
            @error('nama_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div style="display:flex;gap:8px">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection
