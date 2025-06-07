<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeteksiPenyakit;

class DeteksiPenyakitController extends Controller
{
    public function showHalDeteksi()
    {
        return view('halDeteksi');
    }
}
