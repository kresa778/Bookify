<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
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
            $table->string('denda');
            $table->string('keterangan');
            $table->date('tgl_pinjaman');
            $table->date('tgl_lambat');
            $table->timestamps();

            //Relations
            $table->foreignId('id_buku');
            $table->foreignId('id_user');
            $table->foreignId('id_pengurus');
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
