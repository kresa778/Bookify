<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function ListAnggota()
    {
        return view('Anggota.tampil');
    }
    public function TambahAnggota()
    {
        return view('Anggota.tambah');
    }
    public function EditAnggota()
    {
        return view('Anggota.edit');
    }
}
