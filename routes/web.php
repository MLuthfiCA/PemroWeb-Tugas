<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BukuController;


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

Route::get('/admin/users', function () {
    return view('admin.datauser'); 
})->name('admin.users');

// --- GUEST & AUTH ROUTES ---
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


// --- USER / MAHASISWA ROUTES ---
Route::get('/katalog', function (Request $request) {
    $semuaBuku = collect([
        ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'genre' => 'Drama', 'status' => 'Tersedia'],
        ['judul' => 'Bumi', 'penulis' => 'Tere Liye', 'genre' => 'Fantasi', 'status' => 'Tersedia'],
        ['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'genre' => 'Self-Dev', 'status' => 'Dipinjam'],
    ]);

    $query = $request->input('query');
    if ($query) {
        $hasilBuku = $semuaBuku->filter(function ($item) use ($query) {
            return str_contains(strtolower($item['judul']), strtolower($query)) || 
                   str_contains(strtolower($item['penulis']), strtolower($query));
        });
    } else {
        $hasilBuku = $semuaBuku;
    }
    return view('katalog', ['daftarBuku' => $hasilBuku]);
})->name('katalog');

// Route Search Mahasiswa (Sudah diperbaiki tutup kurungnya)
Route::get('/search', function (Request $request) {
    $semuaBuku = collect([
        (object)['id' => 1, 'judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'cover' => ''],
        (object)['id' => 2, 'judul' => 'Bumi', 'penulis' => 'Tere Liye', 'cover' => ''],
        (object)['id' => 3, 'judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'cover' => ''],
    ]);

    $query = $request->input('query');
    if ($query) {
        $books = $semuaBuku->filter(function ($book) use ($query) {
            return str_contains(strtolower($book->judul), strtolower($query)) || 
                   str_contains(strtolower($book->penulis), strtolower($query));
        });
    } else {
        $books = collect(); 
    }
    return view('search', compact('books'));
})->name('search');

Route::get('/katalog/{id}', function ($id) {
    return "Halaman Detail untuk Buku ID: " . $id;
})->name('katalog.detail');

Route::get('/about', function () {
    return view('about'); 
})->name('about');

Route::get('/profile', function () {
    $daftarBuku = [['judul' => 'Laskar Pelangi'], ['judul' => 'Bumi']];
    return view('profile', compact('daftarBuku'));
})->name('profile');

Route::get('/pengajuan', function () {
    return view('pengajuan');
})->name('pengajuan');

Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/riwayat', [RiwayatController::class, 'tampilkanRiwayat']);

// --- AREA ADMIN ---
Route::get('/admin/about', function () {
    return view('admin.about');
})->name('admin.about');

Route::prefix('admin')->group(function () {

    Route::get('/katalog', function () {
        $Buku = collect([
            ['id' => 1, 'judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'genre' => 'Drama', 'status' => 'Tersedia'],
            ['id' => 2, 'judul' => 'Bumi', 'penulis' => 'Tere Liye', 'genre' => 'Fantasi', 'status' => 'Tersedia'],
            ['id' => 3, 'judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'genre' => 'Self-Dev', 'status' => 'Dipinjam'],
        ]);

        return view('admin.katalog-admin', compact('Buku'));
    })->name('admin.katalog');

    // ✅ EDIT
    Route::get('/katalog/{id}/edit', [BukuController::class, 'edit'])->name('admin.edit');

    // ✅ UPDATE
    Route::put('/katalog/{id}', [BukuController::class, 'update'])->name('admin.update');

    // ✅ DELETE
    Route::delete('/katalog/{id}', [BukuController::class, 'destroy'])->name('admin.delete');
});

$Buku = collect([
    [
        'id' => 1,
        'judul' => 'Laskar Pelangi',
        'penulis' => 'Andrea Hirata',
        'genre' => 'Drama',
        'status' => 'Tersedia',
        'cover' => 'cover1.jpg'
    ],
]);