@extends('app')

@section('content')
    <div class="py-10">
        <h2 class="text-3xl font-extrabold mb-10 text-center text-[#632024]">About Us</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="bg-white rounded-3xl shadow-sm border border-stone-100 p-8 text-center hover:shadow-2xl hover:-translate-y-2 transition duration-500 group">
                <div class="bg-[#632024] h-40 mb-6 rounded-2xl shadow-inner group-hover:bg-red-900 transition-colors"></div>
                <p class="font-bold text-xl text-[#632024] mb-2">M. Luthfi Causart Azavi</p>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-stone-500">NIM : 3312501052</p>
                    <p class="text-sm font-medium text-stone-500">Prodi : Teknik Informatika</p>
                    <p class="text-sm font-bold text-stone-400 mt-4 uppercase tracking-widest">Tugas : —</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-stone-100 p-8 text-center hover:shadow-2xl hover:-translate-y-2 transition duration-500 group">
                <div class="bg-[#632024] h-40 mb-6 rounded-2xl shadow-inner group-hover:bg-red-900 transition-colors"></div>
                <p class="font-bold text-xl text-[#632024] mb-2">Muhammad Risky Kurnia</p>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-stone-500">NIM : 3312501056</p>
                    <p class="text-sm font-medium text-stone-500">Prodi : Teknik Informatika</p>
                    <p class="text-sm font-bold text-stone-400 mt-4 uppercase tracking-widest">Tugas : —</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-stone-100 p-8 text-center hover:shadow-2xl hover:-translate-y-2 transition duration-500 group">
                <div class="bg-[#632024] h-40 mb-6 rounded-2xl shadow-inner group-hover:bg-red-900 transition-colors"></div>
                <p class="font-bold text-xl text-[#632024] mb-2">Siti Halimah Chania</p>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-stone-500">NIM : 3312501057</p>
                    <p class="text-sm font-medium text-stone-500">Prodi : Teknik Informatika</p>
                    <p class="text-sm font-bold text-stone-400 mt-4 uppercase tracking-widest">Tugas : —</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-stone-100 p-8 text-center hover:shadow-2xl hover:-translate-y-2 transition duration-500 group">
                <div class="bg-[#632024] h-40 mb-6 rounded-2xl shadow-inner group-hover:bg-red-900 transition-colors"></div>
                <p class="font-bold text-xl text-[#632024] mb-2">Zahrah Athirah Badiah</p>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-stone-500">NIM : 3312501060</p>
                    <p class="text-sm font-medium text-stone-500">Prodi : Teknik Informatika</p>
                    <p class="text-sm font-bold text-stone-400 mt-4 uppercase tracking-widest">Tugas : —</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-[#d5b893] text-white py-10 w-full block m-0 border-none outline-none">
        <div class="max-w-7xl mx-auto px-6">
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
    
@endsection