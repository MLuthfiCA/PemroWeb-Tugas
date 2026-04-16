<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
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
    <main class="max-w-7xl mx-auto p-6 md:p-12 flex-grow">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-normal text-red-950">Data Buku</h1>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col md:flex-row gap-12">
            
            <div class="w-full md:w-2/3 space-y-6">
                <div>
                    <label class="block text-xl font-normal text-red-950 mb-2">Judul Buku</label>
                    <input type="text" name="judul" placeholder="Masukkan Judul Buku" 
                        class="w-full p-3 bg-stone-500 text-white placeholder-stone-300 rounded-lg focus:ring-2 focus:ring-red-300 border-none outline-none font-normal">
                </div>

                <div>
                    <label class="block text-xl font-normal text-red-950 mb-2">ID Buku</label>
                    <input type="text" name="id_buku" placeholder="Masukkan ID Buku" 
                        class="w-full p-3 bg-stone-500 text-white placeholder-stone-300 rounded-lg focus:ring-2 focus:ring-red-300 border-none outline-none font-normal">
                </div>

                <div>
                    <label class="block text-xl font-normal text-red-950 mb-2">Kategori</label>
                    <input type="text" name="kategori" placeholder="Masukkan Kategori" 
                        class="w-full p-3 bg-stone-500 text-white placeholder-stone-300 rounded-lg focus:ring-2 focus:ring-red-300 border-none outline-none font-normal">
                </div>

                <div>
                    <label class="block text-xl font-normal text-red-950 mb-2">Penulis</label>
                    <input type="text" name="penulis" placeholder="Masukkan Penulis" 
                        class="w-full p-3 bg-stone-500 text-white placeholder-stone-300 rounded-lg focus:ring-2 focus:ring-red-300 border-none outline-none font-normal">
                </div>

                <div>
                    <label class="block text-xl font-normal text-red-950 mb-2">Penerbit</label>
                    <input type="text" name="penerbit" placeholder="Masukkan Penerbit" 
                        class="w-full p-3 bg-stone-500 text-white placeholder-stone-300 rounded-lg focus:ring-2 focus:ring-red-300 border-none outline-none font-normal">
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-red-950 text-white px-8 py-3 rounded-xl font-normal hover:bg-red-900 transition shadow-lg">
                        Simpan Data Buku
                    </button>
                </div>
            </div>

            <div class="w-full md:w-1/3 flex flex-col items-center">
                <label for="cover_input" class="cursor-pointer w-full h-[450px] bg-stone-300 border-2 border-dashed border-stone-400 rounded-2xl flex items-center justify-center hover:bg-stone-200 transition-all group relative overflow-hidden">
                    
                    <input type="file" id="cover_input" name="cover" class="hidden" accept="image/*" onchange="previewImage(this)">
                    
                    <div id="image_preview_container" class="absolute inset-0 hidden">
                        <img id="image_preview" src="#" alt="Preview Cover" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                            <p class="text-white text-sm font-normal">Ganti Gambar</p>
                        </div>
                    </div>

                    <div id="placeholder_content" class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-stone-600 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <p class="text-stone-600 font-normal mt-2">Tambah Sampul</p>
                    </div>

                </label>
                <p class="text-sm text-stone-400 mt-4 italic text-center font-light">Klik kotak untuk memilih file gambar</p>
            </div>

        </div>
    </form>
</main>

<script>
    function previewImage(input) {
        const preview = document.getElementById('image_preview');
        const container = document.getElementById('image_preview_container');
        const placeholder = document.getElementById('placeholder_content');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                container.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

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
