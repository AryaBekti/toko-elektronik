<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_produk' => 'required|string|max:100',
            'kode_produk' => 'required|string|max:20|unique:produk,kode_produk',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
        ]);
        Produk::create($request->all());
        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk   = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_produk' => 'required|string|max:100',
            'kode_produk' => 'required|string|max:20|unique:produk,kode_produk,'.$id,
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
        ]);
        Produk::findOrFail($id)->update($request->all());
        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }
}
