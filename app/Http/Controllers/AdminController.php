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
            // Jika database error (misal MySQL belum nyala), tampilkan halaman dengan pesan error
            return view('admin.pages.profile', ['books' => collect(), 'db_error' => $e->getMessage()]);
        }
    }

    public function accPengembalian($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        
        // Update status peminjaman
        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now(),
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
