<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->paginate(10);
        return view('PengurusPerpustakaan.Buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('PengurusPerpustakaan.Buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'edisi' => 'nullable|string|max:255',
            'sinopsis' => 'nullable|string',
            'isbn' => 'required|string|max:255|unique:tabel_buku,isbn',
            'lokasi_buku' => 'required|string|max:255',
            'status_buku' => 'required|string|max:255',
        ]);

        Buku::create($request->all());

        return redirect()->route('pengurus.buku.index')
                         ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        return view('PengurusPerpustakaan.Buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('PengurusPerpustakaan.Buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'edisi' => 'nullable|string|max:255',
            'sinopsis' => 'nullable|string',
            'isbn' => 'required|string|max:255|unique:tabel_buku,isbn,' . $buku->id,
            'lokasi_buku' => 'required|string|max:255',
            'status_buku' => 'required|string|max:255',
        ]);

        $buku->update($request->all());

        return redirect()->route('pengurus.buku.index')
                         ->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('pengurus.buku.index')
                         ->with('success', 'Buku berhasil dihapus.');
    }
}
