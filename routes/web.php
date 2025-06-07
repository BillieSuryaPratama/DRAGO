<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DeteksiPenyakitController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjadwalanController;

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/Login', [LoginController::class, 'showHalLogin'])->name('showHalLogin');
Route::get('/LupaPassword', [LoginController::class, 'showHalLupaPassword'])->name('showHalLupaPassword');
Route::post('/ubah-password', [LoginController::class, 'ubahPassword'])->name('ubahPassword');
Route::post('/proses-login', [LoginController::class, 'Login'])->name('Login');
Route::post('/proses-logout', [LoginController::class, 'Logout'])->name('Logout');
Route::get('/DashboardPemilik', [LoginController::class, 'DashboardPemilik'])->name('DashboardPemilik');
Route::get('/DashboardPetani', [LoginController::class, 'DashboardPetani'])->name('DashboardPetani');

Route::get('/halPetani', [AkunController::class, 'showHalPetani'])->name('showHalPetani');
Route::get('/halDetailPetani/{id}', [AkunController::class, 'showHalDetailPetani'])->name('showHalDetailPetani');
Route::delete('/hapus-akun/{id}', [AkunController::class, 'hapusAkun'])->name('hapusAkun');
Route::get('/halTambahPetani', [AkunController::class, 'showHalTambahAkunPetani'])->name('showHalTambahAkunPetani');
Route::post('/tambah-petani', [AkunController::class, 'Simpan'])->name('Simpan');
Route::get('/halAkunPemilik', [AkunController::class, 'showHalAkun'])->name('showHalAkunPemilik');
Route::get('/halAkunPetani', [AkunController::class, 'showHalAkun'])->name('showHalAkunPetani');
Route::get('/halFormUbahData/{id}', [AkunController::class, 'showHalFormUbahData'])->name('showHalFormUbahData');
Route::post('/update-akun', [AkunController::class, 'SimpanPerubahan'])->name('SimpanPerubahan');

Route::get('/halDeteksi', [DeteksiPenyakitController::class, 'showHalDeteksi'])->name('showHalDeteksi');
