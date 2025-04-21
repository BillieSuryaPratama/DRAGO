<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetaniController extends Controller
{
    public function index()
    {
        // Anda bisa mengganti tampilan sesuai kebutuhan
        return view('berandapetani');  // pastikan ada file berandapemilik.blade.php di resources/views
    }
    public function akunpetani()
    {
        // Anda bisa mengganti tampilan sesuai kebutuhan
        return view('akunpetani');  // pastikan ada file berandapemilik.blade.php di resources/views
    }
}
