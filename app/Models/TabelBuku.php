<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelBuku extends Model
{
    use HasFactory;

    protected $table = 'tabel_buku'; // nama tabel di database

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
