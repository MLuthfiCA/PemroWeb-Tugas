@extends('app')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 pb-4 border-b border-stone-200">
        <div>
            <h1 class="text-4xl font-extrabold text-red-950">Katalog Buku</h1>
            <p class="text-stone-500 text-lg mt-1">Pilih dan ajukan pinjaman buku fisikmu.</p>
        </div>
        @if(request('query'))
            <div class="mt-4 md:mt-0 text-sm bg-amber-50 px-4 py-2 rounded-lg border border-amber-100">
                Menampilkan hasil untuk: <span class="font-bold text-red-950">"{{ request('query') }}"</span>
                <a href="/katalog" class="ml-2 text-red-700 hover:underline">Hapus Filter</a>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($daftarBuku as $buku)
            <div
                class="bg-white border border-stone-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 {{ $buku['status'] == 'Dipinjam' ? 'opacity-75 bg-stone-50' : '' }}">
                <div
                    class="h-56 {{ $buku['status'] == 'Dipinjam' ? 'bg-stone-200' : 'bg-amber-100' }} rounded-t-3xl flex items-center justify-center p-6 border-b border-stone-100">
                    <span
                        class="{{ $buku['status'] == 'Dipinjam' ? 'text-stone-500' : 'text-amber-800' }} text-sm font-medium uppercase tracking-wider">Cover
                        Buku</span>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-start gap-2 mb-2">
                        <h5
                            class="text-xl font-bold tracking-tight {{ $buku['status'] == 'Dipinjam' ? 'text-stone-500' : 'text-red-950' }} leading-tight">
                            {{ $buku['judul'] }}
                        </h5>
                        <span
                            class="{{ $buku['status'] == 'Tersedia' ? 'bg-green-100 text-green-900' : 'bg-red-100 text-red-900' }} text-[10px] font-bold px-3 py-1 rounded-full whitespace-nowrap uppercase">
                            {{ $buku['status'] }}
                        </span>
                    </div>

                    <p class="text-sm {{ $buku['status'] == 'Dipinjam' ? 'text-stone-400' : 'text-red-900' }} font-medium mb-4">
                        {{ $buku['penulis'] }}
                    </p>

                    <div class="pt-4 border-t border-stone-100 mb-6">
                        <p class="text-xs text-stone-500 uppercase font-bold mb-1">Genre</p>
                        <p class="text-sm text-stone-800">{{ $buku['genre'] }}</p>
                    </div>

                @if($buku['status'] == 'Tersedia')
                    <a href="{{ route('pengajuan', ['judul' => $buku['judul'], 'id' => 'B-' . rand(100, 999)]) }}" 
                    class="block text-center w-full text-white bg-[#431212] ...">
                        Pinjam Buku Fisik
                    </a>
                @else
                    <button disabled
                        class="w-full text-white bg-stone-400 font-semibold rounded-xl text-sm px-5 py-3 cursor-not-allowed">
                        Tidak Tersedia
                    </button>
                @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-stone-50 rounded-3xl border-2 border-dashed border-stone-200">
                <p class="text-stone-500 text-lg">Buku tidak ditemukan.</p>
            </div>
        @endforelse
    </div>

    <footer class="bg-[#d5b893] text-white py-10 mt-20 relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] w-screen">
        <div class="container mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left items-center">

                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset('images/readspace-library.png') }}" alt="Logo" class="h-16 w-auto object-contain">
                </div>

                <div>
                    <h6 class="font-bold mb-2 text-stone-900">Readspace Library</h6>
                    <p class="text-sm text-stone-800 leading-relaxed">
                        Platform perpustakaan digital untuk memudahkan mahasiswa.
                    </p>
                </div>

                <div>
                    <h6 class="font-bold mb-2 text-stone-900">Politeknik Negeri Batam</h6>
                    <p class="text-sm text-stone-800">
                        Jl. Ahmad Yani, Batam Kota, Batam.
                    </p>
                </div>

                <div>
                    <h6 class="font-bold mb-2 text-stone-900">Hubungi Kami</h6>
                    <p class="text-sm text-stone-800">
                        Email: readspacelibrary@poltek.ac.id
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <div id="modal-pinjam" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-3xl shadow-2xl">
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-stone-100">
                    <h3 class="text-lg font-bold text-red-950">Formulir Pengajuan</h3>
                    <button type="button"
                        class="text-stone-400 bg-transparent hover:bg-red-50 hover:text-red-950 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="modal-pinjam">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <form class="p-4 md:p-5" action="#" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-stone-700">Tanggal Pengambilan</label>
                        <input type="date"
                            class="bg-stone-50 border border-stone-200 text-stone-900 text-sm rounded-xl block w-full p-3"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-red-950 hover:bg-red-900 font-semibold rounded-xl text-sm px-5 py-3 transition-all">Kirim</button>
                </form>
            </div>
        </div>
    </div>
@endsection