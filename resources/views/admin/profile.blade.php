@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Halo, Admin!</h1>
        <p class="text-gray-600">Berikut daftar buku yang sedang dipinjam</p>
    </div>
   <div class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse($books as $book)
        <div class="bg-white border border-gray-100 rounded-3xl shadow-md hover:shadow-lg transition overflow-hidden">
            <div class="h-56 {{ ($book->status ?? '') == 'Dipinjam' ? 'bg-stone-200' : 'bg-amber-100' }} rounded-t-3xl overflow-hidden flex items-center justify-center p-6 border-b border-stone-100">
                @if(!empty($book->cover))
                    <img
                        src="{{ asset('storage/'.$book->cover) }}"
                        alt="{{ $book->judul ?? 'Cover Buku' }}"
                        class="w-full h-full object-cover"
                    >
                @else
                    <span class="text-sm font-medium uppercase tracking-wider text-stone-500">
                        Cover Buku
                    </span>
                @endif
            </div>

            <!-- Header dengan Peminjam -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-4 py-3 text-white">
                <p class="text-xs uppercase tracking-wider font-semibold opacity-90">Peminjam</p>
                <p class="text-xl font-bold">{{ $book->peminjam ?? 'N/A' }}</p>
            </div>

            <!-- Content -->
            <div class="p-4">
                <div class="mb-3">
                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">👤 Peminjam</p>
                    <p class="font-semibold text-gray-800 text-sm">{{ $book->peminjam ?? 'N/A' }}</p>
                    <p class="text-xs text-gray-500 mt-1">NIM: <span class="font-mono font-bold">{{ $book->nim ?? 'N/A' }}</span></p>
                </div>

                <div class="mb-3">
                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Judul Buku</p>
                    <p class="font-semibold text-gray-800 text-sm">{{ $book->judul }}</p>
                </div>

                <div class="mb-3">
                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Penulis</p>
                    <p class="text-xs text-gray-600">{{ $book->penulis }}</p>
                </div>

                <!-- Alert Jatuh Tempo -->
                <div class="bg-red-50 border-l-4 border-red-500 rounded px-3 py-2 mb-3">
                    <p class="text-xs text-red-600 uppercase font-bold tracking-wider mb-1">⏰ Jatuh Tempo</p>
                    <p class="text-sm font-bold text-red-600">{{ $book->jatuh_tempo }}</p>
                </div>
            </div>

            <!-- Footer Status -->
            <div class="bg-gray-50 px-4 py-2 border-t border-gray-100 flex justify-between items-center">
                <span class="bg-blue-50 text-blue-600 text-xs font-bold px-2 py-1 rounded-full">Dipinjam</span>
                <button class="text-xs text-blue-600 hover:text-blue-800 font-semibold">Kembali →</button>
            </div>
        </div>
    @empty
        <div class="col-span-full py-12 text-center text-gray-400">
            <p class="text-lg">📚 Belum ada buku yang dipinjam</p>
        </div>
    @endforelse

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

</div>
@endsection