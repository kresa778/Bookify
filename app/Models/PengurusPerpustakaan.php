<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Penting untuk Auth

class PengurusPerpustakaan extends Authenticatable // Pastikan extends Authenticatable
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     *
     * @var string
     */
    protected $table = 'tabel_pengurus_perpustakaan'; // <-- TAMBAHKAN BARIS INI

    // ... (isi model lainnya)
}
