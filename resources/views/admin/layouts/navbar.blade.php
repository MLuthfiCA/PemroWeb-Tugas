<style>
    .bg-custom-maroon { background-color: #632024; }
</style>

<nav class="flex justify-between items-center px-6 py-6 bg-[#632024] text-white shadow-md">
    
    <!-- LOGO -->
    <div class="flex items-center gap-4">
        <img src="{{ asset('images/logo.rsl.2.png') }}" 
             class="h-14 w-auto object-contain scale-110">
        
        <span class="font-bold text-2xl tracking-tight">
            ReadSpace Admin
        </span>
    </div>

    <!-- MENU + PROFILE -->
    <div class="flex items-center gap-8" x-data="{ profileOpen: false, menuOpen: false }">

        <!-- MENU -->
        <div class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="{{ route('admin.katalog') }}" class="hover:text-[#d5b893] transition">Home</a>
            <a href="{{ route('search') }}" class="hover:text-[#d5b893] transition">Search</a>
            <a href="{{ route('admin.about') }}" class="hover:text-[#d5b893] transition">About Us</a>
        </div>

        <!-- PROFILE -->
        <div class="relative">
            <button @click="profileOpen = !profileOpen"
                class="flex items-center justify-center w-10 h-10 bg-[#d5b893] rounded-full hover:scale-105 transition-all">

                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-6 w-6 text-[#632024]" 
                     viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" 
                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <!-- DROPDOWN PROFILE -->
            <div x-show="profileOpen"
                 x-transition
                 @click.outside="profileOpen = false"
                 class="absolute right-0 mt-2 w-44 bg-white text-gray-800 rounded-lg shadow-md z-50 overflow-hidden">

                <div class="px-4 py-2 border-b text-xs text-gray-400 font-bold uppercase">
                    Administrator
                </div>

                <a href="{{ route('admin.profile') }}" 
                   class="block px-4 py-2 text-sm hover:bg-gray-100 transition">
                    👤 Profile Saya
                </a>

                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" 
                        class="block w-full text-left px-4 py-2 text-sm text-red-600 font-bold hover:bg-red-50 transition">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- MENU ADMIN -->
        <div class="relative">
            <button @click="menuOpen = !menuOpen"
                class="p-2 rounded-lg hover:bg-white/10 transition">

                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- DROPDOWN ADMIN -->
            <div x-show="menuOpen"
                 x-transition
                 @click.outside="menuOpen = false"
                 class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-md z-50 overflow-hidden">

                <a href="{{ route('admin.katalog') }}" 
                   class="block px-4 py-2 text-sm hover:bg-gray-100 transition">
                    📚 Kelola Data Buku
                </a>

                <a href="#" 
                   class="block px-4 py-2 text-sm hover:bg-gray-100 transition">
                    👥 Kelola Data User
                </a>
            </div>
        </div>

    </div>
</nav>