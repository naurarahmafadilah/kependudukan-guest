<?php

use App\Http\Controllers\AnggotaKeluargaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluargaKkController;
use App\Http\Controllers\PeristiwaKelahiranController;
use App\Http\Controllers\PeristiwaKematianController;
use App\Http\Controllers\PeristiwaPindahController;
use App\Models\AnggotaKeluarga;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman Tentang
Route::get('/about', function () {
    return view('guest.pages.about');
})->name('guest.pages.about');

// Halaman Layanan
Route::get('/layanan', function () {
    return view('guest.pages.layanan');
})->name('guest.pages.layanan');;

// Halaman Kontak
Route::get('/kontak', function () {
    return view('guest.pages.kontak');
})->name('guest.pages.kontak');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ==== Login & Logout ====
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

// PERUBAHAN: Alias login tambahan agar middleware bisa menemukan route "login"
Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('login');

Route::get('/login', function () {
    return view('guest.auth.login');
})->name('guest.auth.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ==== Resource Routes ====
Route::resource('user', UserController::class);
Route::resource('warga', WargaController::class);
Route::resource('kependudukan', KeluargaKkController::class);
Route::resource('anggota-keluarga', AnggotaKeluargaController::class);
Route::resource('kelahiran', PeristiwaKelahiranController::class);
Route::resource('kematian', PeristiwaKematianController::class);
Route::resource('pindah', PeristiwaPindahController::class);

// ==== Middleware Proteksi Halaman ====
Route::middleware(['checkIsLogin'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['checkIsLogin', 'checkRole:admin,operator'])->group(function() {
    Route::resource('user', UserController::class);
});

Route::middleware(['checkIsLogin', 'checkRole:admin,operator,rt'])->group(function() {
    Route::resource('warga', WargaController::class);
    Route::resource('kependudukan', KeluargaKkController::class);
    Route::resource('anggota-keluarga', AnggotaKeluargaController::class);
    Route::resource('kelahiran', PeristiwaKelahiranController::class);
    Route::resource('kematian', PeristiwaKematianController::class);
    Route::resource('pindah', PeristiwaPindahController::class);
});
