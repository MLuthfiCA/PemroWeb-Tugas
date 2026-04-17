<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Perbaikan: Nama class disamakan jadi bg-custom-maroon */
        .bg-custom-maroon { background-color: #632024; }
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
        <a href="{{ route('about') }}" 
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

</nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto py-10 px-4">
        <h2 class="text-3xl font-normal text-center mb-10 text-gray-800">Form Peminjaman Buku</h2>
        
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex-grow">
                <form action="#" method="POST" class="space-y-4">
                    
                    <div>
                        <label class="block text-lg font-medium mb-1">Nama Peminjam</label>
                        <input type="text" placeholder="Masukkan Nama" class="w-full p-2 bg-gray-500 text-white placeholder-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                    </div>

                    <div>
                        <label class="block text-lg font-medium mb-1">NIM</label>
                        <input type="text" placeholder="Masukkan NIM" class="w-full p-2 bg-gray-500 text-white placeholder-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-lg font-medium mb-1">Tanggal Pinjam</label>
                            <input type="date" id="tanggal_pinjam" class="w-full p-2 bg-gray-500 text-white rounded">
                        </div>
                        <div>
                            <label class="block text-lg font-medium mb-1">Tanggal Kembali</label>
                            <input type="date" id="tanggal_kembali" class="w-full p-2 bg-gray-500 text-white rounded">
                        </div>
                    </div>

                    <div>
                        <label class="block text-lg font-medium mb-1">ID Buku</label>
                       <input type="text" value="{{ request('id') }}" placeholder="Masukkan ID Buku" class="w-full p-2 bg-gray-500 text-white placeholder-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                    </div>

                    <div>
                        <label class="block text-lg font-medium mb-1">Judul Buku</label>
                        <<input type="text" value="{{ request('judul') }}" placeholder="Masukkan Judul Buku" class="w-full p-2 bg-gray-500 text-white placeholder-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-custom-maroon text-white px-8 py-2 rounded hover:bg-opacity-90 transition">
                            Pinjam Buku
                        </button>
                    </div>
                </form>
            </div>

            <div class="hidden lg:block w-64 bg-gray-300 rounded-sm shadow-inner"></div>
        </div>
    </main>

    <footer class="bg-[#d5b893] text-white py-10">
        <div class="container mx-auto px-4">
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
<script>
document.getElementById('tanggal_pinjam').addEventListener('change', function() {
    let startDate = new Date(this.value);

    // Tambah 7 hari langsung
    startDate.setDate(startDate.getDate() + 7);

    // Format ke YYYY-MM-DD
    let year = startDate.getFullYear();
    let month = String(startDate.getMonth() + 1).padStart(2, '0');
    let day = String(startDate.getDate()).padStart(2, '0');

    document.getElementById('tanggal_kembali').value = `${year}-${month}-${day}`;
});

</script>
</body>
</html>