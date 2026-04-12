<?php

namespace App\Http\Controllers;

class RiwayatController extends Controller
{
public function tampilkanRiwayat()
{
    // Data simulasi peminjaman
    $peminjaman = collect([
        [
            'id_pengguna' => 'USR001', 
            'judul' => 'Laskar Pelangi', 
            'tanggal_pinjam' => '2026-04-01',
            // Logika fiks 1 minggu (7 hari)
            'batas_kembali' => date('Y-m-d', strtotime('2026-04-01 + 7 days')) 
        ],
        [
            'id_pengguna' => 'USR002', 
            'judul' => 'Bumi', 
            'tanggal_pinjam' => '2026-04-05',
            'batas_kembali' => date('Y-m-d', strtotime('2026-04-05 + 7 days'))
        ],
    ]);

    $pengembalian = collect([
        ['id_pengguna' => 'USR001', 'judul' => 'Filosofi Teras', 'tanggal_kembali' => '2026-03-25'],
    ]);

    return view('riwayat', compact('peminjaman', 'pengembalian'));
}
}