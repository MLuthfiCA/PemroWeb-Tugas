<?php

namespace App\Http\Controllers;

// Import yang wajib ada agar tidak muncul error "Class not imported"
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required', 
            'password' => 'required',
            'role'     => 'required'
        ]);

        // REKAYASA LOGIN: Tidak cek database
        $user = [
            'name' => $request->username,
            'role' => $request->role,
            'username' => $request->username
        ];

        // Simpan ke session
        session(['user' => $user]);

        if ($request->role == 'admin') {
            return redirect()->route('admin.katalog');
        } else {
            return redirect()->route('katalog');
        }
    }
}