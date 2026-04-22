@extends('app')

@section('content')
<div class="py-10">
    <!-- Header -->
    <div class="mb-12 text-center animate-fade-up">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Cari Koleksi Buku</h1>
        <p class="text-gray-500">Temukan referensi terbaik untuk studimu di ReadSpace Library</p>
    </div>

    <!-- Search Bar -->
    <div class="max-w-3xl mx-auto mb-16 animate-fade-up delay-100">
        <form action="{{ route('search') }}" method="GET" class="relative group">
            <input type="text" name="query" placeholder="Cari judul buku, penulis, atau kategori..." 
                class="w-full pl-8 pr-20 py-6 bg-white/70 backdrop-blur-xl border border-white shadow-2xl shadow-red-50 rounded-3xl focus:ring-4 focus:ring-red-100 focus:outline-none transition-all text-lg text-gray-700 placeholder-gray-400">
            <button type="submit" class="absolute right-3 top-3 bg-burgundy-500 text-white p-4 rounded-2xl hover:bg-maroon transition-all shadow-lg shadow-red-200 group-hover:scale-105 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
    </div>

    <!-- Results -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($books as $index => $book)
            <div class="glass-panel p-4 flex flex-col group animate-fade-up border-white/60" style="animation-delay: {{ $index * 100 }}ms">
                <div class="relative h-64 rounded-2xl mb-4 overflow-hidden bg-gradient-to-br from-red-50 to-rose-100 flex items-center justify-center border border-white/20">
                    @if(isset($book->cover))
                        <img src="{{ asset('images/'.$book->cover) }}" class="h-4/5 object-contain shadow-2xl transform group-hover:scale-110 group-hover:rotate-2 transition-transform duration-700" onerror="this.src='{{ asset('images/readspace-library.png') }}'">
                    @else
                        <div class="w-20 h-28 bg-white shadow-2xl rounded-sm flex items-center justify-center text-3xl font-bold text-red-100">
                            {{ substr($book->judul, 0, 1) }}
                        </div>
                    @endif
                </div>
                
                <h3 class="font-bold text-gray-800 line-clamp-1 mb-1">{{ $book->judul }}</h3>
                <p class="text-xs text-gray-400 mb-6 font-medium">{{ $book->penulis }}</p>
                
                <div class="mt-auto">
                    <a href="{{ route('katalog.detail', $book->id) }}" class="block text-center bg-burgundy-500 text-white py-3 rounded-2xl font-bold shadow-lg shadow-red-100 hover:bg-maroon transition-all">Lihat Detail</a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 animate-fade-up">
                <div class="w-24 h-24 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <p class="text-gray-400 font-medium text-xl">Buku yang kamu cari tidak ditemukan 📚</p>
                <p class="text-gray-400 text-sm mt-2">Coba gunakan kata kunci lain seperti judul atau penulis.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection