<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar semua buku. (READ)
     */
    public function index()
    {
        $bukus = Buku::latest()->paginate(10); // Ambil semua data buku, urutkan dari yang terbaru, dan paginasi
        return view('PengurusPerpustakaan.Buku.index', compact('bukus'));
    }

    /**
     * Menampilkan form untuk membuat buku baru. (CREATE)
     */
    public function create()
    {
        return view('PengurusPerpustakaan.Buku.create');
    }

    /**
     * Menyimpan data buku baru ke database. (CREATE)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'edisi' => 'nullable|string|max:255',
            'sinopsis' => 'nullable|string',
            'isbn' => 'required|string|max:255|unique:tabel_buku,isbn',
            'lokasi_buku' => 'required|string|max:255',
            'status_buku' => 'required|string|max:255',
        ]);

        // Buat data buku baru
        Buku::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pengurus.buku.index')
                         ->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu buku. (READ)
     */
    public function show(Buku $buku)
    {
        return view('PengurusPerpustakaan.Buku.show', compact('buku'));
    }

    /**
     * Menampilkan form untuk mengedit data buku. (UPDATE)
     */
    public function edit(Buku $buku)
    {
        return view('PengurusPerpustakaan.Buku.edit', compact('buku'));
    }

    /**
     * Mengupdate data buku di database. (UPDATE)
     */
    public function update(Request $request, Buku $buku)
    {
        // Validasi input
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'edisi' => 'nullable|string|max:255',
            'sinopsis' => 'nullable|string',
            'isbn' => 'required|string|max:255|unique:tabel_buku,isbn,' . $buku->id,
            'lokasi_buku' => 'required|string|max:255',
            'status_buku' => 'required|string|max:255',
        ]);

        // Update data buku
        $buku->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pengurus.buku.index')
                         ->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Menghapus data buku dari database. (DELETE)
     */
    public function destroy(Buku $buku)
    {
        // Hapus data buku
        $buku->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pengurus.buku.index')
                         ->with('success', 'Buku berhasil dihapus.');
    }
}
