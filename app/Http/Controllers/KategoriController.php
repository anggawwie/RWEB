<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // CREATE → POST /kategori/create
    public function store(Request $request)
    {
        $data = Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return response()->json($data, 201);
    }

    // READ → GET /kategori/read
    public function index()
    {
        return Kategori::all();
    }

    // UPDATE → PUT /kategori/update
    public function update(Request $request)
    {
        $kategori = Kategori::find($request->id);

        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return response()->json($kategori);
    }

    // DELETE → DELETE /kategori/delete
    public function destroy(Request $request)
    {
        $kategori = Kategori::find($request->id);

        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        $kategori->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
