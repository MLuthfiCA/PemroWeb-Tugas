<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="w-1/2 mx-auto mt-6 bg-white rounded-lg shadow-md p-4">
        <div class="flex justify-center">
            <img src="{{ asset('images/readspace-library.png') }}" class="w-[260px] h-[260px] pt-5">
        </div>

        <h2 class="text-center text-red-#632034 font-bold text-xl py-4">
            ReadSpace Library 
        </h2>

        <form class="max-w-xl mx-auto flex flex-col">
            <label class="py-2">Username:</label>
            <input type="text"
                placeholder="Enter your username"
                class="mb-4 p-3 text-base border border-gray-300 rounded focus:outline-none focus:border-blue-500">
            <label class="py-2">Password:</label>
            <input type="password"
                placeholder="Enter your password"
                class="mb-4 p-3 text-base border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                        <form class="max-w-xl mx-auto flex flex-col">
            <label class="py-2">Login Sebagai:</label>
            <select id="role" name="role" required
                class="mb-4 p-3 text-base border border-gray-300 rounded bg-white focus:outline-none focus:border-blue-500">
                <option value="" disabled selected>Choose User</option>
                <option value="mahasiswa">User</option>
                <option value="admin">Admin</option>
            </select>
            <button
                        primary: '#632024'
                class="bg-[#632024] text-white py-2 px-4 mb-4 border rounded text-lg hover:bg-red-600 transition">
                Log In
            </button>
            <p class="text-center text-sm text-gray-600 mt-2">
    Belum ada akun? <a href="{{ route('register') }}" class="text-red-600 font-semibold hover:underline">Daftar</a>
            </p>
        </form>
    </div>
</body>
</html>
