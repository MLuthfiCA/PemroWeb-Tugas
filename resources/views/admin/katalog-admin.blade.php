@extends('app')

@section('title', 'Katalog Buku Admin')

@section('content')

<main class="max-w-7xl mx-auto p-8 md:p-6">

    {{-- HEADER --}}
    <div class="mb-10 pb-6 border-b border-gray-200">
        <h1 class="text-4xl font-extrabold text-[#431407]">Katalog Buku</h1>
        <p class="text-gray-500 mt-1">Pilih dan ajukan pinjaman buku fisikmu.</p>
    </div>

    {{-- GRID --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @forelse($Buku as $buku)

        {{-- CARD --}}
        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">

            {{-- COVER --}}
            <div class="h-56 bg-[#FDE68A] flex items-center justify-center border-b">
                
                @if(!empty($buku['cover']))
                    {{-- 🔥 INI BAGIAN AMBIL GAMBAR --}}
                    <img src="{{ asset('images/cover_hujan.jpg') }}" 
                         alt="{{ $buku['judul'] }}"
                         class="h-full w-full object-cover">
                @else
                    <span class="text-sm text-amber-700 font-semibold">COVER BUKU</span>
                @endif

            </div>

            {{-- CONTENT --}}
            <div class="p-5">

                {{-- JUDUL --}}
                <h2 class="text-lg font-bold text-[#431407]">
                    {{ $buku['judul'] }}
                </h2>

                {{-- PENULIS --}}
                <p class="text-sm text-gray-500 mb-3">
                    {{ $buku['penulis'] }}
                </p>

                <hr class="mb-3">

                {{-- GENRE --}}
                <p class="text-xs text-gray-400 uppercase">Genre</p>
                <p class="text-sm font-semibold mb-4">
                    {{ $buku['genre'] }}
                </p>

                <div class="flex justify-between items-center pt-3 border-t">

    <span class="text-[10px] text-gray-400 uppercase font-bold">
        Aksi Admin
    </span>

    <div class="flex space-x-2">

                        <!-- EDIT -->
                        <a href="{{ route('admin.edit', $buku['id']) }}"
                           class="p-2.5 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition shadow-sm"
                           title="Edit Buku">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>

                        </a>

        {{-- DELETE (ICON TONG SAMPAH) --}}
        <form action="{{ route('admin.delete', $buku['id']) }}" 
              method="POST"
              onsubmit="return confirm('Yakin hapus buku ini?')">

            @csrf
            @method('DELETE')

            <button type="submit" 
                    class="p-2 rounded-full hover:bg-red-100 transition"
                    title="Hapus">

                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 text-gray-500 hover:text-red-600" 
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">

                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M19 7l-1 12a2 2 0 01-2 2H8a2 2 0 01-2-2L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16"/>
                </svg>

            </button>

        </form>

    </div>
</div>
            </div>
        </div>

        @empty

        <div class="col-span-full text-center py-20 text-gray-400 italic">
            Belum ada buku yang tersedia.
        </div>

        @endforelse

    </div>

</main>

@endsection