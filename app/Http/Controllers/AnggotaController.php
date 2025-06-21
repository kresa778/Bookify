<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

    public function DashboardAnggota()
    {
        $buku = Buku::all();
        return view('Anggota.dashboard', compact('buku'));
    }
    public function DaftarBuku()
    {
        $buku = Buku::all();
        return view('Anggota.buku', compact('buku'));
    }
    public function show(Buku $buku)
    {
        // Kirim data buku yang sudah ditemukan ke view 'detail'
        return view('Anggota.detail', ['buku' => $buku]);
    }


    // public function show(Anggota $anggota)
    // {
    //     // Kirim data buku yang sudah ditemukan ke view 'detail'
    //     return view('detail', ['buku' => $anggota]);
    // }
}
