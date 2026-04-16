<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku - ReadSpace Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

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


        <div x-show="showSearch" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4" class="max-w-7xl mx-auto px-4 mt-4 pb-2" x-cloak>
            <form action="/katalog" method="GET" class="max-w-md mx-auto relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-stone-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" name="query" id="search"
                    class="block w-full p-3 ps-10 text-sm text-stone-900 border border-stone-200 rounded-2xl bg-white focus:ring-red-300 focus:border-red-950 shadow-sm"
                    placeholder="Cari judul buku atau penulis..." value="{{ request('query') }}">
                <button type="submit"
                    class="text-white absolute end-2 bottom-1.5 bg-red-950 hover:bg-red-900 font-medium rounded-xl text-xs px-4 py-1.5 transition-colors">
                    Cari
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6 md:p-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 pb-4 border-b border-stone-200">
            <div>
                <h1 class="text-4xl font-extrabold text-red-950">Katalog Buku</h1>
                <p class="text-stone-500 text-lg mt-1">Pilih dan ajukan pinjaman buku fisikmu.</p>
            </div>
            @if(request('query'))
                <div class="mt-4 md:mt-0 text-sm bg-amber-50 px-4 py-2 rounded-lg border border-amber-100">
                    Menampilkan hasil untuk: <span class="font-bold text-red-950">"{{ request('query') }}"</span>
                    <a href="/katalog" class="ml-2 text-red-700 hover:underline">Hapus Filter</a>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($daftarBuku as $buku)
                <div
                    class="bg-white border border-stone-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 {{ $buku['status'] == 'Dipinjam' ? 'opacity-75 bg-stone-50' : '' }}">
                    <div
                        class="h-56 {{ $buku['status'] == 'Dipinjam' ? 'bg-stone-200' : 'bg-amber-100' }} rounded-t-3xl flex items-center justify-center p-6 border-b border-stone-100">
                        <span
                            class="{{ $buku['status'] == 'Dipinjam' ? 'text-stone-500' : 'text-amber-800' }} text-sm font-medium uppercase tracking-wider">Cover
                            Buku</span>
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start gap-2 mb-2">
                            <h5
                                class="text-xl font-bold tracking-tight {{ $buku['status'] == 'Dipinjam' ? 'text-stone-500' : 'text-red-950' }} leading-tight">
                                {{ $buku['judul'] }}
                            </h5>
                            <span
                                class="{{ $buku['status'] == 'Tersedia' ? 'bg-green-100 text-green-900' : 'bg-red-100 text-red-900' }} text-[10px] font-bold px-3 py-1 rounded-full whitespace-nowrap uppercase">
                                {{ $buku['status'] }}
                            </span>
                        </div>

                        <p
                            class="text-sm {{ $buku['status'] == 'Dipinjam' ? 'text-stone-400' : 'text-red-900' }} font-medium mb-4">
                            {{ $buku['penulis'] }}
                        </p>

                        <div class="pt-4 border-t border-stone-100 mb-6">
                            <p class="text-xs text-stone-500 uppercase font-bold mb-1">Genre</p>
                            <p class="text-sm text-stone-800">{{ $buku['genre'] }}</p>
                        </div>

                        <div class="pt-4 border-t border-stone-100 mb-6">
                            <p class="text-xs text-stone-500 uppercase font-bold mb-1">Genre</p>
                            <p class="text-sm text-stone-800">{{ $buku['genre'] }}</p>
                        </div>

                        <div class="flex justify-end space-x-2 mb-4">
                            <a href="/katalog/{{ $loop->index }}/edit" class="p-2 text-stone-400 hover:text-blue-600 transition-colors" title="Edit Buku">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
    
                            <button type="button" class="p-2 text-stone-400 hover:text-red-600 transition-colors" title="Hapus Buku" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>

                        @if($buku['status'] == 'Tersedia')
                            <button data-modal-target="modal-pinjam" data-modal-toggle="modal-pinjam"
                                class="w-full text-white bg-red-950 hover:bg-red-900 font-semibold rounded-xl text-sm px-5 py-3 transition-all shadow-md">
                                Pinjam Buku Fisik
                            </button>
                        @else
                            <button disabled
                                class="w-full text-white bg-stone-400 font-semibold rounded-xl text-sm px-5 py-3 cursor-not-allowed">
                                Tidak Tersedia
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full text-center py-20 bg-stone-50 rounded-3xl border-2 border-dashed border-stone-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-stone-300 mb-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <p class="text-stone-500 text-lg">Buku <span
                            class="font-bold text-red-950">"{{ request('query') }}"</span> tidak ditemukan.</p>
                </div>
            @endforelse
        </div>
    </main>

    <div id="modal-pinjam" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-3xl shadow-2xl">
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-stone-100">
                    <h3 class="text-lg font-bold text-red-950">Formulir Pengajuan Pinjaman</h3>
                    <button type="button"
                        class="text-stone-400 bg-transparent hover:bg-red-50 hover:text-red-950 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="modal-pinjam">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <form class="p-4 md:p-5" action="#" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="date_pickup" class="block mb-2 text-sm font-medium text-stone-700">Rencana Tanggal
                            Pengambilan</label>
                        <input type="date" name="date_pickup" id="date_pickup"
                            class="bg-stone-50 border border-stone-200 text-stone-900 text-sm rounded-xl focus:ring-red-300 focus:border-red-950 block w-full p-3"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-red-950 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-semibold rounded-xl text-sm px-5 py-3 transition-all">
                        Kirim Pengajuan
                    </button>
                </form>
            </div>
        </div>
    </div>

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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</body>

</html>