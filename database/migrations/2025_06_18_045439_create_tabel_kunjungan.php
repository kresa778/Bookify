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
        Schema::create('tabel_kunjungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengunjung');
            $table->string('status_pengunjung');
            $table->date('tgl_kunjungan');
            $table->timestamps();

            //Relations
            $table->foreign('id_buku');
            $table->foreign('id_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_kunjungan');
    }
};
