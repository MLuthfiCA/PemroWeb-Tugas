<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadSpace Library</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        .bg-custom-maroon { background-color: #632024; }
        body {
        overflow-x: hidden;
        margin: 0;
        padding: 0;
    }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen font-sans">

    @include('layouts.navbar')

    <main class="flex-grow w-full max-w-7xl mx-auto p-6 md:p-8">
        @yield('content')
    </main>

   <footer class="bg-[#d5b893] text-white pt-12 pb-6 mt-10">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

            {{-- LOGO --}}
            <div>
                <img src="{{ asset('images/readspace-library.png') }}" 
                     alt="Logo Readspace" 
                     class="h-16 mb-4">
                <p class="text-sm text-white/80 leading-relaxed">
                    Platform perpustakaan digital untuk memudahkan mahasiswa dalam mencari dan meminjam buku secara efisien.
                </p>
            </div>

            {{-- ABOUT --}}
            <div>
                <h4 class="font-semibold text-lg mb-3">Readspace</h4>
                <ul class="space-y-2 text-sm text-white/80">
                    <li><a href="#" class="hover:text-[#d5b893] transition">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-[#d5b893] transition">Katalog Buku</a></li>
                    <li><a href="#" class="hover:text-[#d5b893] transition">Kontak</a></li>
                </ul>
            </div>

            {{-- ADDRESS --}}
            <div>
                <h4 class="font-semibold text-lg mb-3">Alamat</h4>
                <p class="text-sm text-white/80 leading-relaxed">
                    Politeknik Negeri Batam <br>
                    Jl. Ahmad Yani, Batam Kota <br>
                    Kepulauan Riau, Indonesia
                </p>
            </div>

            {{-- SOCIAL MEDIA --}}
            <div>
                <h4 class="font-semibold text-lg mb-3">Follow Us</h4>

                <div class="flex space-x-4 mt-3">

                    {{-- Instagram --}}
                    <a href="#" class="p-2 bg-white/10 rounded-full hover:bg-[#d5b893] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.75 2C4.678 2 2 4.678 2 7.75v8.5C2 19.322 4.678 22 7.75 22h8.5C19.322 22 22 19.322 22 16.25v-8.5C22 4.678 19.322 2 16.25 2h-8.5zm0 2h8.5C18.216 4 20 5.784 20 7.75v8.5c0 1.966-1.784 3.75-3.75 3.75h-8.5C5.784 20 4 18.216 4 16.25v-8.5C4 5.784 5.784 4 7.75 4zm8.25 1a1 1 0 100 2 1 1 0 000-2zM12 7a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6z"/>
                        </svg>
                    </a>

                    {{-- Facebook --}}
                    <a href="#" class="p-2 bg-white/10 rounded-full hover:bg-[#d5b893] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12a10 10 0 10-11.563 9.875v-6.987H8.078V12h2.359V9.797c0-2.325 1.392-3.607 3.523-3.607.997 0 2.04.178 2.04.178v2.245h-1.149c-1.133 0-1.486.704-1.486 1.426V12h2.527l-.404 2.888h-2.123v6.987A10.002 10.002 0 0022 12z"/>
                        </svg>
                    </a>

                    {{-- Twitter/X --}}
                    <a href="#" class="p-2 bg-white/10 rounded-full hover:bg-[#d5b893] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2H21l-6.56 7.49L22 22h-6.828l-5.35-6.993L3.64 22H1l7.02-8.01L2 2h6.828l4.86 6.36L18.244 2zm-2.396 18h1.885L7.103 4H5.07l10.778 16z"/>
                        </svg>
                    </a>

                    {{-- Email --}}
                    <a href="#" class="p-2 bg-white/10 rounded-full hover:bg-[#d5b893] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 12H8m8 0l-4 4m4-4l-4-4m8 8V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12"/>
                        </svg>
                    </a>

                </div>
            </div>

        </div>

        {{-- COPYRIGHT --}}
        <div class="border-t border-white/20 mt-10 pt-6 text-center text-sm text-white/60">
            © {{ date('Y') }} Readspace Library. All rights reserved.
        </div>

    </div>
</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>