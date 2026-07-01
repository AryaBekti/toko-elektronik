<style>
nav { background:#1E3A5F; padding:0 28px; display:flex;
      align-items:center; justify-content:space-between; height:54px; }
nav .brand { color:#fff; font-size:16px; font-weight:700; text-decoration:none; }
nav .links { display:flex; gap:4px; align-items:center; }
nav .links a { color:#adc8e6; text-decoration:none; padding:6px 13px;
               border-radius:5px; font-size:13px; }
nav .links a:hover,
nav .links a.active { background:rgba(255,255,255,.15); color:#fff; }
nav .right { display:flex; align-items:center; gap:10px; }
nav .user-name { color:#adc8e6; font-size:12px; }
nav form { margin:0; }
nav .btn-out { background:rgba(255,255,255,.12); color:#fff; border:none;
               padding:6px 13px; border-radius:5px; font-size:13px; cursor:pointer; }
nav .btn-out:hover { background:rgba(255,255,255,.22); }
</style>

@auth
<nav>
    <a class="brand" href="{{ route('dashboard') }}">Toko Elektronik</a>

    <div class="links">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('produk.index') }}">Produk</a>
        <a href="{{ route('statistik.index') }}">Statistik</a>
        @if(Auth::user()->isAdmin())
            <a href="{{ route('kategori.index') }}">Kategori</a>
        @endif
    </div>

    <div class="right">
        <span class="user-name">
            {{ Auth::user()->name }}
            <span class="badge {{ Auth::user()->isAdmin() ? 'badge-admin' : 'badge-user' }}">
                {{ Auth::user()->role }}
            </span>
        </span>
        <form action="{{ route('logout') }}" method="GET">
            <button class="btn-out" type="submit">Logout</button>
        </form>
    </div>
</nav>
@endauth
