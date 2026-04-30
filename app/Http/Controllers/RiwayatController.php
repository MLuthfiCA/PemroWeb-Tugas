<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function tampilkanRiwayat()
    {
        $user = session('user');
        if (!$user) return redirect('/login');

        // Fetch active loans
        $peminjaman = Peminjaman::with('buku')
            ->where('user_id', $user['id'])
            ->where('status', 'dipinjam')
            ->get();

        // Fetch return history
        $pengembalian = Peminjaman::with('buku')
            ->where('user_id', $user['id'])
            ->where('status', 'dikembalikan')
            ->get();

        return view('user.pages.riwayat', compact('peminjaman', 'pengembalian'));
    }
}