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
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserSejarahController;
use App\Http\Controllers\UserVisiMisiController;
use App\Http\Controllers\UserAdArtController;
use App\Http\Controllers\UserStrukturOrganisasiController;
use App\Http\Controllers\UserArtikelController;
use App\Http\Controllers\UserKeanggotaanController;
use App\Http\Controllers\UserGaleriController;
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


Route::middleware(['auth'])->group(function () {
    Route::resource('admin/profil_sejarah', ProfilSejarahController::class);
});


// User routes
Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home.index');
Route::get('/user/sejarah', [UserSejarahController::class, 'index'])->name('user.sejarah.index');
Route::get('/user/visimisi', [UserVisiMisiController::class, 'index'])->name('user.visimisi.index');
Route::get('/user/adArt', [UserAdArtController::class, 'index'])->name('user.adArt.index');
Route::get('/user/strukturOrganisasi', [UserStrukturOrganisasiController::class, 'index'])->name('user.strukturOrganisasi.index');
Route::get('/user/keanggotaan', [UserKeanggotaanController::class, 'index'])->name('user.keanggotaan.index');
Route::get('/user/galeri', [UserGaleriController::class, 'index'])->name('user.galeri.index');


// Route untuk halaman home user
Route::get('/user/home', [UserArtikelController::class, 'home'])->name('user.home.index');

// Route untuk detail artikel
Route::get('/user/artikel/{id}', [UserArtikelController::class, 'show'])->name('user.artikel.show');





// Route::get('/user/sejarah', [App\Http\Controllers\UserController::class, 'index'])->name('user.sejarah.index');
// Route::get('/user/home', [App\Http\Controllers\UserHomeController::class, 'index'])->name('user.home.index');
// Route::get('/user/sejarah', [App\Http\Controllers\UserSejarahController::class, 'index'])->name('user.sejarah.index');
// Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.sejarah.index');
// Halaman utama (opsional)
// Route::get('/', [LoginController::class, 'login'])->name('login');
// Route::post('loginAksi', [LoginController::class, 'loginAksi'])->name('loginAksi');
// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('logoutAksi', [LoginController::class, 'logoutAksi'])->name('logoutAksi')->middleware('auth');
