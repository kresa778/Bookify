<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Penting untuk Auth

class Anggota extends Authenticatable // Pastikan extends Authenticatable
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     *
     * @var string
     */
    protected $table = 'tabel_anggota'; // <-- TAMBAHKAN BARIS INI

    protected $fillable = [
        'nama_anggota',
        'email',
        'password',
        'no_hp',
        'alamat',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ... (isi model lainnya seperti $fillable, dll.)
}
