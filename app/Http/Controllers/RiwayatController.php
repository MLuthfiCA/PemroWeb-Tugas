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
        $peminjaman = collect([]);

        // Fetch return history
        $pengembalian = collect([]);

        return view('user.pages.profile', compact('peminjaman', 'pengembalian'));
    }
}