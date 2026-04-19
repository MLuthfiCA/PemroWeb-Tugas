<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function edit($id)
{
    $Buku = collect([
        ['id' => 1, 'judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'genre' => 'Drama'],
        ['id' => 2, 'judul' => 'Bumi', 'penulis' => 'Tere Liye', 'genre' => 'Fantasi'],
    ]);

    $buku = $Buku->firstWhere('id', $id);

    return view('admin.edit', compact('buku'));
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
    return view('admin.katalog-admin', compact('Buku'));
}
}