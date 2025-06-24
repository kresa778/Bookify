<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Anggota;
use App\Models\PengurusPerpustakaan;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $pengurus = PengurusPerpustakaan::where('email_pengurus', $credentials['email'])->first();

        if ($pengurus && Hash::check($credentials['password'], $pengurus->password)) {
            Auth::guard('pengurus')->login($pengurus);
            $request->session()->regenerate();
            return redirect()->route('pengurus.dashboard');
        }

        $anggota = Anggota::where('email', $credentials['email'])->first();

        if ($anggota && Hash::check($credentials['password'], $anggota->password)) {
            Auth::guard('anggota')->login($anggota);
            $request->session()->regenerate();

            session(['user_anggota' => $anggota]);

            return redirect()->route('anggota.pinjaman');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showRegistrationForm()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tabel_anggota,email',
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $anggota = Anggota::create([
            'nama_anggota' => $request->nama_anggota,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        Auth::guard('anggota')->login($anggota);

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
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
