@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div style="max-width:400px;margin:60px auto">
    <div class="card">
        <h2 style="margin-bottom:20px;color:#1E3A5F">Login</h2>

        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $e)
                    <div>{{ $e }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%">Login</button>
        </form>

        <p style="margin-top:14px;font-size:12px;color:#888;line-height:1.6">
            Admin : admin@toko.com / admin123<br>
            User  : user@toko.com  / user123
        </p>
    </div>
</div>
@endsection
