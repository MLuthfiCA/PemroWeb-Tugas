<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/riwayat', [RiwayatController::class, 'tampilkanRiwayat']);
Route::get('/login', [LoginController::class, 'login']);

// Tambahan untuk sidebar
Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/riwayat', function () {
    return 'Halaman Riwayat';
});

Route::get('/pengajuan', function () {
    return view('pengajuan');
});
