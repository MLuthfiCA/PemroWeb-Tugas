@extends('app')

@section('content')
<div class="py-10 space-y-12">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 animate-fade-up">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Profil Admin</h1>
            <p class="text-gray-500 mt-2">Kelola informasi perpustakaan dan pantau buku yang sedang dipinjam.</p>
        </div>
    </div>

    <!-- Admin Info Card -->
    <div class="glass-panel p-8 border-white/60 animate-fade-up delay-100 shadow-2xl shadow-red-50 flex flex-col md:flex-row items-center gap-8 border-l-4 border-l-maroon">
        <div class="w-24 h-24 rounded-full bg-maroon text-white flex items-center justify-center text-4xl font-bold shadow-xl shadow-red-100">
            A
        </div>
        <div class="text-center md:text-left flex-1">
            <h2 class="text-2xl font-bold text-gray-800">Admin ReadSpace</h2>
            <p class="text-gray-500 font-medium">admin@polibatam.ac.id</p>
            <div class="mt-4 inline-block px-4 py-1.5 rounded-lg bg-burgundy-50 text-burgundy-600 border border-burgundy-100 text-xs font-bold uppercase tracking-widest">
                Administrator Utama
            </div>
        </div>
        <div class="w-full md:w-auto flex flex-col sm:flex-row gap-3">
            <a href="{{ route('admin.users') }}" class="w-full md:w-auto px-6 py-3 rounded-xl bg-burgundy-500 text-white font-bold hover:bg-maroon transition-colors text-sm text-center shadow-lg shadow-red-100">
                Kelola Pengguna
            </a>
            <a href="{{ route('admin.buku.create') }}" class="w-full md:w-auto px-6 py-3 rounded-xl border-2 border-burgundy-500 text-burgundy-600 font-bold hover:bg-red-50 transition-colors text-sm text-center">
                + Tambah Buku
            </a>
        </div>
    </div>

    <!-- Currently Borrowed -->
    <div class="space-y-6 animate-fade-up delay-200">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-burgundy-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Daftar Peminjaman Aktif
            </h2>
            <span class="px-4 py-1.5 rounded-full bg-red-50 text-burgundy-600 font-bold text-sm">
                Total: {{ count($books ?? []) }} Buku
            </span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($books ?? [] as $b)
            <div class="glass-panel p-6 border-white/60 shadow-lg shadow-red-50 hover:shadow-xl transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold text-gray-800 text-lg line-clamp-1">{{ $b->judul }}</h3>
                        <p class="text-xs text-gray-400 font-medium">{{ $b->penulis }}</p>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-burgundy-500 group-hover:bg-burgundy-500 group-hover:text-white transition-colors cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>
                
                <div class="bg-gray-50/50 rounded-xl p-4 mb-4 border border-white">
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mb-1">Peminjam</p>
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full bg-burgundy-500 text-white flex items-center justify-center text-[10px] font-bold">
                            {{ substr($b->peminjam, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-bold text-gray-700 text-sm">{{ $b->peminjam }}</p>
                            <p class="text-[10px] text-gray-500">{{ $b->nim }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center text-sm border-t border-red-50 pt-4">
                    <div>
                        <p class="text-[10px] text-red-400 font-bold uppercase tracking-wider">Jatuh Tempo</p>
                        <p class="font-bold text-red-600">{{ $b->jatuh_tempo }}</p>
                    </div>
                    <button class="text-xs font-bold text-burgundy-500 hover:text-maroon">
                        Beri Peringatan
                    </button>
                </div>
            </div>
            @empty
            <div class="col-span-full glass-panel p-10 text-center border-white/60">
                <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 text-burgundy-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <p class="text-gray-400 font-medium">Luar biasa! Saat ini tidak ada buku yang berstatus dipinjam (semua telah dikembalikan).</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection