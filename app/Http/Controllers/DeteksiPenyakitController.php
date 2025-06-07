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

    public function showHalRiwayatDeteksi()
    {
        //
    }

    public function showHalDetailDeteksi()
    {
        //
    }

    public function Deteksi(Request $request, $id)
    {
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

        return view('hasilDeteksi', [
            'prediction' => $result['prediction'],
            'confidence' => $result['confidence'],
        ], compact('petani'));
    }
}
