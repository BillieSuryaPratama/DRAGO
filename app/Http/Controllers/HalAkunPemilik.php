<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;


class HalAkunPemilik extends Controller
{
    public function showHalAkun(){
        $nama = Akun::where('ID_Jabatan', 1)->value('Nama');
        return view("akun_halPemilik",compact("nama"));
    }
    public function showHalAkunPribadi(){
        $akun = Akun::where('ID_Jabatan', 1)->first();
        return view("akunPribadi_halPemilik", compact("akun"));
    }
    public function edit() {
        $akun = Akun::where('ID_Jabatan', 1)->first();
        return view('ubahakunPribadi_halPemilik', compact('akun'));
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'Nama' => 'required|string|max:100',
            'Alamat' => 'required|string',
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

        $akun = Akun::where('ID_Jabatan', 1)->first();
        $akun->update($validated);

        return redirect()->route('akunPribadi_halPemilik')->with('success', 'Data berhasil diperbarui!');
    }
    public function showHalAkunPetani(){
        $petanis = Akun::where('ID_Jabatan', 2)
                  ->where('Status_Akun', 1)
                  ->get();
        return view("akunPetani_halPemilik", compact("petanis"));
    }
    public function detailpetani($id){
        $petani = Akun::findOrFail($id); // ganti Petani:: dengan Akun::
        return view('detailpetani', compact('petani'));
    }
    public function hapusAkun($id)
    {
        $petani = Akun::findOrFail($id);
        $petani->Status_Akun = 0;
        $petani->save();
    return redirect()->route('akunpetani_halPemilik')->with('success', 'Akun berhasil dinonaktifkan.');
    }
    public function showFormTambahAkun(){
        return view('tambahAkunPetani');
    }


    public function tambahAkunPetani(Request $request)
    {
    // Validasi data
    $validatedData = $request->validate([
        'Nama' => 'required|string|max:255',
        'Alamat' => 'required|string|max:255',
        'Nomor_HP' => 'required|string|max:15',
        'Username' => 'required|string|max:255|unique:akun',
        'Email' => 'required|email|max:255|unique:akun',
        'Sandi' => 'required|string|min:6',
        ]);

        $akun = new Akun;
        $akun->Nama = $validatedData['Nama'];
        $akun->Alamat = $validatedData['Alamat'];
        $akun->Nomor_HP = $validatedData['Nomor_HP'];
        $akun->Username = $validatedData['Username'];
        $akun->Email = $validatedData['Email'];
        $akun->Sandi = $validatedData['Sandi'];
        $akun->status_akun = 1; // Nilai default 1
        $akun->ID_Jabatan = 2; // Nilai default 2
        $akun->save();
        return redirect()->route('akunpetani_halPemilik')->with('success', 'Akun berhasil ditambahkan!');
    }

}
