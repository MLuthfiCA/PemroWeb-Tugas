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

        $userId = $user['id'] ?? 1;

        // Fetch active loans
        $peminjaman = Peminjaman::with('buku')
            ->where('user_id', $userId)
            ->where('status', 'dipinjam')
            ->get();

        // Fetch return history
        $pengembalian = Peminjaman::with('buku')
            ->where('user_id', $userId)
            ->where('status', 'dikembalikan')
            ->get();

        return view('user.pages.profile', compact('peminjaman', 'pengembalian'));
    }
}