<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Readspace Library</title>
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
    <div class="container mx-auto flex justify-between items-center">

    <!-- MENU + PROFILE -->
    <div class="flex items-center gap-6">

        <!-- Menu -->
        <nav class="flex items-center space-x-6">
            <a href="{{ route('katalog') }}" class="hover:text-[#d5b893] transition">Home</a>
            <a href="/search" class="hover:text-[#d5b893] transition">Search</a>
            <a href="{{ route('about') }}" class="hover:text-[#d5b893] transition">About Us</a>
        </nav>

        <!-- Profile -->
        <a href="{{ route('profile') }}" 
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
    <!-- CONTENT -->
    <div class="p-6">
        <h2 class="text-lg font-semibold mb-2">
            Halo, "nama pengguna"
        </h2>
        <p class="mb-6 text-gray-600">
            Berikut riwayat peminjaman buku anda:
        </p>
<main>
    
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
           @forelse($daftarBuku as $buku)
<div class="bg-white border border-stone-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 {{ ($buku->status ?? '') == 'Dipinjam' ? 'opacity-75 bg-stone-50' : '' }}">
    <div class="h-56 {{ ($buku->status ?? '') == 'Dipinjam' ? 'bg-stone-200' : 'bg-amber-100' }} rounded-t-3xl overflow-hidden flex items-center justify-center p-6 border-b border-stone-100">
        @if(!empty($buku->cover))
            <img
    src="{{ asset('images/cover_hujan.jpg' . $buku->cover) }}"
    alt="{{ $buku->judul ?? 'Cover Buku' }}"
    class="w-full h-full object-cover"
>
        @else
            <span class="{{ ($buku->status ?? '') == 'Dipinjam' ? 'text-stone-500' : 'text-amber-800' }} text-sm font-medium uppercase tracking-wider">
                Cover Buku
            </span>
        @endif
    </div>
    <div class="p-6">
        <div class="flex justify-between items-start gap-1 mb-1">
            
            <h5 class="text-xl font-bold tracking-tight {{ ($buku->status ?? '') == 'Dipinjam' ? 'text-stone-500' : 'text-red-950' }} leading-tight">
                {{ $buku->judul ?? 'Hujan' }}
            </h5>

            <span class="{{ ($buku->status ?? '') == 'Tersedia' ? 'bg-green-100 text-green-900' : 'bg-red-100 text-red-900' }} text-[10px] font-bold px-3 py-1 rounded-full uppercase">
                {{ $buku->status ?? 'Tidak Tersedia' }}
            </span>

        </div>
        
        <p class="text-sm {{ ($buku->status ?? '') == 'Dipinjam' ? 'text-stone-400' : 'text-red-900' }} font-medium mb-4">
            {{ $buku->penulis ?? 'Tere Liye' }}
        </p>
        
        <div class="pt-4 border-t border-stone-100 mb-6">
            <p class="text-xs text-stone-500 uppercase font-bold mb-1">Genre</p>
            <p class="text-sm text-stone-800">{{ $buku->genre ?? 'science fiction' }}</p>
        </div>

        @if(($buku->status ?? '') == 'Tersedia')
            <button class="w-full text-white bg-red-950 hover:bg-red-900 font-semibold rounded-xl text-sm px-5 py-3 transition-all shadow-md">
                Pinjam Buku Fisik
            </button>
        @else
            <button disabled class="w-full text-white bg-stone-400 font-semibold rounded-xl text-sm px-5 py-3 cursor-not-allowed">
                Tidak Tersedia
            </button>
        @endif

    </div>
</div>
@empty
        <div class="col-span-full text-center py-20 bg-stone-50 rounded-3xl border-2 border-dashed border-stone-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-stone-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <p class="text-stone-500 text-lg">Buku <span class="font-bold text-red-950">"{{ request('query') }}"</span> tidak ditemukan.</p>
        </div>
    @endforelse
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

</body>
</html>