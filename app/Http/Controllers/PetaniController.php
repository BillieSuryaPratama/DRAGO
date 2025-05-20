<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PetaniController extends Controller
{
    public function index($id)
    {
        $petani = Akun::findOrFail($id);
        return view('berandapetani', compact('petani'));
    }

    public function akunpetani($id)
    {
        $petani = Akun::findOrFail($id);
        return view('akunpetani', compact('petani'));
    }

    public function editAkunPetani($id)
    {
        $petani = Akun::findOrFail($id);
        return view('ubahAkunPetani', compact('petani'));
    }

    public function tambahGambar($id)
    {
        $petani = Akun::findOrFail($id);
        return view('tambahgambar', compact('petani'));
    }

    public function riwayatDeteksi($id)
    {
        $petani = Akun::findOrfail($id);
        return view('riwayatDeteksi', compact('petani'));
    }

    public function hasilDeteksi(Request $request, $id)
    {
        //Logic CNN
        $petani = Akun::findOrFail($id);
        $request->validate([
            'imagefile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('imagefile');

        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://127.0.0.1:3000/predict', [
            'multipart' => [
                [
                    'name'     => 'imagefile',
                    'contents' => fopen($image->getPathname(), 'r'),
                    'filename' => $image->getClientOriginalName(),
                ],
            ]
        ]);
        $result = json_decode($response->getBody(), true);

        //Logic Tambah Gambar

        return view('hasilDeteksi', [
            'prediction' => $result['prediction'],
            'confidence' => $result['confidence'],
            'id' => $petani->ID_Akun,
        ], compact('petani'));
    }

    public function updatePetani(Request $request, $id)
    {
        $validated = $request->validate([
            'Nama' => 'required|string|max:100',
            'Alamat' => 'required|string|min:5',
            'Nomor_HP' => 'required|numeric|digits_between:10,15',
            'Username' => 'required|string|max:50',
            'Email' => 'required|email',
            'Sandi' => 'required|string|min:6'
        ], [
            'required' => 'Data Wajib Diisi',
            'email' => 'Format data harus sesuai',
            'numeric' => 'Format data harus sesuai (angka)',
            'digits_between' => 'Format data harus sesuai (10-15 digit)',
            'min' => 'Format data harus sesuai (minimal :min karakter)'
        ]);

        $petani = Akun::findOrFail($id);
        $petani->update($validated);

        return redirect()->route('akunpetani', ['id' => $petani->ID_Akun])->with('success', 'Data berhasil diperbarui!');
    }
}
