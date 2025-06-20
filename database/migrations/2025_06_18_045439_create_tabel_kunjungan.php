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
        $table->unsignedBigInteger('id_buku'); // tambahkan kolom foreign key
        $table->unsignedBigInteger('id_user');
        $table->timestamps();

        //Relations
        $table->foreign('id_buku')->references('id')->on('tabel_buku')->onDelete('cascade');
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
