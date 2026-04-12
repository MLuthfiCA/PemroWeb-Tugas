<!DOCTYPE html>
<html lang="en">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="w-1/2 mx-auto mt-6 bg-white rounded-lg shadow-md p-4">
        <div class="flex justify-center">
            <img src="{{ asset('images/poltek.png') }}" class="w-[260px] h-[260px] pt-5">
        </div>

        <h2 class="text-center text-blue-600 font-bold text-xl py-4">
            Sistem Perpustakaan Digital
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
            <button
                class="bg-red-500 text-white py-2 px-4 mb-4 border rounded text-lg hover:bg-red-600 transition">
                Log In
            </button>
        </form>
    </div>
</body>
</html>
