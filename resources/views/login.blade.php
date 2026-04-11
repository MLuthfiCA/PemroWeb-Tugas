<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">
        Sistem Perpustakaan Digital
    </h2>

    <form action="#" method="POST" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" placeholder="Enter your username" required
                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" placeholder="Enter your password" required
                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" 
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
            Log In
        </button>
    </form>
</div>

</body>
</html>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="w-1/2 mx-auto mt-6 bg-white rounded-lg shadow-md p-4">
        <div class="flex justify-center">
            <img src="{{ asset('images/poltek.png') }}" class="w-[260px] h-[260px] pt-5">
        </div>

        <h2 class="text-center text-blue-600 font-bold text-xl py-4">
            System Perpustakaan Digital
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
