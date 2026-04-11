<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function dataPeminjaman(){
        return [
            ['id_pengguna' => 3323, 'judul' => 'Laut Bercerita', 'tanggal_pinjam' => '01-04-2026'],
            ['id_pengguna' => 3325, 'judul' => 'Off The Record', 'tanggal_pinjam' => '25-03-2026'],
        ];
    }

    public function tampilkanRiwayat() {
        $peminjaman = $this->dataPeminjaman();
        $pengembalian = [
            ['id_pengguna' => '3321', 'judul' => 'Filosofi Teras', 'tanggal_kembali' => '02-04-2026'],
            ['id_pengguna' => '3320', 'judul' => 'Bumi Manusia', 'tanggal_kembali' => '01-04-2026'],
            ];
    return view('riwayat', compact('peminjaman', 'pengembalian'));
    }
}
