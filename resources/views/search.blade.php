@extends('app')

@section('content')
<div class="py-8">
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-extrabold text-[#632024] mb-4">Cari Koleksi Buku</h1>
        <p class="text-stone-500 text-lg">Temukan buku favoritmu di ReadSpace Library</p>
    </div>

    <div class="max-w-3xl mx-auto mb-16">
        <form action="{{ route('search') }}" method="GET" class="relative">
            <input type="text" name="query" placeholder="Cari judul buku, penulis, atau kategori..." 
                class="w-full pl-6 pr-16 py-5 bg-white border-2 border-stone-100 shadow-xl rounded-full focus:ring-2 focus:ring-[#632024] focus:outline-none transition-all text-lg">
            <button type="submit" class="absolute right-3 top-2.5 bg-[#632024] text-white p-3 rounded-full hover:bg-red-900 transition shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($books as $book)
            <div class="bg-white rounded-3xl shadow-sm border border-stone-100 overflow-hidden hover:shadow-2xl transition duration-500">
                <div class="h-64 bg-amber-50 flex items-center justify-center p-4">
                    <img src="{{ asset('storage/'.$book->cover) }}" class="h-full object-contain shadow-lg rounded-md">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-xl text-gray-900 mb-1">{{ $book->judul }}</h3>
                    <p class="text-sm text-stone-500 mb-4">{{ $book->penulis }}</p>
                    <a href="{{ route('katalog.detail', $book->id) }}" class="block text-center bg-[#632024] text-white py-3 rounded-xl font-bold hover:bg-red-900 transition">Lihat Detail</a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 text-stone-400">
                <p class="text-xl">Sorry, buku yang kamu cari tidak ditemukan 📚</p>
            </div>
        @endforelse
    </div>
</div>
@endsection