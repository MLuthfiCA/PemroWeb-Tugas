<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Pastikan ada User
        $user = User::first() ?? User::create([
            'name' => 'Rayyan',
            'email' => 'rayyan@student.polibatam.ac.id',
            'username' => 'rayyan123',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);

        // 2. Pastikan ada Buku
        $buku1 = Buku::where('judul', 'Laskar Pelangi')->first() ?? Buku::create([
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'genre' => 'Drama',
            'isbn' => '978-979-3062-79-1',
            'penerbit' => 'Bentang Pustaka',
            'tahun_terbit' => 2005,
            'kategori' => 'Novel',
            'stok' => 5,
            'status' => 'Dipinjam',
        ]);

        $buku2 = Buku::where('judul', 'Bumi')->first() ?? Buku::create([
            'judul' => 'Bumi',
            'penulis' => 'Tere Liye',
            'genre' => 'Fantasi',
            'isbn' => '978-602-03-3295-6',
            'penerbit' => 'Gramedia Pustaka Utama',
            'tahun_terbit' => 2014,
            'kategori' => 'Novel',
            'stok' => 3,
            'status' => 'Dipinjam',
        ]);

        $buku3 = Buku::where('judul', 'Filosofi Teras')->first() ?? Buku::create([
            'judul' => 'Filosofi Teras',
            'penulis' => 'Henry Manampiring',
            'genre' => 'Self-Dev',
            'isbn' => '978-602-412-518-9',
            'penerbit' => 'Kompas',
            'tahun_terbit' => 2018,
            'kategori' => 'Self Improvement',
            'stok' => 10,
            'status' => 'Tersedia',
        ]);

        // 3. Tambahkan Data Peminjaman
        
        // Peminjaman yang sudah dikembalikan
        Peminjaman::create([
            'user_id' => $user->id,
            'buku_id' => $buku3->id,
            'tanggal_pinjam' => date('Y-m-d', strtotime('-10 days')),
            'batas_kembali' => date('Y-m-d', strtotime('-3 days')),
            'tanggal_kembali' => date('Y-m-d', strtotime('-3 days')),
            'status' => 'dikembalikan',
            'denda' => 0,
            'status_denda' => 'lunas',
        ]);

        // Peminjaman yang hampir jatuh tempo (kembali dalam 2 hari)
        Peminjaman::create([
            'user_id' => $user->id,
            'buku_id' => $buku1->id,
            'tanggal_pinjam' => date('Y-m-d', strtotime('-5 days')),
            'batas_kembali' => date('Y-m-d', strtotime('+2 days')),
            'status' => 'dipinjam',
            'denda' => 0,
            'status_denda' => 'lunas',
        ]);

        // Peminjaman baru hari ini
        Peminjaman::create([
            'user_id' => $user->id,
            'buku_id' => $buku2->id,
            'tanggal_pinjam' => date('Y-m-d'),
            'batas_kembali' => date('Y-m-d', strtotime('+7 days')),
            'status' => 'dipinjam',
            'denda' => 0,
            'status_denda' => 'lunas',
        ]);
    }
}
