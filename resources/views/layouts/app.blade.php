<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Elektronik')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { background: #f0f2f5; }
        .container { max-width: 1100px; margin: 28px auto; padding: 0 20px; }
        .alert { padding: 10px 16px; border-radius: 6px; margin-bottom: 14px; font-size: 13px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error   { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        table { width: 100%; border-collapse: collapse; background: #fff;
                border-radius: 8px; overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,.08); }
        th { background: #1E3A5F; color: #fff; padding: 11px 14px; text-align: left; font-size: 13px; }
        td { padding: 10px 14px; border-bottom: 1px solid #eee; font-size: 13px; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #fafafa; }
        .btn { display:inline-block; padding:7px 16px; border-radius:5px; font-size:13px;
               text-decoration:none; border:none; cursor:pointer; font-weight:500; }
        .btn-primary { background:#1E3A5F; color:#fff; }
        .btn-warning { background:#e6a817; color:#fff; }
        .btn-danger  { background:#c0392b; color:#fff; }
        .btn-success { background:#27ae60; color:#fff; }
        .btn:hover   { opacity:.88; }
        .card { background:#fff; border-radius:10px; padding:24px;
                box-shadow:0 1px 4px rgba(0,0,0,.08); }
        .form-group { margin-bottom: 15px; }
        label { display:block; font-size:13px; font-weight:600; margin-bottom:5px; color:#333; }
        input[type=text], input[type=number], input[type=email],
        input[type=password], textarea, select {
            width:100%; padding:9px 12px; border:1px solid #ccc;
            border-radius:5px; font-size:13px; }
        input:focus, textarea:focus, select:focus {
            outline:none; border-color:#1E3A5F; box-shadow:0 0 0 2px #d6e4f0; }
        .invalid-feedback { color:#c0392b; font-size:12px; margin-top:4px; }
        .badge { padding:3px 10px; border-radius:12px; font-size:11px; font-weight:600; }
        .badge-admin { background:#1E3A5F; color:#fff; }
        .badge-user  { background:#e8f4fd; color:#1E3A5F; }
        .page-header { display:flex; justify-content:space-between;
                       align-items:center; margin-bottom:16px; }
        .page-header h2 { color:#1E3A5F; font-size:20px; }
    </style>
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
