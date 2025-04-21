<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Data pengguna (misalnya, data statis)
    protected $users = [
        'pemilik' => [
            'username' => 'pemilik',
            'password' => '1234', // Gunakan password yang diinginkan
            'role' => 'pemilik'
        ],
        'petani' => [
            'username' => 'petani',
            'password' => '1234', // Gunakan password yang diinginkan
            'role' => 'petani'
        ]
    ];

    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah username dan password valid berdasarkan data statis
        $user = $this->getUserByUsername($request->username);

        if ($user && $user['password'] === $request->password) {
            // Simpan data pengguna dalam session untuk menjaga status login
            Session::put('user', $user);

            // Redirect berdasarkan role pengguna
            if ($user['role'] === 'pemilik') {
                return redirect()->route('berandapemilik');
            } elseif ($user['role'] === 'petani') {
                return redirect()->route('berandapetani');
            }
        } else {
            return back()->withErrors(['username' => 'Username atau password salah']);
        }
    }

    // Mendapatkan data pengguna berdasarkan username
    private function getUserByUsername($username)
    {
        return $this->users[$username] ?? null;
    }

    // Logout
    public function logout()
    {
        Session::forget('user'); // Hapus session pengguna
        return redirect()->route('login');
    }
}
