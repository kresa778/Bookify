<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// PASTIKAN NAMA CLASS DI SINI ADALAH "Buku"
class Buku extends Model
{
    use HasFactory;

    /**
     * Baris ini wajib ada untuk memberitahu Laravel
     * bahwa Model ini menggunakan tabel 'tabel_buku'
     */
    protected $table = 'tabel_buku';

    protected $fillable = [
        'nama_buku',
        'penerbit',
        'edisi',
        'sinopsis',
        'isbn',
        'lokasi_buku',
        'status_buku',
    ];
}
