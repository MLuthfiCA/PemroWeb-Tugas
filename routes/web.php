<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;


Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/riwayat', [RiwayatController::class, 'tampilkanRiwayat']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/search', fn() => view('search'))->name('search');

// 1. Route untuk MENAMPILKAN halaman login (saat pertama dibuka)
Route::get('/login', function () {
    return view('login'); // Sesuaikan dengan nama file blade login kamu
})->name('login');

// 2. Route untuk MEMPROSES data saat tombol Log In diklik (ini yang sudah kamu buat)
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
// Route untuk Admin (dalam folder admin)
Route::get('/admin/katalog', function () {
    return view('admin.katalog-admin'); // folder admin, file katalog-admin.blade.php
})->name('admin.katalog');

// Route untuk Mahasiswa (di folder views utama)
Route::get('/katalog', function () {
    return view('katalog'); // file katalog.blade.php
})->name('mahasiswa.katalog');


Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login'); // Bagusnya balik ke login setelah keluar
})->name('logout');

Route::get('/katalog', function (Request $request) {
    // 1. Data buku (Simulasi data database)
    $semuaBuku = collect([
        ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'genre' => 'Drama', 'status' => 'Tersedia'],
        ['judul' => 'Bumi', 'penulis' => 'Tere Liye', 'genre' => 'Fantasi', 'status' => 'Tersedia'],
        ['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'genre' => 'Self-Dev', 'status' => 'Dipinjam'],
    ]);

    // 2. Ambil kata kunci dari input search bar
    $query = $request->input('query');

    // 3. Filter data berdasarkan judul atau penulis (jika ada pencarian)
    if ($query) {
        $hasilBuku = $semuaBuku->filter(function ($item) use ($query) {
            return str_contains(strtolower($item['judul']), strtolower($query)) || 
                   str_contains(strtolower($item['penulis']), strtolower($query));
        });
    } else {
        $hasilBuku = $semuaBuku;
    }

    // 4. Kirim hasilnya ke view katalog
    return view('katalog', ['daftarBuku' => $hasilBuku]);
})->name('katalog');

Route::get('/pengajuan', function () {
    return view('pengajuan');
});
Route::get('/about', function () {
    return view('about'); 
})->name('about');

// Halaman Profil Mahasiswa
Route::get('/profile', function () {
    $daftarBuku = [
        ['judul' => 'Laskar Pelangi'],
        ['judul' => 'Bumi']
    ];

    return view('profile', compact('daftarBuku'));
})->name('profile');

// Halaman Profil Admin
Route::get('/admin/profile', function () {
    $books = collect([
        (object)[
            'peminjam' => 'Budi',
            'nim' => '123456',
            'judul' => 'Filosofi Teras',
            'penulis' => 'Henry Manampiring',
            'jatuh_tempo' => '2026-04-20'
        ],
    ]);
    return view('admin.profile', compact('books'));
})->name('admin.profile');