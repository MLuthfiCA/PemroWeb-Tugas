<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Readspace Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/readspace-library.png') }}" class="w-40 h-40 object-contain">
        </div>

        <h2 class="text-center text-[#632034] font-bold text-2xl mb-6">
            ReadSpace Library 
        </h2>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf 

            @if($errors->has('login_error'))
                <div class="bg-red-100 text-red-700 p-3 rounded text-sm text-center border border-red-200">
                    {{ $errors->first('login_error') }}
                </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    placeholder="Masukkan username"
                    class="w-full mt-1 p-3 border {{ $errors->has('username') ? 'border-red-500' : 'border-gray-300' }} rounded focus:ring-2 focus:ring-[#632034] outline-none transition">
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password"
                    placeholder="Minimal 6 karakter"
                    class="w-full mt-1 p-3 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} rounded focus:ring-2 focus:ring-[#632034] outline-none transition">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Login Sebagai</label>
                <select name="role" required
                    class="w-full mt-1 p-3 border border-gray-300 rounded bg-white focus:ring-2 focus:ring-[#632034] outline-none cursor-pointer">
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="mahasiswa">User (Mahasiswa)</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" 
                class="w-full bg-[#632024] text-white py-3 rounded-lg font-bold hover:bg-red-900 transition duration-200 mt-4">
                Log In
            </button>

            <div class="text-center text-sm text-gray-500 mt-4">
                Belum punya akun? <a href="{{ route('register') }}" class="text-red-600 font-bold hover:underline">Daftar Sekarang</a>
            </div>
        </form>
    </div>
</body>
</html>