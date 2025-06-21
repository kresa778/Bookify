<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengurusController extends Controller
{

    public function index()
    {
        return view('PengurusPerpustakaan.dashboard');
    }
    public function ListPengurus()
    {
        return view('PengurusPerpustakaan.tampil');
    }
    public function TambahPengurus()
    {
        return view('PengurusPerpustakaan.tambah');
    }
    public function EditPengurus()
    {
        return view('PengurusPerpustakaan.edit');
    }
}
