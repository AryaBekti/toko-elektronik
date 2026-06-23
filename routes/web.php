<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;

// ── Redirect root ke login
Route::get('/', fn() => redirect()->route('login'));

// ── AUTH (publik, tanpa login) ──────────────────────────
Route::get('/login',  [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ── PERLU LOGIN (admin & user) ──────────────────────────
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Produk — semua user bisa lihat
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

    // ── KHUSUS ADMIN ───────────────────────────────────
    Route::middleware('admin')->group(function () {

        // CRUD Kategori
        Route::get('/kategori',           [KategoriController::class, 'index']) ->name('kategori.index');
        Route::get('/kategori/create',    [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('/kategori',          [KategoriController::class, 'store']) ->name('kategori.store');
        Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])  ->name('kategori.edit');
        Route::put('/kategori/{id}',      [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/{id}',   [KategoriController::class, 'destroy'])->name('kategori.destroy');

        // CRUD Produk (admin)
        Route::get('/produk/create',      [ProdukController::class, 'create']) ->name('produk.create');
        Route::post('/produk',            [ProdukController::class, 'store'])  ->name('produk.store');
        Route::get('/produk/{id}/edit',   [ProdukController::class, 'edit'])   ->name('produk.edit');
        Route::put('/produk/{id}',        [ProdukController::class, 'update']) ->name('produk.update');
        Route::delete('/produk/{id}',     [ProdukController::class, 'destroy'])->name('produk.destroy');
    });
});
