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
                    ->where('ID_Jabatan', 2)
                    ->where('Status_Akun', 1)
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

    public function showHalDetailKegiatan($id)
    {
        $kegiatan = (new Penjadwalan())->getDataKegiatanByAkun($id);
        return view('halDetailKegiatan', compact('kegiatan'));
    }

    public function showHalUbahKegiatan($id)
    {
        $petani = DB::table('akun')
                    ->where('ID_Jabatan', 2)
                    ->where('Status_Akun', 1)
                    ->get();
        $kegiatan = (new Penjadwalan())->getDataKegiatan($id);
        return view('halUbahKegiatan', compact('kegiatan', 'petani'));
    }

    public function showHalJadwal()
    {
        $id_akun = session('id_akun');
        $kegiatan = (new Penjadwalan())->getDataKegiatanByAkun($id_akun);
        return view('halJadwal', compact('kegiatan'));
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
            'Tanggal' => 'required|date|after_or_equal:today',
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

    public function SimpanPerubahan(Request $request, $id)
    {
        if (empty($request->ID_Akun) || empty($request->JamMulai) || empty($request->JamBerakhir) || empty($request->Tanggal) || empty($request->Kegiatan)) {
            return back()->withErrors(['error' => 'Data harus diisi'])->withInput();
        }

        $validator = Validator::make($request->all(), [
            'ID_Akun' => 'required|exists:akun,ID_Akun',
            'JamMulai' => 'required|date',
            'JamBerakhir' => 'required|date|after:JamMulai',
            'Tanggal' => 'required|date|after_or_equal:today',
            'Kegiatan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['error' => 'Format data harus sesuai'])->withInput();
        }

        try {
            $penjadwalan = new Penjadwalan();
            $penjadwalan->updateDataKegiatan($request, $id);
            return redirect()->route('showHalDetailKegiatan', ['id' => $request->ID_Akun])->with('success', 'Jadwal berhasil diubah.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data.'])->withInput();
        }
    }

    public function HapusKegiatan($id)
    {
        try {
            $kegiatan = new Penjadwalan();
            $kegiatan->deleteDataKegiatan($id);
            return redirect()->route('showHalDetailKegiatan');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal menghapus akun.']);
        }
    }

    public function cekValidasiWaktu(Request $request)
    {
        $kegiatan = Penjadwalan::find($request->id);
        $currentTime = now();

        if ($kegiatan->Status !== 'Belum Dikerjakan') {
            return back()->withErrors(['error' => 'Kegiatan sudah dikerjakan atau terlambat.']);
        }

        if ($currentTime < $kegiatan->JamMulai) {
            return back()->withErrors(['error' => 'Waktu belum memasuki jam kegiatan.']);
        }

        if ($currentTime >= $kegiatan->JamMulai && $currentTime <= $kegiatan->JamBerakhir) {
            $this->SudahSelesai($kegiatan->ID_Penjadwalan, 'Sudah Dikerjakan');
            return redirect()->route('showHalJadwal')->with('success', 'Status berhasil diubah.');
        } else {
            $this->SudahSelesai($kegiatan->ID_Penjadwalan, 'Terlambat');
            return redirect()->route('showHalJadwal')->with('success', 'Status berhasil diubah.');
        }
    }

    public function SudahSelesai($id, $status)
    {
        Penjadwalan::where('ID_Penjadwalan', $id)->update(['Status' => $status]);
    }


}
