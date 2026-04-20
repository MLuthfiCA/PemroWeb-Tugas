@extends('app')

@section('content')
    <div class="mb-10 pb-4 border-b border-stone-200">
        <h1 class="text-4xl font-extrabold text-red-950">Form Peminjaman Buku</h1>
        <p class="text-stone-500 text-lg mt-1">Lengkapi data di bawah untuk memproses peminjaman buku fisik.</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-12">
        <div class="flex-grow bg-white p-8 rounded-3xl border border-stone-100 shadow-sm">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">Nama Peminjam</label>
                    <input type="text" placeholder="Masukkan Nama Lengkap" 
                        class="w-full p-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-2 focus:ring-[#632024] focus:outline-none transition">
                </div>

                <div>
                    <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">NIM</label>
                    <input type="text" placeholder="Masukkan NIM Mahasiswa" 
                        class="w-full p-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-2 focus:ring-[#632024] focus:outline-none transition">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">Tanggal Pinjam</label>
                        <input type="date" id="tanggal_pinjam" 
                            class="w-full p-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-2 focus:ring-[#632024] focus:outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">Tanggal Kembali</label>
                        <input type="date" id="tanggal_kembali" 
                            class="w-full p-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-2 focus:ring-[#632024] focus:outline-none transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">ID Buku</label>
                        <input type="text" value="{{ request('id') }}" readonly 
                            class="w-full p-4 bg-stone-100 border border-stone-200 rounded-2xl text-stone-600 font-medium cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-red-950 uppercase tracking-wide mb-2">Judul Buku</label>
                        <input type="text" value="{{ request('judul') }}" readonly 
                            class="w-full p-4 bg-stone-100 border border-stone-200 rounded-2xl text-stone-600 font-medium cursor-not-allowed">
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" 
                        class="w-full md:w-auto bg-[#632024] text-white px-12 py-4 rounded-full font-bold text-lg hover:bg-red-900 transition-all shadow-lg transform hover:-translate-y-1">
                        Konfirmasi Peminjaman
                    </button>
                </div>
            </form>
        </div>

        <div class="w-full lg:w-80">
            <div class="bg-amber-100 h-96 rounded-3xl flex items-center justify-center border-2 border-dashed border-amber-200 relative overflow-hidden group">
                <span class="text-amber-800 font-bold uppercase tracking-widest text-center px-4">Pratinjau Cover Buku</span>
                <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>
            <div class="mt-6 p-4 bg-amber-50 rounded-2xl border border-amber-100 text-sm text-amber-900">
                <strong>Informasi:</strong> Masa peminjaman standar adalah 7 hari kerja. Pastikan buku dikembalikan tepat waktu untuk menghindari denda.
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tglPinjam = document.getElementById('tanggal_pinjam');
        const tglKembali = document.getElementById('tanggal_kembali');

        if (tglPinjam && tglKembali) {
            tglPinjam.addEventListener('change', function() {
                // Gunakan 'window.Date' untuk memberi tahu VS Code ini adalah JS global, bukan PHP
                let startDate = new window.Date(this.value);
                
                if(!isNaN(startDate.getTime())) {
                    // Tambah 7 hari otomatis
                    startDate.setDate(startDate.getDate() + 7);
                    
                    // Format ke YYYY-MM-DD
                    let year = startDate.getFullYear();
                    let month = String(startDate.getMonth() + 1).padStart(2, '0');
                    let day = String(startDate.getDate()).padStart(2, '0');
                    
                    tglKembali.value = `${year}-${month}-${day}`;
                }
            });
        }
    });
</script>
@endsection