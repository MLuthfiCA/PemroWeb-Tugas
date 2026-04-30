<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;


class BukuController extends Controller
{
    public function edit($id)
{
    $Buku = collect([
        ['id' => 1, 'judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'genre' => 'Drama'],
        ['id' => 2, 'judul' => 'Bumi', 'penulis' => 'Tere Liye', 'genre' => 'Fantasi'],
    ]);

    $buku = $Buku->firstWhere('id', $id);

    return view('admin.pages.edit-buku', compact('buku'));
}

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'genre' => $request->genre,
            'status' => $request->status,
        ]);

        return redirect()->route('katalog')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('katalog')->with('success', 'Data berhasil dihapus');
    }
    public function index()
{
    $Buku = Buku::all(); // ambil dari database
    return view('admin.pages.katalog-admin', compact('Buku'));
}

    public function storePeminjaman(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        $user = session('user');
        if (!$user) return redirect('/login');

        // Check if book is already borrowed
        $buku = Buku::findOrFail($request->buku_id);
        if ($buku->status === 'Dipinjam') {
            return back()->with('error', 'Buku sedang dipinjam.');
        }

        $userId = $user['id'] ?? 1;

        $peminjaman = Peminjaman::create([
            'user_id' => $userId,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'batas_kembali' => date('Y-m-d', strtotime($request->tanggal_pinjam . ' + 7 days')),
            'status' => 'dipinjam',
            'denda' => 0,
            'status_denda' => 'lunas',
        ]);

        // Update book status
        $buku->update(['status' => 'Dipinjam']);

        return redirect()->route('riwayat')->with('success', 'Peminjaman berhasil diajukan!');
    }
}