@extends('app')

@section('content')
<div class="py-10 space-y-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 animate-fade-up">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Edit Data Buku</h1>
            <p class="text-gray-500 mt-2">Perbarui informasi buku fisik untuk koleksi ReadSpace Library.</p>
        </div>
        <div>
            <a href="{{ route('admin.katalog') }}" class="px-6 py-3 rounded-xl bg-white text-gray-600 font-bold shadow-sm border border-gray-100 hover:bg-gray-50 transition-all text-sm">
                Batal
            </a>
        </div>
    </div>

    <div class="glass-panel p-8 border-white/60 animate-fade-up delay-100 shadow-2xl shadow-red-50">
        <form action="{{ route('admin.update', $buku['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="md:col-span-2 space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Judul Buku</label>
                        <input type="text" name="judul" value="{{ $buku['judul'] }}" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Penulis</label>
                            <input type="text" name="penulis" value="{{ $buku['penulis'] }}" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">ID Buku (Read Only)</label>
                            <input type="text" value="{{ $buku['id'] }}" readonly class="w-full px-4 py-3 border border-white bg-gray-100/50 rounded-2xl text-gray-500 font-medium text-sm cursor-not-allowed">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Genre</label>
                            <select name="genre" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                                <option value="Drama" {{ $buku['genre'] == 'Drama' ? 'selected' : '' }}>Drama</option>
                                <option value="Fantasi" {{ $buku['genre'] == 'Fantasi' ? 'selected' : '' }}>Fantasi</option>
                                <option value="Self-Dev" {{ $buku['genre'] == 'Self-Dev' ? 'selected' : '' }}>Self-Dev</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Status</label>
                            <select name="status" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                                <option value="Tersedia" {{ $buku['status'] == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Dipinjam" {{ $buku['status'] == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            </select>
                        </div>
                    </div>
                    <div class="pt-6">
                        <button type="submit" class="w-full md:w-auto px-8 py-3.5 rounded-xl bg-burgundy-500 text-white font-bold shadow-lg shadow-red-100 hover:bg-maroon transition-all text-sm">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>

                <div class="w-full flex flex-col space-y-4">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Cover Buku Saat Ini</label>
                    <div class="flex-1 min-h-[300px] bg-red-50/50 border border-white rounded-3xl flex items-center justify-center p-4">
                        @if(isset($buku['cover']))
                            <img src="{{ asset('images/' . $buku['cover']) }}" alt="Cover" class="max-h-full object-contain rounded-xl shadow-md">
                        @else
                            <div class="text-center text-red-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="font-bold text-sm">Tidak ada cover</p>
                            </div>
                        @endif
                    </div>
                    <label for="cover_input" class="cursor-pointer px-4 py-3 bg-white border border-gray-100 rounded-xl text-center hover:bg-gray-50 transition-colors">
                        <input type="file" id="cover_input" class="hidden" accept="image/*">
                        <span class="text-sm font-bold text-gray-600">Ganti Cover Baru</span>
                    </label>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection