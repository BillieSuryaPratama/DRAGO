<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\HalAkunPemilik;
use App\Http\Controllers\LogoutController;

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/berandapemilik', [PemilikController::class, 'index'])->name('berandapemilik');
Route::get('/berandapetani/{id}', [PetaniController::class, 'index'])->name('berandapetani');
Route::get('/akunpetani/{id}', [PetaniController::class, 'akunpetani'])->name('akunpetani');
Route::get('/akunpetani/edit/{id}', [PetaniController::class, 'editAkunPetani'])->name('editAkunPetani');
Route::post('/akunpetani/edit/{id}', [PetaniController::class, 'updatePetani'])->name('updatePetani');
Route::get('/tambahgambar/{id}', [PetaniController::class, 'tambahGambar'])->name('tambahgambar');
Route::get('/riwayatDeteksi/{id}', [PetaniController::class, 'riwayatDeteksi'])->name('riwayatDeteksi');
Route::post('/hasilDeteksi/{id}', [PetaniController::class, 'hasilDeteksi'])->name('hasilDeteksi');




Route::get('/akun_halPemilik', [HalAkunPemilik::class, 'showHalAkun'])->name('akun_HalPemilik');
Route::get('/akunPribadi_halPemilik', [HalAkunPemilik::class, 'showHalAkunPribadi'])->name('akunPribadi_halPemilik');
Route::get('ubahakunPribadi_halPemilik', [HalAkunPemilik::class, 'edit'])->name('editAkun');
Route::post('ubahakunPribadi_halPemilik', [HalAkunPemilik::class, 'update'])->name('akunpribadi.update');
Route::get('/akunPetani_halPemilik', [HalAkunPemilik::class, 'showHalAkunPetani'])->name('akunpetani_halPemilik');
Route::get('/detailpetani/{id}', [HalAkunPemilik::class, 'detailpetani'])->name('detailpetani');
Route::put('/detailpetani/{id}', [HalAkunPemilik::class, 'hapusAkun'])->name('hapusAkun');
Route::get('/tambahakun', [HalAkunPemilik::class, 'showFormTambahAkun'])->name('tambahakun');
Route::post('/tambahakun/simpan', [HalAkunPemilik::class, 'tambahAkunPetani'])->name('tambahAkunPetani.simpan');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

