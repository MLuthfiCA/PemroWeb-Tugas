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

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            // Sekarang VS Code tahu bahwa $user memiliki properti role
            if ($user->role !== $request->role) {
                Auth::logout();
                return back()->withErrors(['login_error' => 'Role tidak sesuai!'])->withInput();
            }

            if ($user->role == 'admin') {
                return redirect()->route('admin.katalog');
            } else {
                return redirect()->route('katalog');
            }
        }

        return back()->withErrors(['login_error' => 'Username atau password salah!'])->withInput();
    }
}