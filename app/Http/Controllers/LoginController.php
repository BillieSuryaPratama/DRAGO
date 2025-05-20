<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('login');
    }
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = Akun::where('Username', $request->username)
                ->where('Sandi', $request->password)
                ->first();

    if ($user) {
        if ($user->ID_Jabatan == 2 && $user->Status_Akun == 1) {
            return redirect()->route('berandapetani', ['id' => $user->ID_Akun]);
        } else if ($user->ID_Jabatan == 1) {
            return redirect()->route('berandapemilik');
        }
        else
        {
            return back()->withErrors(['username' => 'Akses ditolak. Akun tidak aktif atau bukan petani.']);
        }
    }

    return back()->withErrors(['username' => 'Username atau password salah.']);
}

}
