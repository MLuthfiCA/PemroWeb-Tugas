<style>
    .bg-custom-maroon { background-color: #632024; }
</style>

<header class="bg-custom-maroon text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">

        <!-- Logo Section -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.rsl.2.png') }}" alt="Logo" class="w-14 h-14 object-contain">
            <span class="text-lg font-semibold">ReadSpace Library</span>
        </div>

        <!-- All Items in One Row: Menu - Profile - Hamburger -->
        <div class="flex items-center space-x-6" x-data="{ profileOpen: false, menuOpen: false }">
            <!-- Menu -->
            <a href="{{ route('katalog') }}" class="hover:text-[#d5b893] transition">Home</a>
            <a href="{{ route('search') }}" class="hover:text-[#d5b893] transition">Search</a>
            <a href="{{ route('about') }}" class="hover:text-[#d5b893] transition">About Us</a>

            <!-- Profile Icon -->
            <div class="relative">
                <button @click="profileOpen = !profileOpen"
                        class="w-10 h-10 bg-[#d5b893] rounded-full flex items-center justify-center hover:scale-110 transition duration-300 shadow-md focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6 text-[#632024]"
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
                     class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-xl py-2 z-[100] text-gray-800">

                    <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 border-b">
                        👤 Profile Saya
                    </a>

                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Hamburger Button -->
            <div class="relative">
                <button @click="menuOpen = !menuOpen" class="p-2 hover:bg-opacity-80 transition focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <div x-show="menuOpen"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     @click.outside="menuOpen = false"
                     class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-xl py-2 z-[100] text-gray-800">

                    <a href="{{ route('admin.katalog') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 border-b">
                        📚 Data Buku
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">
                        👥 Data User
                    </a>
                </div>
            </div>
        </div>

    </div>
</header>
