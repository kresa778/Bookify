<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\PengurusPerpustakaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->insertUser();
        $this->insertBuku();
    }

    /**
     * Seed default data user
     *
     * @return void
     */
    private function insertUser()
    {
        // pengurus
        $pengurus = [
            [
                'nama_pengurus' => 'Pengurus Utama',
                'email_pengurus' => 'pengurus@gmail.com',
                'password' => Hash::make('pengurus'),
                'kategori' => 'pengurus'
            ],
            [
                'nama_pengurus' => 'anton',
                'email_pengurus' => 'anton',
                'password' => Hash::make('anton'),
                'kategori' => 'pengurus'
            ]

        ];

        foreach ($pengurus as $item) {
            PengurusPerpustakaan::create($item);
        }
    }

    /**
     * Seed default data buku
     *
     * @return void
     */
    private function insertBuku()
    {
        $books = [
            [
                'nama_buku' => 'Pemrograman Web Lanjut',
                'penerbit' => 'Elex Media',
                'edisi' => '1',
                'sinopsis' => 'Buku ini membahas teknik lanjutan dalam pemrograman web.',
                'isbn' => '9786021234567',
                'lokasi_buku' => 'Rak A1',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Dasar-Dasar Jaringan Komputer',
                'penerbit' => 'Gramedia',
                'edisi' => '2',
                'sinopsis' => 'Pengantar jaringan komputer untuk pemula.',
                'isbn' => '9786022345678',
                'lokasi_buku' => 'Rak B2',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Struktur Data',
                'penerbit' => 'Andi Publisher',
                'edisi' => '3',
                'sinopsis' => 'Pembahasan struktur data dalam bahasa C.',
                'isbn' => '9786023456789',
                'lokasi_buku' => 'Rak C3',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Algoritma dan Pemrograman',
                'penerbit' => 'Erlangga',
                'edisi' => '1',
                'sinopsis' => 'Konsep dasar algoritma dan implementasinya.',
                'isbn' => '9786024567890',
                'lokasi_buku' => 'Rak A2',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Database Relasional',
                'penerbit' => 'Informatika Bandung',
                'edisi' => '2',
                'sinopsis' => 'Belajar membuat database relasional dengan SQL.',
                'isbn' => '9786025678901',
                'lokasi_buku' => 'Rak D1',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Pemrograman Python',
                'penerbit' => 'Deepublish',
                'edisi' => '1',
                'sinopsis' => 'Bahasa pemrograman Python untuk semua kalangan.',
                'isbn' => '9786026789012',
                'lokasi_buku' => 'Rak B1',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Pemrograman Java',
                'penerbit' => 'Elex Media',
                'edisi' => '2',
                'sinopsis' => 'Dasar-dasar pemrograman dengan Java.',
                'isbn' => '9786027890123',
                'lokasi_buku' => 'Rak C2',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Kecerdasan Buatan',
                'penerbit' => 'Andi Publisher',
                'edisi' => '1',
                'sinopsis' => 'Konsep dasar AI dan penerapannya.',
                'isbn' => '9786028901234',
                'lokasi_buku' => 'Rak E1',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Sistem Operasi',
                'penerbit' => 'Gramedia',
                'edisi' => '3',
                'sinopsis' => 'Prinsip dasar sistem operasi modern.',
                'isbn' => '9786029012345',
                'lokasi_buku' => 'Rak A3',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Rekayasa Perangkat Lunak',
                'penerbit' => 'Informatika Bandung',
                'edisi' => '2',
                'sinopsis' => 'Teknik dan metode pengembangan perangkat lunak.',
                'isbn' => '9786020123456',
                'lokasi_buku' => 'Rak D2',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Jaringan Komputer Lanjut',
                'penerbit' => 'Erlangga',
                'edisi' => '1',
                'sinopsis' => 'Pembahasan lanjutan mengenai jaringan komputer.',
                'isbn' => '9786021234568',
                'lokasi_buku' => 'Rak B3',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Pengantar Teknologi Informasi',
                'penerbit' => 'Deepublish',
                'edisi' => '1',
                'sinopsis' => 'Buku pengantar untuk mahasiswa TI.',
                'isbn' => '9786022345679',
                'lokasi_buku' => 'Rak E2',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Manajemen Proyek TI',
                'penerbit' => 'Elex Media',
                'edisi' => '1',
                'sinopsis' => 'Cara mengelola proyek teknologi informasi.',
                'isbn' => '9786023456790',
                'lokasi_buku' => 'Rak A4',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Keamanan Jaringan',
                'penerbit' => 'Gramedia',
                'edisi' => '2',
                'sinopsis' => 'Konsep dan praktik keamanan jaringan.',
                'isbn' => '9786024567801',
                'lokasi_buku' => 'Rak C1',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Pemrograman Mobile Android',
                'penerbit' => 'Andi Publisher',
                'edisi' => '1',
                'sinopsis' => 'Belajar membuat aplikasi Android.',
                'isbn' => '9786025678912',
                'lokasi_buku' => 'Rak D3',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Internet of Things (IoT)',
                'penerbit' => 'Informatika Bandung',
                'edisi' => '1',
                'sinopsis' => 'Mengenal dan membangun sistem IoT.',
                'isbn' => '9786026789023',
                'lokasi_buku' => 'Rak E3',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Cloud Computing',
                'penerbit' => 'Deepublish',
                'edisi' => '2',
                'sinopsis' => 'Dasar dan implementasi cloud.',
                'isbn' => '9786027890134',
                'lokasi_buku' => 'Rak A5',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Etika Profesi TI',
                'penerbit' => 'Erlangga',
                'edisi' => '1',
                'sinopsis' => 'Etika dan tanggung jawab profesional TI.',
                'isbn' => '9786028901245',
                'lokasi_buku' => 'Rak B4',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Big Data Analytics',
                'penerbit' => 'Andi Publisher',
                'edisi' => '1',
                'sinopsis' => 'Analisis data dalam skala besar.',
                'isbn' => '9786029012356',
                'lokasi_buku' => 'Rak C4',
                'status_buku' => 'Tersedia'
            ],
            [
                'nama_buku' => 'Machine Learning Dasar',
                'penerbit' => 'Gramedia',
                'edisi' => '1',
                'sinopsis' => 'Belajar dasar machine learning.',
                'isbn' => '9786020123467',
                'lokasi_buku' => 'Rak D4',
                'status_buku' => 'Tersedia'
            ]
        ];

        foreach ($books as $item) {
            Buku::create($item);
        }
    }
}
