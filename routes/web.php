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
Route::post('/Dashboard', [LoginController::class, 'Login'])->name('Login');
Route::get('/Dashboard', [LoginController::class, 'DashboardPemilik'])->name('DashboardPemilik');
Route::get('/Dashboard', [LoginController::class, 'DashboardPetanis'])->name('DashboardPetani');
