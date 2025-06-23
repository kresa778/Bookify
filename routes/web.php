<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\AnggotaController;


use App\Http\Controllers\Pengurus\BukuController;
use App\Http\Controllers\Pengurus\PengurusController;
use App\Http\Controllers\Pengurus\PinjamanController;
use App\Http\Controllers\Pengurus\AnggotaAdminController;

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

Route::get('/hash', function () {
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
    // profile
    Route::get('profile', [AnggotaController::class, 'profile'])->name('anggota.profile');
    Route::put('profile', [AnggotaController::class, 'profileUpdate'])->name('anggota.profile.update');

    Route::get('dashboard', [AnggotaController::class, 'DashboardAnggota'])->name('anggota.dashboard');
    Route::get('buku', [AnggotaController::class, 'DaftarBuku'])->name('anggota.buku');
    Route::get('/buku/{buku}', [AnggotaController::class, 'show'])->name('anggota.buku.show');
    Route::get('pinjaman', [AnggotaController::class, 'DaftarPinjaman'])->name('anggota.pinjaman');
    Route::get('/pinjaman/cari', [AnggotaController::class, 'cari'])->name('pinjaman.cari');
});


Route::prefix('pengurus')->name('pengurus.')->group(function () {
    Route::get('dashboard', [PengurusController::class, 'index'])->name('dashboard');
    Route::resource('buku', BukuController::class);
    Route::resource('pinjaman', PinjamanController::class);
    Route::resource('anggota', AnggotaAdminController::class);
});



