<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;


class AdminController extends Controller
{
    public function tampilkanDataUser()
    {
        // Mengambil data dari database (tabel users)
        $users = User::all();
        return view('admin.pages.datauser', compact('users'));
    }
    
    public function destroy($id)
    {
        // Menemukan id dari tabel user untuk dihapus
        User::findOrFail($id)->delete();
        return redirect('/admin/data_user')->with('success', 'Data berhasil dihapus');
    }

    public function profile()
    {
        try {
            // Mengambil semua data peminjaman agar tabel tidak kosong
            $books = Peminjaman::with(['user', 'buku'])
                ->orderBy('status', 'desc') // 'dipinjam' akan muncul di atas 'dikembalikan'
                ->orderBy('created_at', 'desc')
                ->get();
            return view('admin.pages.profile', compact('books'));
        } catch (\Exception $e) {
            // Jika database error (misal MySQL belum nyala), gunakan data dummy
            $dummyBooks = collect([
                (object)[
                    'id' => 1,
                    'user' => (object)['name' => 'Siti Aminah'],
                    'buku' => (object)['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'cover' => 'Laskar_Pelangi_Sampul.jpg'],
                    'batas_kembali' => date('Y-m-d', strtotime('-3 days')), // Terlambat 3 hari
                    'status' => 'dipinjam',
                    'denda' => 0,
                    'status_denda' => 'lunas'
                ],
                (object)[
                    'id' => 2,
                    'user' => (object)['name' => 'Budi Santoso'],
                    'buku' => (object)['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'cover' => 'filosofi_teras.webp'],
                    'batas_kembali' => date('Y-m-d', strtotime('+2 days')), // Belum terlambat
                    'status' => 'dipinjam',
                    'denda' => 0,
                    'status_denda' => 'lunas'
                ],
                (object)[
                    'id' => 3,
                    'user' => (object)['name' => 'Andi Darmawan'],
                    'buku' => (object)['judul' => 'Bumi', 'penulis' => 'Tere Liye', 'cover' => 'cover_buku_bumi.jpg'],
                    'batas_kembali' => date('Y-m-d', strtotime('-5 days')), // Dikembalikan terlambat, denda belum dibayar
                    'status' => 'dikembalikan',
                    'denda' => 25000,
                    'status_denda' => 'belum_lunas'
                ]
            ]);
            return view('admin.pages.profile', ['books' => $dummyBooks, 'db_error' => $e->getMessage()]);
        }
    }

    public function accPengembalian($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        
        // Hitung denda jika terlambat
        $denda = 0;
        if (strtotime($peminjaman->batas_kembali) < time()) {
            $hari_terlambat = ceil((time() - strtotime($peminjaman->batas_kembali)) / (60 * 60 * 24));
            $denda = max(0, $hari_terlambat * 5000);
        }

        // Update status peminjaman
        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now(),
            'denda' => $denda,
            'status_denda' => $denda > 0 ? 'belum_lunas' : 'lunas',
        ]);

        // Update status buku
        $buku = $peminjaman->buku;
        $buku->update(['status' => 'Tersedia']);

        return redirect()->back()->with('success', 'Pengembalian buku berhasil di-ACC!');
    }

    public function bayarDenda($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update(['status_denda' => 'lunas']);

        return redirect()->back()->with('success', 'Denda telah dinyatakan lunas!');
    }
}
