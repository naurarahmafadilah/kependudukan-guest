<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluargaKkController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\PeristiwaKelahiranController;
use App\Http\Controllers\PeristiwaKematianController;
use App\Http\Controllers\PeristiwaPindahController;

/*
|--------------------------------------------------------------------------
| PUBLIC (TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/about', fn () => view('guest.pages.about'))->name('guest.pages.about');
Route::get('/layanan', fn () => view('guest.pages.layanan'))->name('guest.pages.layanan');
Route::get('/kontak', fn () => view('guest.pages.kontak'))->name('guest.pages.kontak');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USERS (ADMIN & GUEST)
|--------------------------------------------------------------------------
*/
Route::middleware(['checkIsLogin'])->group(function () {

    // Dashboard (admin & guest)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | GUEST ACCESS (READ ONLY)
    |--------------------------------------------------------------------------
    */
    Route::get('warga', [WargaController::class, 'index'])->name('warga.index');
    Route::get('warga/{warga}', [WargaController::class, 'show'])->name('warga.show');

    /*
    |--------------------------------------------------------------------------
    | JIKA GUEST KLIK EDIT / HAPUS → REDIRECT LOGIN
    |--------------------------------------------------------------------------
    */
    Route::middleware(['redirect.guest'])->group(function () {
        Route::get('warga/{warga}/edit', [WargaController::class, 'edit'])->name('warga.edit');
        Route::put('warga/{warga}', [WargaController::class, 'update'])->name('warga.update');
        Route::delete('warga/{warga}', [WargaController::class, 'destroy'])->name('warga.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN FULL ACCESS
    |--------------------------------------------------------------------------
    */
    Route::middleware(['checkRole:admin'])->group(function () {

        // User
        Route::resource('user', UserController::class);

        // Kependudukan
        Route::resource('warga', WargaController::class)->except(['index', 'show']);
        Route::resource('kependudukan', KeluargaKkController::class);
        Route::resource('anggota-keluarga', AnggotaKeluargaController::class);

        // Peristiwa
        Route::resource('kelahiran', PeristiwaKelahiranController::class);
        Route::resource('kematian', PeristiwaKematianController::class);
        Route::resource('pindah', PeristiwaPindahController::class);
    });
});
