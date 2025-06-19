<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function ListPengurus()
    {
        return view('Pengurus.tampil');
    }
    public function TambahPengurus()
    {
        return view('Pengurus.tambah');
    }
    public function EditPengurus()
    {
        return view('Pengurus.edit');
    }
}
