<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class dashboardController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function showKatalog(){
        $buku = Buku::all();
        return view('katalog', compact('buku'));
    }

        public function show(Buku $buku)
    {
        // Kirim data buku yang sudah ditemukan ke view 'detail'
        return view('detail', ['buku' => $buku]);
    }
}

