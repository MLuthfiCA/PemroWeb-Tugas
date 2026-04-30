@extends('user.layouts.app')

@section('title', 'Daftar Item PBL')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-sm border border-gray-200">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Daftar Item Proyek PBL</h1>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Item</th>
                    <th scope="col" class="px-6 py-3">Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $key => $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $key + 1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item['nama'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item['stok'] }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
