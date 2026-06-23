@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('content')
<div class="card" style="max-width:580px">
    <h2 style="color:#1E3A5F;margin-bottom:20px">Edit Kategori</h2>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama Kategori <span style="color:red">*</span></label>
            <input type="text" name="nama_kategori"
                   value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
            @error('nama_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="3">
{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div style="display:flex;gap:8px">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection
