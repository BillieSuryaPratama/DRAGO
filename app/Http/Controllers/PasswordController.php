<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PasswordController extends Controller
{
    // Menampilkan form ubah password
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    // Proses ubah password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Cek apakah password saat ini sesuai
        if (Hash::check($request->current_password, Auth::user()->password)) {
            // Update password
            Auth::user()->update([
                'password' => Hash::make($request->new_password),
            ]);

            return back()->with('success', 'Password berhasil diubah');
        } else {
            return back()->withErrors(['current_password' => 'Password saat ini salah']);
        }
    }
}
