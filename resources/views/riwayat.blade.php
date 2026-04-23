@extends('app')

@section('content')
<div class="py-10 space-y-12">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 animate-fade-up">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Profil Saya</h1>
            <p class="text-gray-500 mt-2">Kelola informasi akun dan pantau aktivitas literasi kamu.</p>
        </div>
    </div>

    <!-- User Info Card -->
    <div class="glass-panel p-8 border-white/60 animate-fade-up delay-100 shadow-2xl shadow-red-50 flex flex-col md:flex-row items-center gap-8">
        <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-burgundy-500 to-maroon text-white flex items-center justify-center text-4xl font-bold shadow-xl shadow-red-100">
            {{ substr(Auth::user()->name ?? 'User', 0, 1) }}
        </div>
        <div class="text-center md:text-left flex-1">
            <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->name ?? 'Nama User' }}</h2>
            <p class="text-gray-500 font-medium">{{ Auth::user()->email ?? 'email@student.polibatam.ac.id' }}</p>
            <div class="mt-4 inline-block px-4 py-1.5 rounded-lg bg-burgundy-50 text-burgundy-600 border border-burgundy-100 text-xs font-bold uppercase tracking-widest">
                {{ Auth::user()->role ?? 'Mahasiswa' }}
            </div>
        </div>
        <div class="w-full md:w-auto">
            <button class="w-full px-6 py-3 rounded-xl border-2 border-burgundy-500 text-burgundy-500 font-bold hover:bg-burgundy-500 hover:text-white transition-colors text-sm">
                Edit Profil
            </button>
        </div>
    </div>

    <!-- Currently Borrowed -->
    <div class="space-y-6 animate-fade-up delay-200">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-burgundy-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Sedang Dipinjam
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($peminjaman ?? [] as $p)
            <div class="glass-panel p-6 border-white/60 shadow-lg shadow-red-50 hover:shadow-xl transition-all group border-l-4 border-l-burgundy-500">
                <h3 class="font-bold text-gray-800 text-lg mb-1">{{ $p['judul'] }}</h3>
                <p class="text-xs text-gray-400 font-medium mb-4">ID Buku: {{ $p['id_pengguna'] }}</p>
                
                <div class="flex justify-between items-center text-sm border-t border-red-50 pt-4">
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Tgl Pinjam</p>
                        <p class="font-bold text-gray-700">{{ $p['tanggal_pinjam'] }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-red-400 font-bold uppercase tracking-wider">Batas Kembali</p>
                        <p class="font-bold text-red-600">{{ $p['batas_kembali'] }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full glass-panel p-10 text-center border-white/60">
                <p class="text-gray-400 font-medium">Belum ada buku yang sedang dipinjam.</p>
                <a href="{{ route('katalog') }}" class="inline-block mt-4 text-burgundy-500 font-bold hover:underline">Jelajahi Katalog</a>
            </div>
            @endforelse
        </div>
    </div>

    <!-- History -->
    <div class="space-y-6 animate-fade-up delay-300">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Riwayat Pengembalian
        </h2>
        
        <div class="glass-panel overflow-hidden border border-white/60 shadow-xl shadow-red-50">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-red-50/50 text-gray-400 text-[10px] font-bold uppercase tracking-widest">
                        <tr>
                            <th class="px-8 py-5">Judul Buku</th>
                            <th class="px-8 py-5">ID Pinjam</th>
                            <th class="px-8 py-5 text-right">Tgl Kembali</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-red-50">
                        @forelse($pengembalian ?? [] as $k)
                        <tr class="hover:bg-red-50/30 transition-colors">
                            <td class="px-8 py-6 font-bold text-gray-800">{{ $k['judul'] }}</td>
                            <td class="px-8 py-6 text-sm text-gray-500 font-medium">{{ $k['id_pengguna'] }}</td>
                            <td class="px-8 py-6 text-right">
                                <span class="px-3 py-1.5 rounded-lg bg-green-50 text-green-600 text-[10px] font-bold uppercase tracking-widest border border-green-100">
                                    {{ $k['tanggal_kembali'] }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-8 py-10 text-center text-gray-400 font-medium">Belum ada riwayat pengembalian.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection