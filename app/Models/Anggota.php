<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// 1. Ganti 'Model' dengan 'Authenticatable'
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; // Tambahkan ini

// 2. Ubah 'extends Model' menjadi 'extends Authenticatable'
class Anggota extends Authenticatable
{
    use HasFactory, Notifiable; // Tambahkan Notifiable

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tabel_anggota';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        'remember_token', // Tambahkan ini untuk keamanan
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Gunakan ini untuk hashing otomatis, lebih modern
    ];

    /**
     * Get the loans for the member.
     */
    public function peminjaman()
    {
        return $this->hasMany(Pinjaman::class, 'anggota_id');
    }
}
