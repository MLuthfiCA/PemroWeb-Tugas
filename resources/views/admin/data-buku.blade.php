@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Manajemen Data User</h1>
            <p class="text-stone-500 mt-1">Kelola akses dan peran anggota perpustakaan Readspace.</p>
        </div>
        <button class="bg-[#632824] text-white px-8 py-3 rounded-2xl font-bold shadow-lg shadow-red-900/20 hover:bg-[#4d1f1c] hover:-translate-y-1 transition-all duration-300">
            + Tambah User Baru
        </button>
    </div>

    {{-- User Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($users as $user)
            <div class="group bg-white rounded-[2rem] shadow-sm border border-stone-100 p-8 hover:shadow-2xl hover:border-amber-200/50 transition-all duration-500">
                <div class="flex items-center gap-5 mb-6">
                    {{-- Avatar dengan Inisial --}}
                    <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center text-[#632824] font-black text-2xl group-hover:scale-110 transition-transform duration-500">
                        {{ substr($user['name'], 0, 1) }}
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-900 group-hover:text-[#632824] transition-colors">{{ $user['name'] }}</h3>
                        <span class="inline-block px-3 py-1 bg-stone-100 text-stone-600 rounded-lg text-xs font-bold uppercase tracking-widest mt-1">
                            {{ $user['role'] }}
                        </span>
                    </div>
                </div>
                
                <div class="space-y-3 mb-8">
                    <div class="flex items-center text-gray-600">
                        <svg class="w-4 h-4 mr-3 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span class="text-sm font-medium">{{ $user['email'] }}</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 rounded-full mr-3 {{ $user['status'] == 'Aktif' ? 'bg-green-500' : 'bg-red-500' }}"></div>
                        <span class="text-sm font-bold {{ $user['status'] == 'Aktif' ? 'text-green-700' : 'text-red-700' }}">
                            User {{ $user['status'] }}
                        </span>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex gap-3">
                    <button class="flex-[2] bg-stone-100 text-stone-700 py-3 rounded-xl hover:bg-stone-200 transition font-bold text-sm">
                        Edit Profil
                    </button>
                    <button class="flex-1 bg-red-50 text-red-600 py-3 rounded-xl hover:bg-red-100 transition font-bold text-sm">
                        Hapus
                    </button>
                </div>
            </div>
        @empty
            {{-- Empty State --}}
            <div class="col-span-full flex flex-col items-center justify-center py-24 bg-stone-50 rounded-[3rem] border-2 border-dashed border-stone-200">
                <div class="w-20 h-20 bg-stone-200 rounded-full mb-4 flex items-center justify-center text-stone-400">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h2 class="text-xl font-bold text-stone-600">Belum ada data user</h2>
                <p class="text-stone-400">Data mahasiswa atau admin akan muncul di sini.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection