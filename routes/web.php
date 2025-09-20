<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipSuratController;
use App\Http\Controllers\KategoriSuratController;

// =======================
// Halaman utama → daftar arsip surat
// =======================
Route::get('/', [ArsipSuratController::class, 'index'])->name('arsip.index');

// Arsip Surat (CRUD + Download)
Route::get('/arsip', [ArsipSuratController::class, 'index'])->name('arsip.index');
Route::get('/arsip/create', [ArsipSuratController::class, 'create'])->name('arsip.create');
Route::post('/arsip', [ArsipSuratController::class, 'store'])->name('arsip.store');
Route::delete('/arsip/{id}', [ArsipSuratController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsip/{id}', [ArsipSuratController::class, 'show'])->name('arsip.show');
Route::get('/arsip/{id}/download', [ArsipSuratController::class, 'download'])->name('arsip.download');
Route::get('/arsip/{id}/edit', [ArsipSuratController::class, 'edit'])->name('arsip.edit');
Route::put('/arsip/{id}', [ArsipSuratController::class, 'update'])->name('arsip.update');

// =======================
// Kategori Surat (CRUD)
// =======================
Route::get('/kategori', [KategoriSuratController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriSuratController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriSuratController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriSuratController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriSuratController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriSuratController::class, 'destroy'])->name('kategori.destroy');

// =======================
// About
// =======================
Route::get('/about', function () {
    return view('about');
})->name('about');
