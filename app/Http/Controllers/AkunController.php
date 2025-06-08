<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Akun;

class AkunController extends Controller
{
    public function showHalTambahAkunPetani()
    {
        return view('halTambahAkunPetani');
    }

    public function showHalPetani()
    {
        $Akun = (new Akun())->getDataAkun();
        $Petani = $Akun->Where('ID_Jabatan', 2)
                    ->Where('Status_Akun', 1);
        return view('halPetani', compact("Petani"));
    }

    public function showHalDetailPetani($id)
    {
        $petani = (new Akun())->getDataAkun($id);
        return view('halDetailPetani', compact('petani'));
    }

    public function showHalAkun()
    {
        $id_akun = session('id_akun');
        $id_jabatan = session('id_jabatan');
        $akun = (new Akun())->getDataAkun($id_akun);
        return view('halAkun', compact('akun', 'id_akun', 'id_jabatan'));
    }

    public function showHalFormUbahData($id)
    {
        $akun = (new Akun())->getDataAkun($id);
        return view('halFormUbahData', compact('akun'));
    }

    public function Simpan(Request $request)
    {
        if (empty($request->Nama) || empty($request->Alamat) || empty($request->Nomor_HP) || empty($request->Username) || empty($request->Email) || empty($request->Sandi)) {
            return back()->withErrors(['error' => 'Data harus diisi'])->withInput();
        }

        $validator = Validator::make($request->all(), [
            'Nama' => ['required', 'string', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
            'Alamat' => 'required|string|max:50',
            'Nomor_HP' => 'required|digits_between:10,15',
            'Username' => 'required|string|max:20',
            'Email' => 'required|string|max:255',
            'Sandi' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['error' => 'Format data harus sesuai'])->withInput();
        }

        try {
            $akun = new Akun();
            $akun->insertDataAkun($request);

            return redirect()->route('showHalPetani')->with('success', 'Data berhasil ditambah.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Format data harus sesuai'])->withInput();
        }
    }

    public function SimpanPerubahan(Request $request)
    {
        if (empty($request->Nama) || empty($request->Alamat) || empty($request->Nomor_HP) || empty($request->Username) || empty($request->Email) || empty($request->Sandi)) {
            return back()->withErrors(['error' => 'Data harus diisi'])->withInput();
        }

        $id_akun = session('id_akun');
        $validator = Validator::make($request->all(), [
            'Nama' => ['required', 'string', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
            'Alamat' => 'required|string|max:50',
            'Nomor_HP' => 'required|digits_between:10,15',
            'Username' => 'required|string|max:20',
            'Email' => 'required|string|max:255',
            'Sandi' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['error' => 'Format data harus sesuai'])->withInput();
        }

        try {
            $akun = new Akun();
            $akun->updateDataAkun($request, $id_akun);
            $id_jabatan = session('id_jabatan');

            if ($id_jabatan == 1) {
                return redirect()->route('showHalAkunPemilik')->with('success', 'Akun berhasil diubah.');
            } else {
                return redirect()->route('showHalAkunPetani')->with('success', 'Akun berhasil diubah.');
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Format data harus sesuai'])->withInput();
        }
    }

    public function HapusAkun($id)
    {
        try {
            $akun = new Akun();
            $akun->deleteDataAkun($id);
            return redirect()->route('showHalPetani');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal menghapus akun.']);
        }
    }
}
