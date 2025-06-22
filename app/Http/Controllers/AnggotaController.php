<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\Anggota;
use App\Models\Buku;

class AnggotaController extends Controller
{

    public function DashboardAnggota()
    {
        $buku = Buku::all();
        return view('Anggota.dashboard', compact('buku'));
    }
    public function DaftarBuku()
    {
        $buku = Buku::all();
        return view('Anggota.buku', compact('buku'));
    }
    public function show(Buku $buku)
    {
        // Kirim data buku yang sudah ditemukan ke view 'detail'
        return view('Anggota.detail', ['buku' => $buku]);
    }


    // public function show(Anggota $anggota)
    // {
    //     // Kirim data buku yang sudah ditemukan ke view 'detail'
    //     return view('detail', ['buku' => $anggota]);
    // }

    /**
     * PROFILE
     * =========================================================================
     */

    /**
     * Show form profile anggota
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\View\View
     */
    public function profile(Request $request)
    {
        $data['anggota'] = Anggota::firstWhere('id', session('user_anggota')['id']);

        return view('Anggota.profile', compact('data'));
    }

    /**
     * Proccess update profile anggota
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return
     */
    public function profileUpdate(Request $request)
    {
        // get session anggota
        $anggota = Anggota::firstWhere('id', session('user_anggota')['id']);

        // Set validation rules
        $validate = [
            'nama_anggota' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('tabel_anggota', 'email')->ignore($anggota->id)
            ],
            'no_hp' => [
                'required',
                Rule::unique('tabel_anggota', 'no_hp')->ignore($anggota->id)
            ],
            'alamat' => 'required|string|max:500',
        ];
        
        if ($request->filled('password')) {
            $validate['old_password'] = 'required';
            $validate['password'] = 'required|confirmed|different:old_password';

            if ($request->input('old_password') && !Hash::check($request->input('old_password'), $anggota['password'])) {
                return back()->with('warning', 'Password lama tidak sesuai');
            }
        }
        
        $validatedData = $request->validate($validate, [
            'nama_anggota.required' => 'Nama anggota wajib diisi',
            'email.unique' => 'Email ini sudah digunakan oleh anggota lain',
            'no_hp.unique' => 'Nomor HP ini sudah digunakan oleh anggota lain',
            'password.different' => 'Password baru harus berbeda dengan password lama',
        ]);
        
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $anggota->update($validatedData);
        
        return redirect()->back()->with('success', 'Data anggota berhasil diperbarui');
    }
}
