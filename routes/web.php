<?php

use App\Http\Controllers\ProfilSejarahController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\AdArtController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KeanggotaanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


// Resource route untuk Profil Sejarah
Route::resource('profil_sejarah', ProfilSejarahController::class);

// Resource route untuk Profil Visi Misi
Route::resource('visi_misi', VisiMisiController::class);

Route::resource('struktur_organisasi', StrukturOrganisasiController::class);

Route::resource('ad_art', AdArtController::class);

Route::resource('galeri', GaleriController::class);

Route::resource('keanggotaan', KeanggotaanController::class);

Route::resource('artikel', ArtikelController::class);

// Halaman utama diarahkan ke halaman login
Route::get('/', [LoginController::class, 'login'])->name('login');

// Rute untuk login aksi
Route::post('loginAksi', [LoginController::class, 'loginAksi'])->name('loginAksi');

// Rute untuk home dengan middleware auth
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Rute untuk logout dengan middleware auth
Route::get('logoutAksi', [LoginController::class, 'logoutAksi'])->name('logoutAksi')->middleware('auth');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin/profil_sejarah', ProfilSejarahController::class);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.sejarah.index');
});



// Halaman utama (opsional)
// Route::get('/', [LoginController::class, 'login'])->name('login');
// Route::post('loginAksi', [LoginController::class, 'loginAksi'])->name('loginAksi');
// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('logoutAksi', [LoginController::class, 'logoutAksi'])->name('logoutAksi')->middleware('auth');
