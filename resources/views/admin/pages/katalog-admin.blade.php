@extends('admin.layouts.app')

@section('title', 'Katalog Buku Admin')

@section('content')
<div class="py-10 space-y-10">
    
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 animate-fade-up">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Catalog Management</h1>
            <p class="text-gray-500 mt-2">Manage all books available in the Readspace Library.</p>
        </div>
        
        <div>
            <a href="{{ route('admin.buku.create') }}" class="px-6 py-3.5 bg-burgundy-500 text-white rounded-2xl text-sm font-bold shadow-lg shadow-red-100 hover:bg-maroon transition-all transform active:scale-95 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Book
            </a>
        </div>
    </div>

    <!-- Grid View -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($Buku as $index => $buku)
        <div class="glass-panel p-4 flex flex-col group animate-fade-up border-white/60" style="animation-delay: {{ $index * 100 }}ms">
            <div class="relative h-64 rounded-2xl mb-5 overflow-hidden bg-gradient-to-br from-red-50 to-rose-100 flex items-center justify-center border border-white/20">
                <!-- Real Image from images folder -->
                <img src="{{ asset('images/' . ($buku['cover'] ?? 'readspace-library.png')) }}" 
                    class="h-4/5 object-contain shadow-2xl transform group-hover:scale-110 group-hover:rotate-2 transition-transform duration-700"
                    onerror="this.src='{{ asset('images/readspace-library.png') }}'">
                
                <!-- Availability Badge -->
                <div class="absolute top-4 right-4 px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest backdrop-blur-xl {{ $buku['status'] == 'Tersedia' ? 'bg-green-500/10 text-green-600 border border-green-200' : 'bg-red-500/10 text-red-600 border border-red-200' }}">
                    {{ $buku['status'] }}
                </div>

                <!-- Admin Action Overlay -->
                <div class="absolute inset-0 bg-burgundy-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3 backdrop-blur-[2px]">
                    <a href="{{ route('admin.edit_buku', $buku['id']) }}" class="p-3 bg-white rounded-xl text-burgundy-500 shadow-xl hover:scale-110 transition-transform" title="Edit Buku">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.delete', $buku['id']) }}" method="POST" onsubmit="return confirm('Hapus buku ini dari katalog?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-3 bg-white rounded-xl text-red-500 shadow-xl hover:scale-110 transition-transform" title="Hapus Buku">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 12a2 2 0 01-2 2H8a2 2 0 01-2-2L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            
            <h3 class="font-bold text-gray-800 line-clamp-1 mb-1 text-lg group-hover:text-burgundy-500 transition-colors">{{ $buku['judul'] }}</h3>
            <p class="text-xs text-gray-400 mb-6 font-medium">{{ $buku['penulis'] }}</p>
            
            <div class="mt-auto pt-5 border-t border-red-50 flex items-center justify-between">
                <span class="px-2 py-1 rounded bg-white/80 text-[10px] font-bold text-burgundy-500 uppercase tracking-tighter border border-red-100">{{ $buku['genre'] }}</span>
                <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">ID: #00{{ $buku['id'] }}</span>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center">
            <div class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 text-burgundy-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <p class="text-gray-400 font-medium">There are no books in the catalog yet.</p>
        </div>
        @endforelse
    </div>

</div>
@endsection
