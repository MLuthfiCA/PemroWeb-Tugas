@extends('app')

<<<<<<< Updated upstream
@section('content')
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
=======
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
            <div x-show="showSearch" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="max-w-7xl mx-auto px-4 mt-4 pb-2"
             x-cloak>
            
            <form action="/katalog" method="GET" class="max-w-md mx-auto relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-stone-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
>>>>>>> Stashed changes
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

                    <p class="text-sm {{ $buku['status'] == 'Dipinjam' ? 'text-stone-400' : 'text-red-900' }} font-medium mb-4">
                        {{ $buku['penulis'] }}
                    </p>

                    <div class="pt-4 border-t border-stone-100 mb-6">
                        <p class="text-xs text-stone-500 uppercase font-bold mb-1">Genre</p>
                        <p class="text-sm text-stone-800">{{ $buku['genre'] }}</p>
                    </div>

                @if($buku['status'] == 'Tersedia')
                    <a href="{{ route('pengajuan', ['judul' => $buku['judul'], 'id' => 'B-' . rand(100, 999)]) }}"
                    class="block text-center w-full text-white bg-[#431212] hover:bg-red-900 font-semibold rounded-full text-sm px-5 py-3 transition-all shadow-md">
                        Pinjam Buku Fisik
                    </a>
                @else
                    <button disabled
                        class="w-full text-white bg-stone-400 font-semibold rounded-xl text-sm px-5 py-3 cursor-not-allowed">
                        Tidak Tersedia
                    </button>
                @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-stone-50 rounded-3xl border-2 border-dashed border-stone-200">
                <p class="text-stone-500 text-lg">Buku tidak ditemukan.</p>
            </div>
        @endforelse
    </div>

    <div id="modal-pinjam" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-3xl shadow-2xl">
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-stone-100">
                    <h3 class="text-lg font-bold text-red-950">Formulir Pengajuan</h3>
                    <button type="button"
                        class="text-stone-400 bg-transparent hover:bg-red-50 hover:text-red-950 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="modal-pinjam">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <form class="p-4 md:p-5" action="#" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-stone-700">Tanggal Pengambilan</label>
                        <input type="date"
                            class="bg-stone-50 border border-stone-200 text-stone-900 text-sm rounded-xl block w-full p-3"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-red-950 hover:bg-red-900 font-semibold rounded-xl text-sm px-5 py-3 transition-all">Kirim</button>
                </form>
            </div>
        </div>
    </div>
@endsection