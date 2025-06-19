<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PinjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('anggota')->group(function () {
    Route::get('tampil', [AnggotaController::class, 'ListAnggota']);
    Route::get('tambah', [AnggotaController::class, 'TambahAnggota']);
    Route::get('edit', [AnggotaController::class, 'EditAnggota']);
});

Route::prefix('buku')->group(function () {
    Route::get('tampil', [BukuController::class, 'ListBuku']);
    Route::get('tambah', [BukuController::class, 'TambahBuku']);
    Route::get('edit', [BukuController::class, 'EditBuku']);
});

Route::prefix('kunjungan')->group(function () {
    Route::get('tampil', [KunjunganController::class, 'ListKunjungan']);
    Route::get('tambah', [KunjunganController::class, 'TambahKunjungan']);
    Route::get('edit', [KunjunganController::class, 'EditKunjungan']);
});

Route::prefix('pengurus')->group(function () {
    Route::get('tampil', [PengurusController::class, 'ListPengurus']);
    Route::get('tambah', [PengurusController::class, 'TambahPengurus']);
    Route::get('edit', [PengurusController::class, 'EditPengurus']);
});

Route::prefix('pinjaman')->group(function () {
    Route::get('tampil', [PinjamanController::class, 'ListPinjaman']);
    Route::get('tambah', [PinjamanController::class, 'TambahPinjaman']);
    Route::get('edit', [PinjamanController::class, 'EditPinjaman']);
});
