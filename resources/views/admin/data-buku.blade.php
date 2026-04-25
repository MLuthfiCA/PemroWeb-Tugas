@extends('app')

@section('content')
<div class="py-10 space-y-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 animate-fade-up">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Add Book</h1>
            <p class="text-gray-500 mt-2">Add new book collections to the library.</p>
        </div>
        <div>
            <a href="{{ route('admin.katalog') }}" class="px-6 py-3 rounded-xl bg-white text-gray-600 font-bold shadow-sm border border-gray-100 hover:bg-gray-50 transition-all text-sm">
                Return to Catalog
            </a>
        </div>
    </div>

    <div class="glass-panel p-8 border-white/60 animate-fade-up delay-100 shadow-2xl shadow-red-50">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="md:col-span-2 space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Book title</label>
                        <input type="text" placeholder="Enter the Book Title" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Author</label>
                            <input type="text" placeholder="Author Name" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Publisher</label>
                            <input type="text" placeholder="Publisher Name" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Genre</label>
                            <select class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                                <option>Drama</option>
                                <option>Fantasy</option>
                                <option>Self-Dev</option>
                                <option>Romance</option>
                                <option>Education</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Status</label>
                            <select class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                                <option>Available</option>
                                <option>Borrowed</option>
                            </select>
                        </div>
                    </div>
                    <div class="pt-6">
                        <button type="button" class="w-full md:w-auto px-8 py-3.5 rounded-xl bg-burgundy-500 text-white font-bold shadow-lg shadow-red-100 hover:bg-maroon transition-all text-sm">
                            Save Book Data
                        </button>
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Book Cover</label>
                    <label for="cover_input" class="cursor-pointer flex-1 min-h-[300px] border-2 border-dashed border-gray-300 bg-white/50 rounded-3xl flex flex-col items-center justify-center hover:bg-gray-50 hover:border-red-200 transition-all group relative overflow-hidden">
                        <input type="file" id="cover_input" class="hidden" accept="image/*">
                        <div class="text-center group-hover:scale-105 transition-transform">
                            <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 text-burgundy-500 group-hover:bg-red-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                            </div>
                            <p class="text-sm font-bold text-gray-500 group-hover:text-burgundy-500 transition-colors">Upload Cover</p>
                            <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider">JPG, PNG max 2MB</p>
                        </div>
                    </label>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
