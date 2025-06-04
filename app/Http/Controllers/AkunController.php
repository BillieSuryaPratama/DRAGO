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

    public function Simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nama' => ['required', 'string', 'max:50', 'regex:/^[A-Za-z\s]+$/'],
            'Alamat' => 'required|string|max:50',
            'Nomor_HP' => 'required|digits_between:10,15',
            'Username' => 'required|string|max:20',
            'Email' => 'required|string|max:255|email',
            'Sandi' => 'required|string|max:12',
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['error' => 'Format data harus sesuai'])->withInput();
        }

        try {
            $akun = new Akun();
            $akun->insertDataAkun($request);
            return redirect()->route('showHalPetani')->with('success', 'Akun berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Format data harus sesuai'])->withInput();
        }
    }
}
