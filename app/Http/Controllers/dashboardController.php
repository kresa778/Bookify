<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelBuku;

class dashboardController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function showKatalog(){
        $buku = TabelBuku::all();
        return view('katalog', compact('buku'));
    }
}
