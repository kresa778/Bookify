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
        'buku_id',
        'anggota_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_pengembalian',
        'status',
    ];
    public function buku()
    {
        return $this->belongsTo(Buku::class,'buku_id', 'id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

}
