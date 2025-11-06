<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluargaKkController;


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
})->name('guest.pages.kontak');;

Route::get('/keluarga', [KeluargaController::class, 'index']);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('warga', WargaController::class);
Route::resource('kependudukan', KeluargaKkController::class);

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('/login', function () {
    return view('guest.auth.login');
})->name('guest.auth.login');

Route::resource('user', UserController::class);
