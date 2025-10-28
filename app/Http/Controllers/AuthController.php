<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('guest.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah'])->withInput();
        }

        session([
            'user_id' => $user->id,
            'user_name' => $user->name
        ]);

        return redirect()->route('dashboard')->with('success', 'Selamat datang kembali, ' . $user->name . ' 👋');
    }

    public function logout()
    {
        // Hapus semua data sesi login
        session()->flush();

        // Kembali ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Anda berhasil logout. Sampai jumpa kembali 👋');
    }
}
