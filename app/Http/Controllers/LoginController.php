<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\DeteksiPenyakit;
use App\Models\Penjadwalan;
use App\Models\Laporan;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function showLandingPage()
    {
        $deteksiPenyakit = (new DeteksiPenyakit())->getDataPenyakit()->take(3);
        return view('LandingPage', compact('deteksiPenyakit'));
    }


    public function showHalLogin(){
        return view('halLogin');
    }

    public function showHalLupaPassword(){
        return view('halLupaPassword');
    }

    public function DashboardPemilik(){
        $nama = session('nama');
        $id_akun = session('id_akun');
        $id_jabatan = session('id_jabatan');
        $jumlahSehat = Laporan::sum('Jumlah_Tumbuhan_Sehat');
        $jumlahSakit = Laporan::sum('Jumlah_Tumbuhan_Sakit');
        $Penjadwalan = (new Penjadwalan())->getDataKegiatan();
        $JadwalHariIni = $Penjadwalan->filter(function($item) {
            return $item->Tanggal === now()->toDateString();
        });
        return view('DashboardPemilik', compact('nama', 'id_akun', 'id_jabatan', 'jumlahSehat', 'jumlahSakit', 'JadwalHariIni'));
    }

    public function DashboardPetani(){
        $nama = session('nama');
        $id_akun = session('id_akun');
        $id_jabatan = session('id_jabatan');
        $Penjadwalan = (new Penjadwalan())->getDataKegiatan();
        $JadwalHariIni = $Penjadwalan->filter(function($item) use ($id_akun) {
            return $item->Tanggal === now()->toDateString() && $item->ID_Akun == $id_akun;
        });
        return view('DashboardPetani', compact('nama', 'id_akun', 'id_jabatan', 'JadwalHariIni'));
    }

    public function cekDataAkun($username, $password) {
        $akunList = (new Akun())->getDataAkun();
        $akun = $akunList->firstWhere('Username', $username);
        if ($akun) {
            try {
                $decryptedPassword = Crypt::decrypt($akun->Sandi);
                if ($decryptedPassword === $password) {
                    return $akun;
                }
            } catch (\Exception $e) {
                return null;
            }
        }
        return null;
    }

    public function login(Request $request)
    {
        if (empty($request->username) || empty($request->password)) {
            return back()->withErrors(['error' => 'Data harus diisi'])->withInput();
        }
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $akun = $this->cekDataAkun($request->username, $request->password);

        if ($akun && $akun->Status_Akun == 1) {
            session([
                'id_akun' => $akun->ID_Akun,
                'nama' => $akun->Nama,
                'id_jabatan' => $akun->ID_Jabatan,
            ]);
            if ($akun->ID_Jabatan == 2) {
                return redirect()->route('DashboardPetani');
            } elseif ($akun->ID_Jabatan == 1) {
                return redirect()->route('DashboardPemilik');
            }
        } else {
            return back()->withErrors(['error' => 'Format data harus sesuai']);
        }
    }


    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('showHalLogin')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
    }

    public function ubahPassword(Request $request)
    {
        if (empty($request->username) || empty($request->password) || empty($request->konfirmasi_password)) {
            return back()->withErrors(['error' => 'Data harus diisi'])->withInput();
        }

        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|max:12',
            'konfirmasi_password' => 'required|string|same:password',
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['error' => 'Format data harus sesuai'])->withInput();
        }

        $akun = Akun::where('Username', $request->username)->first();
        if ($akun) {
            $akun->Sandi = Crypt::encrypt($request->password);
            $akun->save();
            return redirect()->route('showHalLogin')->with('success', 'Password berhasil diubah.');
        } else {
            return back()->withErrors(['username' => 'Format Data Harus Sesuai']);
        }
    }
}
