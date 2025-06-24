<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Pinjaman;


class AnggotaController extends Controller
{

    public function DaftarBuku()
    {
        $buku = Buku::all();
        return view('Anggota.Buku.buku', compact('buku'));
    }
    public function show(Buku $buku)
    {

        return view('Anggota.Buku.detail', ['buku' => $buku]);
    }

     public function DaftarPinjaman()
    {
        $idAnggota = session('user_anggota')['id'];

        $pinjaman = Pinjaman::with('buku' )->where('anggota_id', $idAnggota)->get();

        return view('Anggota.Pinjaman.pinjaman', compact('pinjaman'));
    }

    public function detailPinjaman(Pinjaman $pinjaman)
    {
        $pinjaman->load('buku');


        return view('Anggota.Pinjaman.detail', [
            'pinjaman' => $pinjaman
        ]);
    }


    public function cari(Request $request)
    {
        $keyword = $request->keyword;

        $pinjaman = Pinjaman::with('buku')
            ->whereHas('buku', function ($query) use ($keyword) {
                $query->where('nama_buku', 'like', "%$keyword%");
            })
            ->get();

        return view('Anggota.Pinjaman.pinjaman', compact('pinjaman'));
    }


    public function profile(Request $request)
    {
        $data['anggota'] = Anggota::firstWhere('id', session('user_anggota')['id']);

        return view('Anggota.profile', compact('data'));
    }

    public function profileUpdate(Request $request)
    {
        $anggota = Anggota::firstWhere('id', session('user_anggota')['id']);

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
