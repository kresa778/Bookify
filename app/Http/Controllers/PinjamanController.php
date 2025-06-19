<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function ListPinjaman()
    {
        return view('Pinjaman.tampil');
    }
    public function TambahPinjaman()
    {
        return view('Pinjaman.tambah');
    }
    public function EditPinjaman()
    {
        return view('Pinjaman.edit');
    }
}
