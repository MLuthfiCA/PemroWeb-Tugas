<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Readspace Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        {{-- Logo --}}
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/readspace-library.png') }}" class="w-48 h-auto object-contain" alt="ReadSpace Logo">
        </div>

        {{-- Judul --}}
        <h2 class="text-center text-[#632024] font-extrabold text-2xl mb-6">
            ReadSpace Library 
        </h2>

        {{-- Form Login --}}
        <form action="{{ route('katalog') }}" method="GET" class="flex flex-col">
            
            <label class="mb-1 text-sm font-medium text-gray-700">Username:</label>
            <input type="text" name="username" required
                placeholder="Enter your username"
                class="mb-4 p-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#632024] focus:border-transparent">
            
            <label class="mb-1 text-sm font-medium text-gray-700">Password:</label>
            <input type="password" name="password" required
                placeholder="Enter your password"
                class="mb-4 p-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#632024] focus:border-transparent">
            
            <label class="mb-1 text-sm font-medium text-gray-700">Login Sebagai:</label>
            <select id="role" name="role" required
                class="mb-8 p-3 text-base border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-[#632024] focus:border-transparent">
                <option value="" disabled selected>Choose User</option>
                <option value="mahasiswa">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit"
                class="bg-[#632024] text-white py-3 px-4 rounded-lg text-lg font-bold hover:bg-red-900 transition-colors shadow-md">
                Log In
            </button>
            
            <p class="text-center text-sm text-gray-600 mt-6">
                Belum ada akun? <a href="{{ route('register') }}" class="text-[#632024] font-bold hover:underline">Daftar</a>
            </p>
        </form>
    </div>

</body>
</html>