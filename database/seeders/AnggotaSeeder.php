<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tabel_anggota')->insert([
            [
                'nama_anggota' => 'Ibnu Hadi',
                'password'     => Hash::make('password123'),
                'email'        => 'ibnu@example.com',
                'no_hp'        => '081234567890',
                'alamat'       => 'Jl. Mawar No. 10, Jakarta',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'nama_anggota' => 'kresa',
                'password'     => Hash::make('kresa'),
                'email'        => 'kresa',
                'no_hp'        => '081298765432',
                'alamat'       => 'Jl. Melati No. 5, Bandung',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'nama_anggota' => 'Ibnu',
                'password'     => Hash::make('ibnu'),
                'email'        => 'ibnu',
                'no_hp'        => '081234567890',
                'alamat'       => 'Jl. Mawar No. 10, Jakarta',
                'created_at'   => now(),
                'updated_at'   => now(),
            ]
        ]);
    }
}
