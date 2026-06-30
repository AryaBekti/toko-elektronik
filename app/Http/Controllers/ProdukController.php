<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk', 'public');
        }

        Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'kode_produk' => $request->kode_produk,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'foto'        => $fotoPath,
        ]);

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
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        $fotoPath = $produk->foto;
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('produk', 'public');
        }

        $produk->update([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'kode_produk' => $request->kode_produk,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'foto'        => $fotoPath,
        ]);

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        // Hapus foto dari storage
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }
        $produk->delete();
        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }
}