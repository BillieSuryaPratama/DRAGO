<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DeteksiPenyakitController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjadwalanController;
use App\Models\DeteksiPenyakit;

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
Route::post('/proses-deteksi', [DeteksiPenyakitController::class, 'Deteksi'])->name('Deteksi');
Route::get('/halRiwayatDeteksi', [DeteksiPenyakitController::class, 'showHalRiwayatDeteksi'])->name('showHalRiwayatDeteksi');
Route::get('/halDetailDeteksi/{id}', [DeteksiPenyakitController::class, 'showHalDetailDeteksi'])->name('showHalDetailDeteksi');

Route::get('/halLaporanPetani', [LaporanController::class, 'showHalLaporanPetani'])->name('showHalLaporanPetani');
Route::get('/halTambahLaporan', [LaporanController::class, 'showHalTambahLaporan'])->name('showHalTambahLaporan');
Route::post('/tambah-laporan', [LaporanController::class, 'Simpan'])->name('Simpan_laporan');
Route::get('/halDetaillaporan/{id}', [LaporanController::class, 'showHalDetailLaporan'])->name('showHalDetailLaporan');
Route::post('/update-laporan', [LaporanController::class, 'SimpanPerubahan'])->name('SimpanPerubahanLaporan');
Route::delete('/hapus-laporan/{id}', [LaporanController::class, 'HapusLaporan'])->name('HapusLaporan');
Route::get('/halLaporanPemilik', [LaporanController::class, 'showHalLaporanPemilik'])->name('showHalLaporanPemilik');
Route::get('/filterLaporan',[LaporanController::class, 'filterLaporan'])->name('filterLaporan');

Route::get('/halPenjadwalan', [PenjadwalanController::class, 'showHalPenjadwalan'])->name('showHalPenjadwalan');
Route::get('/halTambahJadwalKegiatan', [PenjadwalanController::class, 'showHalTambahJadwalKegiatan'])->name('showHalTambahJadwalKegiatan');
Route::post('/tambah-jadwal', [PenjadwalanController::class, 'Simpan'])->name('SimpanJadwal');
Route::get('/halDetailKegiatan/{id}', [PenjadwalanController::class, 'showHalDetailKegiatan'])->name('showHalDetailKegiatan');
Route::delete('/hapus-jadwal/{id}', [PenjadwalanController::class, 'hapusKegiatan'])->name('hapusKegiatan');
Route::get('/halUbahKegiatan/{id}', [PenjadwalanController::class, 'showHalUbahKegiatan'])->name('showHalUbahKegiatan');
Route::post('/update-kegiatan/{id}', [PenjadwalanController::class, 'SimpanPerubahan'])->name('SimpanPerubahanKegiatan');
