<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Perbaikan: Nama class disamakan jadi bg-custom-maroon */
        .bg-custom-maroon {
            background-color: #632024;
        }
    </style>
</head>

<body class="bg-white flex flex-col min-h-screen font-sans">
    <header class="bg-custom-maroon text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">

            <div class="flex items-center">
                <img src="{{ asset('images/logo.rsl.2.png') }}" alt="Logo" class="w-20 h-20 object-contain">
                <span class="ml-3 text-xl font-semibold">ReadSpace Library</span>
            </div>

            <nav class="flex justify-between items-center px-8 py-4 bg-[#632024] text-white shadow-lg">
                <!-- Menu -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('katalog') }}" class="hover:text-[#d5b893] transition">Home</a>
                    <a href="/search" class="hover:text-[#d5b893] transition">Search</a>
                    <a href="{{ route('about') }}" class="hover:text-[#d5b893] transition">About Us</a>
                </div>

                <!-- Profile Icon -->

                <!-- Profile -->
                <div class="ml-6">
                    <a href="{{ route('profile') }}" class="w-10 h-10 bg-[#d5b893] rounded-full flex items-center justify-center 
                hover:scale-110 transition duration-300 shadow-md">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#632024]" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>


                    </a>

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

<footer class="bg-[#d5b893] text-white py-10 w-full block m-0 border-none outline-none">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
                
                <div class="flex justify-center md:justify-start items-center">
                    <img src="{{ asset('images/readspace-library.png') }}" alt="Logo Readspace" class="h-20 w-auto object-contain">
                </div>

                <div>
                    <h6 class="font-bold mb-2">Readspace Library</h6>
                    <p class="text-sm text-gray-100 leading-relaxed">
                        Readspace Library adalah platform perpustakaan digital yang kami rancang untuk memudahkan mahasiswa dalam peminjaman buku serta memudahkan sistem perpustakan.
                    </p>
                </div>

                <div>
                    <h6 class="font-bold mb-2">Politeknik Negeri Batam</h6>
                    <p class="text-sm text-gray-100">
                        Jl. Ahmad Yani, Batam Kota, Kota Batam, Kepulauan Riau, Indonesia.
                    </p>
                </div>

                <div>
                    <h6 class="font-bold mb-2">Hubungi Kami</h6>
                    <p class="text-sm text-gray-100">
                        Email: readspacelibrary@poltek.ac.id<br>
                        Telp: (021) 673528
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>