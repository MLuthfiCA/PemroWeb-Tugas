<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;

function getDummyBooks() {
    return collect([
        ['id' => 1, 'judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'genre' => 'Drama', 'status' => 'Tersedia', 'cover' => 'Laskar_Pelangi_Sampul.jpg'],
        ['id' => 2, 'judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'genre' => 'Self-Dev', 'status' => 'Dipinjam', 'cover' => 'filosofi_teras.webp'],
        ['id' => 3, 'judul' => 'Akuntansi Dasar', 'penulis' => 'Erlangga', 'genre' => 'Edukasi', 'status' => 'Tersedia', 'cover' => 'Cover_akutansi.jpg'],
        ['id' => 4, 'judul' => 'Hujan', 'penulis' => 'Tere Liye', 'genre' => 'Romance', 'status' => 'Tersedia', 'cover' => 'cover_hujan.jpg'],
        ['id' => 5, 'judul' => 'Bandung After Rain', 'penulis' => 'Viva.co', 'genre' => 'Romance', 'status' => 'Tersedia', 'cover' => 'bandung.after.rain.jpg'],
        ['id' => 6, 'judul' => 'AI For Everyone', 'penulis' => 'Andrew Ng', 'genre' => 'Technology', 'status' => 'Tersedia', 'cover' => 'cover_AI.byerlangga.jpg'],
        ['id' => 7, 'judul' => 'Malioboro at Midnight', 'penulis' => 'Skysphire', 'genre' => 'Romance', 'status' => 'Dipinjam', 'cover' => 'maliboro.cover.jpg'],
        ['id' => 8, 'judul' => 'Bumi', 'penulis' => 'Tere Liye', 'genre' => 'Fantasi', 'status' => 'Tersedia', 'cover' => 'cover_buku_bumi.jpg'],
    ]);
}

Route::get('/', function () {
    if (session()->has('user')) {
        if (session('user')['role'] === 'admin') return redirect()->route('admin.katalog');
        return redirect()->route('katalog');
    }
    return redirect('/home');
});

Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/riwayat', function () {
    if (!session()->has('user')) return redirect('/login');
    
    $peminjaman = [
        ['judul' => 'Laskar Pelangi', 'id_pengguna' => 'B-742', 'tanggal_pinjam' => '2026-04-10', 'batas_kembali' => '2026-04-17', 'denda' => 45000],
    ];
    $pengembalian = [
        ['judul' => 'Hujan', 'id_pengguna' => 'B-128', 'tanggal_kembali' => '2026-04-05', 'denda' => 0],
    ];
    return view('riwayat', compact('peminjaman', 'pengembalian'));
})->name('riwayat');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/search', fn() => view('search'))->name('search');

Route::get('/admin/profile', function () {
    $books = collect([
        (object)[
            'peminjam' => 'Rayyan',
            'nim' => '123456',
            'judul' => 'Filosofi Teras',
            'penulis' => 'Henry Manampiring',
            'jatuh_tempo' => '2026-04-20',
            'denda' => 30000
        ],
    ]);
    return view('admin.profile', compact('books'));
})->name('admin.profile');

Route::get('/admin/users', function () {
    return view('admin.datauser'); 
})->name('admin.users');

// --- GUEST & AUTH ROUTES ---

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    if (session()->has('user')) {
        if (session('user')['role'] === 'admin') return redirect()->route('admin.katalog');
        return redirect()->route('katalog');
    }
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->forget('user');
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


// --- USER / MAHASISWA ROUTES ---
Route::get('/katalog', function (Request $request) {
    $semuaBuku = getDummyBooks();

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

// Route Search Mahasiswa 
Route::get('/search', function (Request $request) {
    $semuaBuku = getDummyBooks()->map(fn($item) => (object)$item);

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
    $buku = getDummyBooks()->firstWhere('id', (int)$id);
    
    if (!$buku) {
        abort(404);
    }

    return view('detail-buku', compact('buku'));
})->name('katalog.detail');

Route::get('/about', function () {
    return view('about'); 
})->name('about');

Route::get('/profile', function () {
    $daftarBuku = [['judul' => 'Laskar Pelangi'], ['judul' => 'Bumi']];
    return view('profile', compact('daftarBuku'));
})->name('profile');

Route::get('/pengajuan', function () {
    if (!session()->has('user')) return redirect('/login');
    return view('pengajuan');
})->name('pengajuan');



// --- AREA ADMIN ---
Route::get('/admin/about', function () {
    return view('admin.about');
})->name('admin.about');

Route::prefix('admin')->group(function () {

    // DATA BUKU HARUS DI DALAM SINI
    Route::get('/katalog', function () {
        $Buku = getDummyBooks();

        // Mengirimkan variabel $Buku ke view
        return view('admin.katalog-admin', compact('Buku'));
    })->name('admin.katalog');

    // Route edit, update, dan delete tetap seperti sebelumnya
    Route::get('/katalog/{id}/edit', [BukuController::class, 'edit'])->name('admin.edit');
    Route::put('/katalog/{id}', [BukuController::class, 'update'])->name('admin.update');
    Route::delete('/katalog/{id}', [BukuController::class, 'destroy'])->name('admin.delete');
    
    // Route Tambah Buku
    Route::get('/buku/tambah', function () {
        return view('admin.data-buku');
    })->name('admin.buku.create');
});

// --- ROUTE UNTUK HALAMAN EDIT BUKU ---
Route::get('/admin/buku/{id}/edit', function ($id) {
    $buku = getDummyBooks()->firstWhere('id', (int)$id);

    if (!$buku) {
        abort(404);
    }

    return view('admin.edit-buku', compact('buku'));
})->name('admin.edit_buku'); 

// Route untuk proses updatenya
Route::put('/admin/buku/{id}', function ($id) {
    return redirect()->route('admin.katalog')->with('success', 'Buku berhasil diupdate!');
})->name('admin.update_buku');
