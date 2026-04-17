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
            // Regex ^[A-Z]+$ memastikan minimal 1 huruf harus kapital
            'username' => 'required|regex:/^[A-Z]/', 
            'password' => 'required|min:6',
            'role'     => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'username.regex'    => 'Username harus mengandung setidaknya satu huruf kapital.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min'      => 'Kata sandi minimal harus 6 karakter.',
            'role.required'     => 'Silakan pilih role login Anda.'
        ]);

        // 2. Cari User di Database (Tanpa hashing password)
        $user = User::where('username', $request->username)
                    ->where('password', $request->password)
                    ->first();

        if ($user) {
            // Login Berhasil
            Auth::login($user);

            // 3. Redirect berdasarkan Role
            if ($request->role == 'admin') {
                return redirect()->route('admin.katalog');
            } else {
                return redirect()->route('katalog');
            }
        }

        // Jika user tidak ditemukan
        return back()->withErrors(['login_error' => 'Username atau password salah!'])->withInput();
    }
}