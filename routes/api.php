<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import semua controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// =========================
// 1. AUTH (Tanpa Token)
// =========================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// =========================
// 2. ROUTE PROTECTED (Pakai Token Sanctum)
// =========================
Route::middleware('auth:sanctum')->group(function () {

    // PRODUK
    Route::post('/produk/create', [ProdukController::class, 'store']);
    Route::get('/produk/read', [ProdukController::class, 'index']);
    Route::put('/produk/update', [ProdukController::class, 'update']);
    Route::delete('/produk/delete', [ProdukController::class, 'destroy']);

    // KATEGORI
    Route::post('/kategori/create', [KategoriController::class, 'store']);
    Route::get('/kategori/read', [KategoriController::class, 'index']);
    Route::put('/kategori/update', [KategoriController::class, 'update']);
    Route::delete('/kategori/delete', [KategoriController::class, 'destroy']);

    // PELANGGAN
    Route::post('/pelanggan/create', [PelangganController::class, 'store']);
    Route::get('/pelanggan/read', [PelangganController::class, 'index']);
    Route::put('/pelanggan/update', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/delete', [PelangganController::class, 'destroy']);
});

