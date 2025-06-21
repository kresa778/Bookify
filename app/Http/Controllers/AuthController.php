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
        return view('Auth.login'); // Pastikan Anda punya view ini
    }

    /**
     * Menangani proses login.
     */
    public function login(Request $request)
    {
        // 1. Validasi input, sekarang kita menggunakan 'email'
        $credentials = $request->validate([
            'email' => 'required|string', // Validasi sebagai email
            'password' => 'required|string',
        ]);

        // 2. Coba login sebagai Pengurus terlebih dahulu
        // Mencari berdasarkan kolom 'email_pengurus'
        $pengurus = PengurusPerpustakaan::where('email_pengurus', $credentials['email'])->first();

        if ($pengurus && Hash::check($credentials['password'], $pengurus->password)) {
            // Jika pengurus ditemukan dan password cocok
            Auth::guard('pengurus')->login($pengurus);
            $request->session()->regenerate();
            return redirect()->route('pengurus.dashboard');
        }

        // 3. Jika bukan pengurus, coba login sebagai Anggota
        // Mencari berdasarkan kolom 'email'
        $anggota = Anggota::where('email', $credentials['email'])->first();

        if ($anggota && Hash::check($credentials['password'], $anggota->password)) {
            // Jika anggota ditemukan dan password cocok
            Auth::guard('anggota')->login($anggota);
            $request->session()->regenerate();
            return redirect()->route('anggota.dashboard');
        }

        // 4. Jika keduanya gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.', // Pesan error sekarang merujuk ke email
        ])->onlyInput('email');
    }

    public function showRegistrationForm()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        // 1. Validasi data yang masuk dari form
        $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tabel_anggota,email', // Email harus unik di tabel_anggota
            'password' => 'required|string|min:8|confirmed', // 'confirmed' akan mencocokkan dengan field password_confirmation
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        // 2. Jika validasi berhasil, buat anggota baru
        $anggota = Anggota::create([
            'nama_anggota' => $request->nama_anggota,
            'email' => $request->email,
            'password' => Hash::make($request->password), // PENTING: Hash password sebelum disimpan
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        // 3. Setelah berhasil dibuat, langsung loginkan anggota tersebut
        Auth::guard('anggota')->login($anggota);

        // 4. Arahkan ke halaman yang sesuai (misalnya ke katalog buku)
        return redirect()->route('login');
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
