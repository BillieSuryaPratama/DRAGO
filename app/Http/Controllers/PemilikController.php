<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index()
    {
        // Anda bisa mengganti tampilan sesuai kebutuhan
        return view('berandapemilik');  // pastikan ada file berandapemilik.blade.php di resources/views
    }
    public function penjadwalan()
    {
        // Anda bisa mengganti tampilan sesuai kebutuhan
        return view('penjadwalan');  // pastikan ada file berandapemilik.blade.php di resources/views
    }
    public function laporan()
    {
        // Anda bisa mengganti tampilan sesuai kebutuhan
        return view('laporan');  // pastikan ada file berandapemilik.blade.php di resources/views
    }
    public function kegiatan()
    {
        // Anda bisa mengganti tampilan sesuai kebutuhan
        return view('kegiatan');  // pastikan ada file berandapemilik.blade.php di resources/views
    }
    public function akunpemilik()
    {
        // Anda bisa mengganti tampilan sesuai kebutuhan
        return view('akunpemilik');  // pastikan ada file berandapemilik.blade.php di resources/views
    }
    public function akunpetani()
    {
        // Anda bisa mengganti tampilan sesuai kebutuhan
        return view('akunpetani');  // pastikan ada file berandapemilik.blade.php di resources/views
    }
}

