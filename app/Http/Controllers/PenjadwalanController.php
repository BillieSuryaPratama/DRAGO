<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Penjadwalan;
use Illuminate\Support\Facades\DB;

class PenjadwalanController extends Controller
{
    public function showHalTambahJadwalKegiatan()
    {
        $petani = DB::table('akun')
                    ->where('ID_Jabatan', 2) // Misalkan ID_Jabatan 2 adalah untuk petani
                    ->where('Status_Akun', 1) // Hanya petani yang aktif
                    ->get();
        return view('halTambahJadwalKegiatan', compact('petani'));
    }

    public function showHalPenjadwalan()
    {
        $Penjadwalan = (new Penjadwalan())->getDataKegiatan();
        $Petani = $Penjadwalan->where('ID_Jabatan', 2)
                            ->where('Status_Akun', 1)
                            ->groupBy('ID_Akun')
                            ->map(function ($item) {
                                return $item->first();
                            });
        return view('halPenjadwalan', compact("Petani"));
    }

    public function Simpan(Request $request)
    {
        if (empty($request->ID_Akun) || empty($request->JamMulai) || empty($request->JamBerakhir) || empty($request->Tanggal) || empty($request->Kegiatan)) {
            return back()->withErrors(['error' => 'Data harus diisi'])->withInput();
        }

        $validator = Validator::make($request->all(), [
            'ID_Akun' => 'required|exists:akun,ID_Akun',
            'JamMulai' => 'required|date',
            'JamBerakhir' => 'required|date|after:JamMulai',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['error' => 'Format data harus sesuai'])->withInput();
        }

        try {
            $penjadwalan = new Penjadwalan();
            $penjadwalan->insertDataKegiatan($request);
            return redirect()->route('showHalPenjadwalan')->with('success', 'Jadwal berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])->withInput();
        }
    }
}
