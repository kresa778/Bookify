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
}
