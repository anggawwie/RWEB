<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    // CREATE → /pelanggan/create
    public function store(Request $request)
    {
        $data = Pelanggan::create([
            'nama'   => $request->nama,
            'email'  => $request->email,
            'alamat' => $request->alamat
        ]);

        return response()->json($data, 201);
    }

    // READ → /pelanggan/read
    public function index()
    {
        return Pelanggan::all();
    }

    // UPDATE → /pelanggan/update
    public function update(Request $request)
    {
        $pelanggan = Pelanggan::find($request->id);

        if (!$pelanggan) {
            return response()->json(['message' => 'Pelanggan tidak ditemukan'], 404);
        }

        $pelanggan->update([
            'nama'   => $request->nama,
            'email'  => $request->email,
            'alamat' => $request->alamat
        ]);

        return response()->json($pelanggan);
    }

    // DELETE → /pelanggan/delete
    public function destroy(Request $request)
    {
        $pelanggan = Pelanggan::find($request->id);

        if (!$pelanggan) {
            return response()->json(['message' => 'Pelanggan tidak ditemukan'], 404);
        }

        $pelanggan->delete();

        return response()->json(['message' => 'Pelanggan berhasil dihapus']);
    }
}
