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

    <footer class="bg-[#d5b893] text-white py-10 w-full mt-auto">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left items-center">
                
                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset('images/readspace-library.png') }}" alt="Logo" class="h-24 w-auto object-contain">
                </div>

                <div>
                    <h6 class="font-bold mb-2 text-white">Readspace Library</h6>
                    <p class="text-sm text-gray-100 leading-relaxed">
                        Readspace Library adalah platform perpustakaan digital untuk memudahkan mahasiswa dalam peminjaman buku.
                    </p>
                </div>

                <div>
                    <h6 class="font-bold mb-2 text-white">Politeknik Negeri Batam</h6>
                    <p class="text-sm text-gray-100">
                        Jl. Ahmad Yani, Batam Kota, Batam, Kepulauan Riau.
                    </p>
                </div>

                <div>
                    <h6 class="font-bold mb-2 text-white">Hubungi Kami</h6>
                    <p class="text-sm text-gray-100">
                        Email: readspacelibrary@poltek.ac.id
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>