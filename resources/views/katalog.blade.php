@extends('app')

@section('content')

<div class="flex flex-col md:flex-row md:items-center justify-between mb-10 pb-4 border-b border-stone-200">
    <div>
        <h1 class="text-4xl font-extrabold text-red-950">Katalog Buku</h1>
        <p class="text-stone-500 text-lg mt-1">Pilih dan ajukan pinjaman buku fisikmu.</p>
    </div>

    @if(request('query'))
        <div class="mt-4 md:mt-0 text-sm bg-amber-50 px-4 py-2 rounded-lg border border-amber-100">
            Menampilkan hasil untuk:
            <span class="font-bold text-red-950">"{{ request('query') }}"</span>
            <a href="/katalog" class="ml-2 text-red-700 hover:underline">Hapus Filter</a>
        </div>
    @endif
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

@forelse($daftarBuku as $buku)

<div class="bg-white border border-stone-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 {{ $buku['status'] == 'Dipinjam' ? 'opacity-75 bg-stone-50' : '' }}">

    <div class="h-56 {{ $buku['status'] == 'Dipinjam' ? 'bg-stone-200' : 'bg-amber-100' }} rounded-t-3xl flex items-center justify-center p-6 border-b border-stone-100">
        <span class="{{ $buku['status'] == 'Dipinjam' ? 'text-stone-500' : 'text-amber-800' }} text-sm font-medium uppercase tracking-wider">
            Cover Buku
        </span>
    </div>

    <div class="p-6">
        <div class="flex justify-between items-start gap-2 mb-2">
            <h5 class="text-xl font-bold {{ $buku['status'] == 'Dipinjam' ? 'text-stone-500' : 'text-red-950' }}">
                {{ $buku['judul'] }}
            </h5>

            <span class="{{ $buku['status'] == 'Tersedia' ? 'bg-green-100 text-green-900' : 'bg-red-100 text-red-900' }} text-[10px] font-bold px-3 py-1 rounded-full uppercase">
                {{ $buku['status'] }}
            </span>
        </div>

        <p class="text-sm mb-4 {{ $buku['status'] == 'Dipinjam' ? 'text-stone-400' : 'text-red-900' }}">
            {{ $buku['penulis'] }}
        </p>

        <div class="pt-4 border-t border-stone-100 mb-6">
            <p class="text-xs text-stone-500 uppercase font-bold mb-1">Genre</p>
            <p class="text-sm text-stone-800">{{ $buku['genre'] }}</p>
        </div>

        @if($buku['status'] == 'Tersedia')
            <a href="{{ route('pengajuan', ['judul' => $buku['judul'], 'id' => 'B-' . rand(100, 999)]) }}"
               class="block text-center w-full text-white bg-[#431212] hover:bg-red-900 font-semibold rounded-full text-sm px-5 py-3 shadow-md">
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

@endsection