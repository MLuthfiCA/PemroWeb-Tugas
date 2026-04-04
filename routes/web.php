<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/dashboard', [DashboardController::class, 'index']);

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
