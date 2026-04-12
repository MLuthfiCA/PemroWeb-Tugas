<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register - ReadSpace Library</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Color -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#632024'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100">

<div class="flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-96">
        
        <div class="flex justify-center mb-6">
    <img src="{{ asset('logo.png') }}" alt="Logo"
        class="w-28 h-30 object-contain">
</div>

        <form action="/register" method="POST" class="space-y-4">
            @csrf

            <input type="text" name="name" placeholder="Nama Lengkap"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">

            <input type="email" name="email" placeholder="Email"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">

            <input type="password" name="password" placeholder="Password"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">

            <button type="submit"
                class="w-full bg-primary text-white py-2 rounded-lg hover:bg-[#4e1a1d] transition">
                Daftar
            </button>
        </form>

        <p class="text-center mt-4 text-sm">
            Sudah punya akun?
            <a href="/login" class="text-primary font-semibold">Login</a>
        </p>

    </div>

</div>

</body>
</html>