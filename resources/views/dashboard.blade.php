@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="card">
    <h2 style="color:#1E3A5F;margin-bottom:12px">Dashboard</h2>
    <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
    <p style="color:#666;font-size:13px;margin-top:6px">
        Email: {{ Auth::user()->email }} &nbsp;|&nbsp;
        Role: <span class="badge {{ Auth::user()->isAdmin() ? 'badge-admin' : 'badge-user' }}">
            {{ Auth::user()->role }}</span>
    </p>
    <div style="margin-top:20px;display:flex;gap:10px;flex-wrap:wrap">
        <a href="{{ route('produk.index') }}" class="btn btn-primary">Lihat Produk</a>
        @if(Auth::user()->isAdmin())
            <a href="{{ route('kategori.index') }}" class="btn btn-success">Kelola Kategori</a>
        @endif
    </div>
</div>
@endsection
