@extends('admin.layouts.app')

@section('title', 'Katalog Buku Admin')

@section('content')

<main class="max-w-7xl mx-auto p-6 md:p-8">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @forelse($Buku as $buku)

        <div class="bg-white border border-stone-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">

            <!-- COVER -->
            <div class="h-56 bg-amber-100 rounded-t-3xl flex items-center justify-center p-6 border-b border-stone-100">
                @if(isset($buku['cover']))
                    <img src="{{ asset('storage/' . $buku['cover']) }}" class="w-full h-full object-cover">
                @else
                    <span class="text-amber-800 text-sm font-medium uppercase">Cover Buku</span>
                @endif
            </div>

            <!-- CONTENT -->
            <div class="p-6">

                <div class="flex justify-between items-start gap-2 mb-2">
                    <h5 class="text-xl font-bold text-red-950 leading-tight">
                        {{ $buku['judul'] }}
                    </h5>

                    <span class="{{ $buku['status'] == 'Tersedia' ? 'bg-green-100 text-green-900' : 'bg-red-100 text-red-900' }} 
                        text-[10px] font-bold px-3 py-1 rounded-full uppercase">
                        {{ $buku['status'] }}
                    </span>
                </div>

                <p class="text-sm text-red-900 font-medium mb-4">
                    {{ $buku['penulis'] }}
                </p>

                <div class="pt-4 border-t border-stone-100 mb-6">
                    <p class="text-xs text-stone-500 uppercase font-bold mb-1">Genre</p>
                    <p class="text-sm text-stone-800">{{ $buku['genre'] }}</p>
                </div>

                <!-- ACTION -->
                <div class="flex items-center justify-between pt-4 border-t border-stone-100">

                    <span class="text-xs font-bold uppercase tracking-wider text-stone-400">
                        Aksi Admin
                    </span>

                    <div class="flex space-x-3">

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

                        <!-- DELETE -->
                        <form action="{{ route('admin.delete', $buku['id']) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="p-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition shadow-sm"
                                    title="Hapus Buku">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>

                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        @empty
            <div class="col-span-full text-center py-20 text-stone-500">
                Buku tidak ditemukan.
            </div>
        @endforelse

    </div>

</main>

@endsection