<style>
    .bg-custom-maroon { background-color: #632024; }
</style>

<header class="bg-custom-maroon text-white py-6 px-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">

        <div class="flex items-center gap-4">
            <img src="{{ asset('images/logo.rsl.2.png') }}" alt="Logo" class="h-14 w-auto object-contain scale-110">
            <span class="text-2xl font-bold tracking-tight">ReadSpace Admin</span>
        </div>

        <div class="flex items-center space-x-8" x-data="{ profileOpen: false, menuOpen: false }">
            
            <div class="hidden md:flex items-center space-x-6 font-medium">
                <a href="{{ route('admin.katalog') }}" class="hover:text-[#d5b893] transition text-lg">Home</a>
                <a href="{{ route('search') }}" class="hover:text-[#d5b893] transition text-lg">Search</a>
                <a href="{{ route('admin.about') }}" class="hover:text-[#d5b893] transition text-lg">About Us</a>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button @click="profileOpen = !profileOpen"
                            class="w-12 h-12 bg-[#d5b893] rounded-full flex items-center justify-center hover:scale-110 transition duration-300 shadow-lg focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-7 w-7 text-[#632024]"
                             viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                  clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="profileOpen"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         @click.outside="profileOpen = false"
                         class="absolute right-0 mt-3 w-56 bg-white border rounded-xl shadow-2xl py-2 z-[100] text-gray-800">
                        <div class="px-4 py-2 border-b mb-1">
                            <p class="text-xs text-gray-400 font-bold uppercase">Administrator</p>
                        </div>
                        <a href="{{ route('admin.profile') }}" class="block px-4 py-3 text-sm hover:bg-gray-100 transition">
                            👤 Profile Saya
                        </a>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 font-bold transition">
                                🚪 Logout
                            </button>
                        </form>
                    </div>
                </div>

                <div class="relative">
                    <button @click="menuOpen = !menuOpen" 
                            class="p-2 bg-white/10 rounded-lg hover:bg-white/20 transition focus:outline-none border border-white/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <div x-show="menuOpen"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         @click.outside="menuOpen = false"
                         class="absolute right-0 mt-3 w-56 bg-white border rounded-xl shadow-2xl py-2 z-[100] text-gray-800 border-t-4 border-t-[#632024]">
                        <a href="{{ route('admin.katalog') }}" class="block px-4 py-3 text-sm hover:bg-gray-100 border-b transition">
                            📚 Kelola Data Buku
                        </a>
                        <a href="#" class="block px-4 py-3 text-sm hover:bg-gray-100 transition">
                            👥 Kelola Data User
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>