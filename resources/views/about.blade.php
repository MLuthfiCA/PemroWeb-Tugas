<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-maroon { background-color: #d5b893; }
    </style>
</head>
<body class="bg-white flex flex-col min-h-screen font-sans">

    <header class="bg-custom-maroon text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            
            <div class="flex items-center">
                <img src="{{ asset('images/readspace-library.png') }}" alt="Logo" class="w-20 h-20 object-contain">
                <span class="ml-3 text-xl font-semibold">ReadSpace Library</span>
            </div>

        <nav class="flex justify-between items-center px-8 py-4 bg-[#d5b893] text-white shadow-lg">
    <div class="container mx-auto flex justify-between items-center">

    <!-- MENU + PROFILE -->
    <div class="flex items-center gap-6">

        <!-- Menu -->
        <nav class="flex items-center space-x-6">
            <a href="/" class="hover:text-[#d5b893] transition">Home</a>
            <a href="/search" class="hover:text-[#d5b893] transition">Search</a>
            <a href="{{ route('about') }}" class="hover:text-[#d5b893] transition">About Us</a>
        </nav>

        <!-- Profile -->
        <a href="{{ route('/profile') }}" 
           class="w-10 h-10 bg-[#d5b893] rounded-full flex items-center justify-center 
                  hover:scale-110 transition duration-300 shadow-md">

            <svg xmlns="http://www.w3.org/2000/svg" 
                class="h-6 w-6 text-[#632024]" 
                viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" 
                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" 
                    clip-rule="evenodd" />
            </svg>

        </a>

    </div>
</div>

</nav>
        </div>
    </header>
    <!-- Content -->
    <div class="p-10">
        <h2 class="text-2xl font-bold mb-6 text-center">About Us</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            
            <div class="bg-white rounded-2xl shadow-md p-6 text-center 
            hover:shadow-xl hover:-translate-y-2 transition duration-300">

    <div class="bg-[#632024] h-32 mb-4 rounded-xl"></div>

    <p class="font-semibold text-lg text-[#632024]">M. Luthfi Causart Azavi</p>
    <p class="text-sm text-gray-600">NIM : 3312501052</p>
    <p class="text-sm text-gray-600">Prodi : Teknik Informatika</p>
    <p class="text-sm text-gray-600">Tugas :</p>
</div>
        <div class="bg-white rounded-2xl shadow-md p-6 text-center 
            hover:shadow-xl hover:-translate-y-2 transition duration-300">

    <div class="bg-[#632024] h-32 mb-4 rounded-xl"></div>

    <p class="font-semibold text-lg text-[#632024]">Muhammad Risky Kurnia</p>
    <p class="text-sm text-gray-600">NIM : 3312501056</p>
    <p class="text-sm text-gray-600">Prodi : Teknik Informatika</p>
    <p class="text-sm text-gray-600">Tugas :</p>
</div>

            <div class="bg-white rounded-2xl shadow-md p-6 text-center 
            hover:shadow-xl hover:-translate-y-2 transition duration-300">

    <div class="bg-[#632024] h-32 mb-4 rounded-xl"></div>

    <p class="font-semibold text-lg text-[#632024]">Siti Halimah Chania</p>
    <p class="text-sm text-gray-600">NIM : 3312501057</p>
    <p class="text-sm text-gray-600">Prodi : Teknik Informatika</p>
    <p class="text-sm text-gray-600">Tugas :</p>
</div>

        <div class="bg-white rounded-2xl shadow-md p-6 text-center 
            hover:shadow-xl hover:-translate-y-2 transition duration-300">

    <div class="bg-[#632024] h-32 mb-4 rounded-xl"></div>

    <p class="font-semibold text-lg text-[#632024]">Zahrah Athirah Badiah</p>
    <p class="text-sm text-gray-600">NIM : 3312501060</p>
    <p class="text-sm text-gray-600">Prodi : Teknik Informatika</p>
    <p class="text-sm text-gray-600">Tugas :</p>
</div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-6 mt-10 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
        <div>Logo Poltek</div>
        <div>Penjelasan singkat aplikasi kami</div>
        <div>Alamat Poltek</div>
        <div>Hubungi kami</div>
    </footer>

</body>
</html>