<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'username' => 'required', 
            'password' => 'required',
            'role'     => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
            'role.required'     => 'Silakan pilih role login Anda.'
        ]);

        // 2. Auth Attempt (Laravel akan otomatis mengecek hashed password)
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();

            // Cek apakah role sesuai
            if ($user->role !== $request->role) {
                Auth::logout();
                return back()->withErrors(['login_error' => 'Role tidak sesuai!'])->withInput();
            }

            // 3. Redirect berdasarkan Role
            if ($user->role == 'admin') {
                return redirect()->route('admin.katalog');
            } else {
                return redirect()->route('katalog');
            }
        }

        // Jika user tidak ditemukan atau password salah
        return back()->withErrors(['login_error' => 'Username atau password salah!'])->withInput();
    }
}