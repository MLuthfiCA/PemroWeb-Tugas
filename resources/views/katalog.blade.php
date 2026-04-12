<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku - ReadSpace Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-50 text-stone-900 font-sans">

    <nav class="bg-red-950 p-4 sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4">
            <a href="#" class="flex items-center space-x-2">
                <span class="text-white text-2xl font-bold">ReadSpace Library</span>
            </a>
            <div class="space-x-8 text-white">
                <a href="#" class="hover:text-amber-200 transition">Home</a>
                <a href="#" class="hover:text-amber-200 transition">Search</a>
                <a href="#" class="font-semibold text-amber-200 transition">About Us</a>
            </div>
            <div class="bg-amber-100 rounded-full w-10 h-10 flex items-center justify-center border border-amber-200 shadow-inner">
                <span class="text-red-950 font-bold">RS</span>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6 md:p-8">
        <div class="flex items-center justify-between mb-10 pb-4 border-b border-stone-200">
            <h1 class="text-4xl font-extrabold text-red-950">Katalog Buku</h1>
            <p class="text-stone-500 text-lg">Pilih dan ajukan pinjaman buku fisikmu.</p>
        </div>
    <form action="/katalog" method="GET" class="mb-8 max-w-md">
    <label for="search" class="mb-2 text-sm font-medium text-stone-900 sr-only">Cari</label>

    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-stone-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" name="query" id="search" class="block w-full p-4 ps-10 text-sm text-stone-900 border border-stone-200 rounded-2xl bg-white focus:ring-red-300 focus:border-red-950" placeholder="Cari judul buku atau penulis..." value="{{ request('query') }}">
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-red-950 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-xl text-sm px-4 py-2">Cari</button>
    </div>
</form>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @forelse($daftarBuku as $buku)
        <div class="bg-white border border-stone-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 {{ $buku['status'] == 'Dipinjam' ? 'opacity-60 bg-stone-50' : '' }}">
            <div class="h-56 {{ $buku['status'] == 'Dipinjam' ? 'bg-stone-200' : 'bg-amber-100' }} rounded-t-3xl flex items-center justify-center p-6 border-b border-stone-100">
                <span class="{{ $buku['status'] == 'Dipinjam' ? 'text-stone-500' : 'text-amber-800' }} text-sm font-medium">Cover Buku</span>
            </div>
            
            <div class="p-6">
                <div class="flex justify-between items-start gap-2 mb-2">
                    <h5 class="text-xl font-bold tracking-tight {{ $buku['status'] == 'Dipinjam' ? 'text-stone-500' : 'text-red-950' }} leading-tight">{{ $buku['judul'] }}</h5>
                    <span class="{{ $buku['status'] == 'Tersedia' ? 'bg-green-100 text-green-900' : 'bg-red-100 text-red-900' }} text-xs font-bold px-3 py-1 rounded-full whitespace-nowrap">
                        {{ $buku['status'] }}
                    </span>
                </div>
                
                <p class="text-sm {{ $buku['status'] == 'Dipinjam' ? 'text-stone-400' : 'text-red-900' }} font-medium mb-5">{{ $buku['penulis'] }}</p>
                
                <div class="space-y-3 mb-6 border-t border-stone-100 pt-5">
                    <p class="text-sm text-stone-700"><strong>Genre:</strong> {{ $buku['genre'] }}</p>
                </div>

                @if($buku['status'] == 'Tersedia')
                    <button class="w-full text-white bg-red-950 hover:bg-red-900 font-semibold rounded-xl text-sm px-5 py-3 transition-all">
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
            <p class="text-stone-500 text-lg">Buku <span class="font-bold text-red-950">"{{ request('query') }}"</span> tidak ditemukan.</p>
        </div>
    @endforelse
</div>
    </main>

    <div id="modal-pinjam" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-3xl shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-stone-100">
                    <h3 class="text-lg font-bold text-red-950">Formulir Pengajuan Pinjaman</h3>
                    <button type="button" class="text-stone-400 bg-transparent hover:bg-red-100 hover:text-red-950 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="modal-pinjam">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                        <span class="sr-only">Tutup modal</span>
                    </button>
                </div>
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="date_pickup" class="block mb-2 text-sm font-medium text-stone-700">Rencana Tanggal Pengambilan</label>
                            <input type="date" name="date_pickup" id="date_pickup" class="bg-stone-50 border border-stone-200 text-stone-900 text-sm rounded-xl focus:ring-red-300 focus:border-red-950 block w-full p-3" required="">
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-red-950 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-semibold rounded-xl text-sm px-5 py-3 transition-all">
                        Kirim Pengajuan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>