<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/riwayat', [RiwayatController::class, 'tampilkanRiwayat']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('/', fn() => view('home'))->name('home');
Route::get('/search', fn() => view('search'))->name('search');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/profile', fn() => view('profile'))->name('profile');

Route::get('/login', function () {
    return view('login');
});

Route::get('/katalog', function () {
    return view('katalog');
});


Route::get('/pengajuan', function () {
    return view('pengajuan');
});
Route::get('/about', function () {
    return view('about'); 
})->name('about');
