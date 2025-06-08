<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeteksiPenyakit;
use Illuminate\Support\Facades\DB;

class DeteksiPenyakitController extends Controller
{
    public function showHalDeteksi()
    {
        return view('halDeteksi');
    }

    public function showHalRiwayatDeteksi()
    {
        $DeteksiPenyakit = (new DeteksiPenyakit())->getDataPenyakit();
        return view('halRiwayatDeteksi', compact("DeteksiPenyakit"));
    }

    public function showHalDetailDeteksi($id)
    {
        $DetailPenyakit = (new DeteksiPenyakit())->getDataPenyakit($id);
        return view('halDetailDeteksi', compact('DetailPenyakit'));
    }

    public function Deteksi(Request $request)
    {
        $id_akun = session('id_akun');

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

        $deteksi = new DeteksiPenyakit();
        $deteksi->insertDataPenyakit((object) [
            'ID_Akun' => $id_akun,
            'ID_Penyakit' => $result['prediction'],
            'Gambar_Deteksi' => file_get_contents($image->getPathname()),
            'Akurasi' => $result['confidence'],
            'Tanggal_Deteksi' => now(),
        ]);

        $Hasil_Deteksi = DB::getPdo()->lastInsertId();
        return redirect()->route('showHalDetailDeteksi', ['id' => $Hasil_Deteksi]);
    }
}
