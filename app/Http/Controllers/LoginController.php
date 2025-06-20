<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
     public function showLoginForm()
    {
        return view('Auth.login'); // Pastikan Anda punya view ini
    }

    /**
     * Menangani proses login.
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Coba login sebagai Pengurus terlebih dahulu
        $pengurus = PengurusPerpustakaan::where('username', $credentials['username'])->first();

        if ($pengurus && Hash::check($credentials['password'], $pengurus->password)) {
            // Jika pengurus ditemukan dan password cocok
            Auth::guard('pengurus')->login($pengurus);
            $request->session()->regenerate();
            return redirect()->intended('/pengurus/dashboard');
        }

        // 3. Jika bukan pengurus, coba login sebagai Anggota
        $anggota = Anggota::where('username', $credentials['username'])->first();

        if ($anggota && Hash::check($credentials['password'], $anggota->password)) {
            // Jika anggota ditemukan dan password cocok
            Auth::guard('anggota')->login($anggota);
            $request->session()->regenerate();
            return redirect()->intended('/anggota/dashboard');
        }

        // 4. Jika keduanya gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        // Logout dari guard yang sedang aktif
        if (Auth::guard('pengurus')->check()) {
            Auth::guard('pengurus')->logout();
        } elseif (Auth::guard('anggota')->check()) {
            Auth::guard('anggota')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
