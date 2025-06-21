<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function ListBuku()
    {
        return view('Buku.tampil');
    }
    public function TambahBuku()
    {
        return view('Buku.tambah');
    }
    public function EditBuku()
    {
        return view('Buku.edit');
    }

    public function show(Buku $buku)
    {
        // Kirim data buku yang sudah ditemukan ke view 'detail'
        return view('detail', ['buku' => $buku]);
    }
}
