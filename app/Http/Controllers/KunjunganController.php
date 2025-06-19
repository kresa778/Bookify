<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function ListKunjungan()
    {
        return view('Kunjungan.tampil');
    }
    public function TambahKunjungan()
    {
        return view('Kunjungan.tambah');
    }
    public function EditKunjungan()
    {
        return view('Kunjungan.edit');
    }
}
