<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeteksiController extends Controller
{
    public function unggah(Request $request)
{
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $path = $request->file('foto')->store('uploads', 'public');

    return redirect()->route('tambahgambar')->with('uploaded_image', $path);
}
    public function index()
    {
        // Anda bisa mengganti tampilan sesuai kebutuhan
        return view('deteksi');  // pastikan ada file berandapemilik.blade.php di resources/views
    }

}
