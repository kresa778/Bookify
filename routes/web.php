<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Hash;




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
Route::get('/', [dashboardController::class, 'index']);
Route::get('/katalog', [dashboardController::class, 'showKatalog'])->name('katalog');
Route::get('/katalog/{buku}', [dashboardController::class, 'show'])->name('katalog.show');

Route::get('/hash', function(){
    $password = 'anton';
$hashedPassword = Hash::make($password);

return $hashedPassword;
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::prefix('anggota')->group(function () {
    Route::get('tampil', [AnggotaController::class, 'ListAnggota'])->name('anggota.tampil');
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
    Route::get('dashboard', [PengurusController::class, 'index'])->name('pengurus.dashboard');
    Route::get('tampil', [PengurusController::class, 'ListPengurus'])->name('pengurus.tampil');
    Route::get('tambah', [PengurusController::class, 'TambahPengurus']);
    Route::get('edit', [PengurusController::class, 'EditPengurus']);
});

Route::prefix('pinjaman')->group(function () {
    Route::get('tampil', [PinjamanController::class, 'ListPinjaman']);
    Route::get('tambah', [PinjamanController::class, 'TambahPinjaman']);
    Route::get('edit', [PinjamanController::class, 'EditPinjaman']);
});
