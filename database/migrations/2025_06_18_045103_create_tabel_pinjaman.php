<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tabel_pinjaman', function (Blueprint $table) {
            $table->id();

            // Foreign Key untuk tabel_buku
            $table->foreignId('buku_id')
                  ->constrained('tabel_buku')
                  ->onDelete('cascade'); // Jika buku dihapus, data pinjaman ini juga ikut terhapus

            // Foreign Key untuk tabel_anggota
            $table->foreignId('anggota_id')
                  ->constrained('tabel_anggota')
                  ->onDelete('cascade'); // Jika anggota dihapus, data pinjaman ini ikut terhapus

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->date('tanggal_pengembalian')->nullable(); // Tanggal aktual saat buku dikembalikan
            $table->enum('status', ['Dipinjam', 'Kembali', 'Terlambat'])->default('Dipinjam');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_pinjaman');
    }
};
