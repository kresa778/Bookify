<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Pinjaman extends Model
{
    //
    use HasFactory;

    /**
     * Baris ini wajib ada untuk memberitahu Laravel
     * bahwa Model ini menggunakan tabel 'tabel_buku'
     */
    protected $table = 'tabel_pinjaman';
    protected $fillable = [
        'id_buku',
        'denda',
        'keterangan',
        'tgl_pinjaman',
        'tgl_lambat',
    ];
    public function buku()
    {
        return $this->belongsTo(Buku::class,'id_buku', 'id');
    }

}
