<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ReadSpace Library</title>

    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">

    @include('admin.layouts.navbar')

    <main>
        @yield('content')
    </main>

</body>
</html>