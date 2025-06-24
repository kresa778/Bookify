<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pinjaman;

class PinjamanSeeder extends Seeder
{
    public function run()
    {
        $pinjamanData = [
            [
                'buku_id' => 1,
                'anggota_id' => 1,
                'tanggal_pinjam' => '2025-06-14 10:00:00',
                'tanggal_kembali' => '2025-06-15 10:00:00',
                'tanggal_pengembalian' => null,
                'status' => 'Dipinjam',
            ],
            [
                'buku_id' => 2,
                'anggota_id' => 1,
                'tanggal_pinjam' => '2025-06-04 11:30:00',
                'tanggal_kembali' => '2025-06-09 14:00:00',
                'tanggal_pengembalian' => '2025-06-09 14:00:00',
                'status' => 'Kembali',
            ],
            [
                'buku_id' => 3,
                'anggota_id' => 1,
                'tanggal_pinjam' => '2025-06-19 09:00:00',
                'tanggal_kembali' => '2025-06-21 10:00:00',
                'tanggal_pengembalian' => null,
                'status' => 'Terlambat',
            ],
            [
                'buku_id' => 4,
                'anggota_id' => 2,
                'tanggal_pinjam' => '2025-06-17 14:00:00',
                'tanggal_kembali' => '2025-06-22 10:00:00',
                'tanggal_pengembalian' => null,
                'status' => 'Dipinjam',
            ],
            [
                'buku_id' => 5,
                'anggota_id' => 2,
                'tanggal_pinjam' => '2025-05-30 09:00:00',
                'tanggal_kembali' => '2025-06-04 10:00:00',
                'tanggal_pengembalian' => '2025-06-04 10:00:00',
                'status' => 'Kembali',
            ],
            [
                'buku_id' => 6,
                'anggota_id' => 2,
                'tanggal_pinjam' => '2025-06-12 16:00:00',
                'tanggal_kembali' => '2025-06-14 10:00:00',
                'tanggal_pengembalian' => null,
                'status' => 'Terlambat',
            ]
        ];

        foreach ($pinjamanData as $item) {
            Pinjaman::create($item);
        }
    }
}
