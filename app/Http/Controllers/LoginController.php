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

        // MELAKUKAN LOGIN ASLI KE DATABASE
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role' => $request->role])) {
            $user = Auth::user();
            
            // Simpan data esensial ke session agar sesuai dengan arsitektur saat ini
            session(['user' => [
                'id' => $user->id,
                'name' => $user->name,
                'role' => $user->role,
                'username' => $user->username
            ]]);

            if ($user->role == 'admin') {
                return redirect()->route('admin.katalog');
            } else {
                return redirect()->route('katalog');
            }
        }

        // Jika username/password salah
        return back()->withErrors(['login_error' => 'Invalid username, password, or role. Only registered accounts can log in.']);
    }
}