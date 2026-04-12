<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <a href="#" class="flex items-center ps-2.5 mb-5 text-xl font-bold text-blue-600">Perpus Digital</a>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/dashboard" class="flex items-center p-2 text-blue-600 bg-blue-50 rounded-lg group">
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/katalog" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                        <span class="ms-3">Katalog Buku</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Layanan</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li><a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Peminjaman Saya</a></li>
                        <li><a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Riwayat</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Selamat Datang, Anggota PBL! 👋</h2>
            <p class="text-gray-500 mb-6">Kelola data buku fisik dan pantau status peminjaman mahasiswa di sini.</p>
            
            <hr class="mb-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-blue-600 rounded-2xl shadow-lg shadow-blue-200">
                    <h5 class="text-blue-100 font-medium">Total Koleksi Buku</h5>
                    <h2 class="text-4xl font-bold text-white mt-2">120</h2>
                </div>
                <div class="p-6 bg-emerald-500 rounded-2xl shadow-lg shadow-emerald-200">
                    <h5 class="text-emerald-50 text-emerald-100 font-medium">Buku Sedang Dipinjam</h5>
                    <h2 class="text-4xl font-bold text-white mt-2">15</h2>
                </div>
                <div class="p-6 bg-amber-400 rounded-2xl shadow-lg shadow-amber-100">
                    <h5 class="text-amber-900 font-medium font-medium">Antrean Anggota Baru</h5>
                    <h2 class="text-4xl font-bold text-amber-900 mt-2">8</h2>
                </div>
            </div>
        </div>
    </div>

<footer class="bg-[#632024] text-white py-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
            
            <div class="flex justify-center md:justify-start items-center">
                <img src="{{ asset('images/readspace-library.png') }}" 
                     alt="Logo Readspace" 
                     class="h-20 w-auto object-contain"> </div>

            <div>
                <h6 class="font-bold mb-2">Readspace Library</h6>
                <p class="text-sm text-gray-300 leading-relaxed">
                    Readspace Library adalah platform perpustakaan digital yang kami rancang untuk memudahkan mahasiswa dalam peminjaman buku serta memudahkan sistem perpustakan.
                </p>
            </div>

            <div>
                <h6 class="font-bold mb-2">Politeknik Negeri Batam</h6>
                <p class="text-sm text-gray-300">
                    Jl. Ahmad Yani, Batam Kota, Kota Batam, Kepulauan Riau, Indonesia.
                </p>
            </div>

            <div>
                <h6 class="font-bold mb-2">Hubungi Kami</h6>
                <p class="text-sm text-gray-300">
                    Email: readspacelibrary@poltek.ac.id<br>
                    Telp: (021) 673528
                </p>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
