<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;


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

    public function peminjaman()
    {
        return $this->hasMany(Pinjaman::class, 'buku_id');
    }
}
