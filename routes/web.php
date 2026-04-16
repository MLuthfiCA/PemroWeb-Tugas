<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;

Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/riwayat', [RiwayatController::class, 'tampilkanRiwayat']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/search', fn() => view('search'))->name('search');


Route::get('/login', function () {
    return view('login');
});

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/profile', [ProfileController::class, 'profile'])->name('admin.profile');