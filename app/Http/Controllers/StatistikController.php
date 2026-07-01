<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

class StatistikController extends Controller
{
    public function index()
    {
        // Data jumlah produk per kategori
        $kategori = Kategori::withCount('produk')->get();

        // Data total stok per kategori
        $stokPerKategori = Kategori::with('produk')->get()->map(function($k) {
            return [
                'nama'  => $k->nama_kategori,
                'stok'  => $k->produk->sum('stok'),
                'total' => $k->produk->count(),
            ];
        });

        // Total keseluruhan
        $totalProduk   = Produk::count();
        $totalKategori = Kategori::count();
        $totalStok     = Produk::sum('stok');

        return view('statistik.index', compact(
            'kategori',
            'stokPerKategori',
            'totalProduk',
            'totalKategori',
            'totalStok'
        ));
    }
}