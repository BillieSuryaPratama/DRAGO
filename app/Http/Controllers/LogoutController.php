<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
    Auth::logout();

    // Flush seluruh session data
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect dan cegah cache
    return redirect('/login')->with('success', 'Anda telah logout.')
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
    }
}
