<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\DeteksiController;

// Rute untuk landing page
Route::get('/', function () {
    return view('landingpage');
});

// Rute untuk menampilkan form login (GET)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses login (POST)
Route::post('/login', [LoginController::class, 'login']);

// Rute untuk Beranda Pemilik
Route::get('/berandapemilik', [PemilikController::class, 'index'])->name('berandapemilik');

// Rute untuk Beranda Petani
Route::get('/berandapetani', [PetaniController::class, 'index'])->name('berandapetani');
Route::get('/akunpetani', [PetaniController::class, 'akunpetani'])->name('akunpetani');
Route::get('/deteksi', DeteksiController::class, 'index')->name('deteksi');
Route::get('/tambahgambar', DeteksiController::class, 'unggah')->name('tambahgambar');



