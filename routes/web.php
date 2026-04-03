<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

use Illuminate\Support\Facades\Route;

Route::get('/katalog', function () {
    return view('pages.katalog'); 
});

Route::get('/riwayat', function () {
    return view('pages.riwayat');
});

Route::get('/pengajuan', function () {
    return view('pages.form_pengajuan');
});
