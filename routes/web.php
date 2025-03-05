<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    // Group authentication and verified
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori', [KategoriController::class,'store'])->name('kategori.store');
    Route::get('kategori/{param}', [KategoriController::class, 'detail'])->name('kategori.detail');
    Route::put('kategori/{param}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/{param}', [KategoriController::class, 'delete'])->name('kategori.delete');

    // Route produk
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('produk', [ProdukController::class,'store'])->name('produk.store');
    Route::get('produk/{param}', [ProdukController::class, 'detail'])->name('produk.detail');
    Route::put('produk/{param}', [ProdukController::class, 'update'])->name('produk.update');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
