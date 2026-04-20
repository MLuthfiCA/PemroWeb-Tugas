@extends('app') {{-- Pastikan mengarah ke layout yang ada Tailwind-nya --}}

@section('content')
    {{-- Header Halaman --}}
    <div class="mb-10 pb-4 border-b border-stone-200">
        <h1 class="text-4xl font-extrabold text-red-950">Edit Detail Katalog</h1>
        <p class="text-stone-Stone-500 text-lg mt-1">Perbarui informasi buku fisik untuk koleksi ReadSpace Library.</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-12">
        {{-- Sisi Kiri: Form Pengeditan --}}
        <div class="flex-grow bg-white p-8 rounded-3xl border border-stone-100 shadow-sm">
            <form action="{{ route('admin.update', $buku['id']) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') {{-- Penting untuk proses update di Laravel --}}

                <div>
                    <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">Judul Buku</label>
                    <input type="text" name="judul" value="{{ $buku['judul'] }}" 
                        class="w-full p-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-2 focus:ring-[#632024] focus:outline-none transition font-medium">
                </div>

                <div>
                    <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">Penulis / Author</label>
                    <input type="text" name="penulis" value="{{ $buku['penulis'] }}" 
                        class="w-full p-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-2 focus:ring-[#632024] focus:outline-none transition font-medium">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">Genre</label>
                        <select name="genre" class="w-full p-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-2 focus:ring-[#632024] focus:outline-none transition font-medium appearance-none">
                            <option value="Drama" {{ $buku['genre'] == 'Drama' ? 'selected' : '' }}>Drama</option>
                            <option value="Fantasi" {{ $buku['genre'] == 'Fantasi' ? 'selected' : '' }}>Fantasi</option>
                            <option value="Self-Dev" {{ $buku['genre'] == 'Self-Dev' ? 'selected' : '' }}>Self-Dev</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">Status Ketersediaan</label>
                        <select name="status" class="w-full p-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-2 focus:ring-[#632024] focus:outline-none transition font-medium appearance-none">
                            <option value="Tersedia" {{ $buku['status'] == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Dipinjam" {{ $buku['status'] == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-stone-100">
                    <div>
                        <label class="block text-sm font-bold text-stone-400 uppercase tracking-wide mb-2">ID Buku (Read Only)</label>
                        <input type="text" value="{{ $buku['id'] }}" readonly 
                            class="w-full p-4 bg-stone-100 border border-stone-200 rounded-2xl text-stone-500 font-medium cursor-not-allowed">
                    </div>
                </div>

                <div class="pt-6 flex flex-col md:flex-row gap-4">
                    <button type="submit" 
                        class="bg-[#632024] text-white px-12 py-4 rounded-full font-bold text-lg hover:bg-red-900 transition-all shadow-lg transform hover:-translate-y-1">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.katalog') }}" 
                        class="px-12 py-4 rounded-full font-bold text-lg text-stone-500 hover:bg-stone-100 transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>

        {{-- Sisi Kanan: Preview & Info --}}
        <div class="w-full lg:w-80 space-y-6">
            <div class="bg-amber-100 h-96 rounded-3xl flex items-center justify-center border-2 border-dashed border-amber-200 relative overflow-hidden group">
                <span class="text-amber-800 font-black uppercase tracking-[0.2em] text-center px-4 leading-relaxed">
                    Pratinjau<br>Cover Buku
                </span>
                <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>
            
            <div class="p-6 bg-amber-50 rounded-2xl border border-amber-100 text-sm text-amber-900 leading-relaxed shadow-sm">
                <div class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>
                        <strong>Informasi Admin:</strong> Perubahan data akan langsung diterapkan pada katalog yang dilihat oleh mahasiswa. Harap teliti sebelum menyimpan.
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection