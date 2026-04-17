<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;

class AdminController extends Controller
{
    public function tampilkanDataUser()
    {
        // Mengambil data dari database (tabel users)
        $users = User::all();
        return view('admin.data_user', compact('users'));
    }
    
    public function destroy($id)
    {
        // Menemukan id dari tabel user untuk dihapus
        User::findOrFail($id)->delete();
        return redirect('/admin/data_user')->with('success', 'Data berhasil dihapus');
    }

    public function profile()
    {
        $bukuDipinjam = Buku::where('status', 'Dipinjam')->get();
        return view('admin.profile', compact('bukuDipinjam'));
    }
}
