<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class AnggotaAdminController extends Controller
{
     public function index()
    {
        $anggotas = Anggota::latest()->paginate(10);
        return view('PengurusPerpustakaan.Anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('PengurusPerpustakaan.Anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tabel_anggota'],
            'no_hp' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Anggota::create($request->all());

        return redirect()->route('pengurus.anggota.index')
                         ->with('success', 'Anggota baru berhasil ditambahkan.');
    }

    public function show(Anggota $anggotum)
    {
        return view('PengurusPerpustakaan.Anggota.show', ['anggota' => $anggotum]);
    }

    public function edit(Anggota $anggotum)
    {
        return view('PengurusPerpustakaan.Anggota.edit', ['anggota' => $anggotum]);
    }

    public function update(Request $request, Anggota $anggotum)
    {
        $request->validate([
            'nama_anggota' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tabel_anggota,email,' . $anggotum->id],
            'no_hp' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $updateData = $request->except('password');

        if ($request->filled('password')) {
            $updateData['password'] = $request->password;
        }

        $anggotum->update($updateData);

        return redirect()->route('pengurus.anggota.index')
                         ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggotum)
    {
        $anggotum->delete();
        return redirect()->route('pengurus.anggota.index')
                         ->with('success', 'Data anggota berhasil dihapus.');
    }
}
