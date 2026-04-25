@extends('app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-[#632024]">Book Data Search</h1>
            <p class="text-gray-600">Library collection search management</p>
        </div>
        
        <div class="w-full md:w-96">
            <form action="{{ route('admin.search') }}" method="GET" class="relative">
                <input type="text" name="query" placeholder="Search for ID or Title..." 
                    class="w-full pl-5 pr-12 py-3 bg-white border border-gray-200 rounded-2xl focus:ring-2 focus:ring-[#632024] outline-none shadow-sm">
                <button class="absolute right-3 top-2 text-[#632024]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 text-gray-400 text-xs uppercase font-bold tracking-widest">
                <tr>
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Book title</th>
                    <th class="px-6 py-4">Author</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($books as $book)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-mono text-sm">#{{ $book->id }}</td>
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $book->judul }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $book->penulis }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs font-bold">Available</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.katalog.edit', $book->id) }}" class="text-blue-600 hover:underline font-bold text-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
