<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ReadSpace</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fdf8f4]">

    <!-- Navbar (ini yang bikin semua halaman sama) -->
    @include('layouts.navbar')

    <!-- Content -->
    <div class="p-6">
        @yield('content')
    </div>

</body>
</html>