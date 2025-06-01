<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\DeteksiPenyakit;
use App\Models\Penjadwalan;
use App\Models\Laporan;

class LoginController extends Controller
{
    public function showHalLogin(){
        return view('halLogin');
    }

    public function showHalLupaPassword(){
        return view('halLupaPassword');
    }

    public function DashboardPemilik(){
        $nama = session('nama');
        $id_akun = session('id_akun');
        return view('DashboardPemilik', compact('nama', 'id_akun'));
    }

    public function DashboardPetani(){
        $nama = session('nama');
        $id_akun = session('id_akun');
        return view('DashboardPetani', compact('nama', 'id_akun'));
    }

    public function cekDataAkun($username, $password) {
        $akunList = (new Akun())->getDataAkun();
        $akun = $akunList->firstWhere('Username', $username);
        if ($akun && $akun->Sandi === $password) {
            return $akun;
        }
        return null;
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $akun = $this->cekDataAkun($request->username, $request->password);
        if ($akun) {
            session([
                'id_akun' => $akun->ID_Akun,
                'nama' => $akun->Nama,
            ]);

            if ($akun->ID_Jabatan == 2) {
                return $this->DashboardPetani();
            } elseif ($akun->ID_Jabatan == 1) {
                return $this->DashboardPemilik();
            }
        } else {
            return back()->withErrors(['username' => 'Format data harus sesuai']);
        }
    }

        public function ubahPassword(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|max:12',
            'konfirmasi_password' => 'required|string|same:password',
        ]);
        $akun = Akun::where('Username', $request->username)->first();
        if ($akun) {
            $akun->Sandi = $request->password;
            $akun->save();
            return redirect()->route('showHalLogin')->with('success', 'Password berhasil diubah.');
        } else {
            return back()->withErrors(['username' => 'Format Data Harus Sesuai']);
        }
    }
}
