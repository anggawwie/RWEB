<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // CREATE → POST /produk
    public function store(Request $request)
    {
        $data = Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id
        ]);

        return response()->json($data, 201);
    }

    // READ → GET /produk
    public function index()
    {
        return Produk::all();
    }

    // UPDATE → PUT /produk
    public function update(Request $request)
    {
        $produk = Produk::find($request->id);

        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id
        ]);

        return response()->json($produk);
    }

    // DELETE → DELETE /produk
    public function destroy(Request $request)
    {
        $produk = Produk::find($request->id);

        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $produk->delete();

        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
