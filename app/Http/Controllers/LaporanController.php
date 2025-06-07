<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;


class LaporanController extends Controller
{
    public function showHalLaporanPemilik(){
        $laporan = (new Laporan())->getDatalaporan();
        $laporan = Laporan::with('Akun')->get();
        return view('halLaporanPemilik', compact("laporan"));
    }
    public function showHalLaporanPetani(){
        $ID_Akun = session('id_akun');
        $laporan = (new Laporan())->getDatalaporan();
        $laporan = $laporan->Where('ID_Akun', $ID_Akun);
        return view('halLaporanPetani', compact("laporan"));
    }
    public function showHalTambahLaporan(){
        return view('halTambahLaporan');
    }
    public function Simpan(Request $request){
        $ID_Akun = session('id_akun');
        $request->merge(['ID_Akun' => $ID_Akun]);
        $validator = Validator::make($request->all(), [
            'Jumlah_Tumbuhan_Sakit' => ['required', 'integer', 'min:0'],
            'Jumlah_Tumbuhan_Sehat' => ['required', 'integer', 'min:0'],
            'Keterangan' => ['required', 'string', 'max:255'],
            'Tanggal_Laporan' => ['required', 'date', 'before_or_equal:today'],
        ], [
            'Jumlah_Tumbuhan_Sakit.required' => 'Data harus diisi',
            'Jumlah_Tumbuhan_Sehat.required' => 'Data harus diisi',
            'Keterangan.required' => 'Data harus diisi',
            'Tanggal_Laporan.required' => 'Data harus diisi',
            'Jumlah_Tumbuhan_Sakit.regex' => 'Format data harus sesuai',
            'Jumlah_Tumbuhan_Sakit.max' => 'Format data harus sesuai',
            'Jumlah_Tumbuhan_Sehat.max' => 'Format data harus sesuai',
            'Keterangan.max' => 'Format data harus sesuai',
            'Tanggal_Laporan.before_or_equal' => 'Format data harus sesuai',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            try {
                $laporan = new Laporan();
                $laporan->insertDataLaporan($request);
                return redirect()->route('showHalLaporanPetani')->with('success', 'Data berhasil ditambah.');
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])->withInput();
        }
        }
    public function showHalDetailLaporan($id){
        $laporan = (new Laporan())->getDatalaporan($id);
        return view('halDetailLaporan', compact('laporan'));
    }
    public function SimpanPerubahan(Request $request){
        $validator = Validator::make($request->all(), [
            'Jumlah_Tumbuhan_Sakit' => ['required', 'integer', 'min:0'],
            'Jumlah_Tumbuhan_Sehat' => ['required', 'integer', 'min:0'],
            'Keterangan' => ['required', 'string', 'max:255'],
            'Tanggal_Laporan' => ['required', 'date', 'before_or_equal:today'],
        ], [
            'Jumlah_Tumbuhan_Sakit.required' => 'Data harus diisi1',
            'Jumlah_Tumbuhan_Sehat.required' => 'Data harus diisi2',
            'Keterangan.required' => 'Data harus diisi3',
            'Tanggal_Laporan.required' => 'Data harus diisi4',
            'Jumlah_Tumbuhan_Sakit.regex' => 'Format data harus sesuai',
            'Jumlah_Tumbuhan_Sakit.max' => 'Format data harus sesuai',
            'Jumlah_Tumbuhan_Sehat.max' => 'Format data harus sesuai',
            'Keterangan.max' => 'Format data harus sesuai',
            'Tanggal_Laporan.before_or_equal' => 'Format data harus sesuai',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            try {
                $laporan = new Laporan();
                $laporan->updateDataLaporan($request);
                return redirect()->route('showHalLaporanPetani')->with('success', 'Data berhasil diubah');
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])->withInput();
        }
    }
    public function HapusLaporan($id)
{
    try {
        DB::table('Laporan')->where('ID_Laporan', $id)->delete();
        return redirect()->route('showHalLaporanPetani')->with('success', 'Laporan berhasil dihapus.');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menghapus laporan: ' . $e->getMessage());
    }
}


    public function filterLaporan(){
    }
}
