<nav class="flex justify-between items-center px-6 py-4 bg-[#632024] text-white shadow-md sticky top-0 z-50">

    <!-- Logo -->
    <div class="flex items-center gap-3">
        <div class="bg-white p-1 rounded-lg">
            <div class="w-7 h-7 bg-[#d5b893] rounded flex items-center justify-center text-[10px] text-[#632024] font-bold">
                RS
            </div>
        </div>
        <span class="font-bold text-xl tracking-tight">ReadSpace</span>
    </div>

    <!-- Menu -->
    <div class="hidden md:flex items-center gap-8 text-sm font-medium">

        <a href="{{ route('home') }}"
        class="{{ request()->routeIs('home') ? 'text-[#d5b893] font-semibold' : 'hover:text-[#d5b893]' }}">
            Home
        </a>

        <a href="{{ route('search') }}"
        class="{{ request()->routeIs('search') ? 'text-[#d5b893] font-semibold' : 'hover:text-[#d5b893]' }}">
            Search
        </a>

        <a href="{{ route('about') }}"
        class="{{ request()->routeIs('about') ? 'text-[#d5b893] font-semibold' : 'hover:text-[#d5b893]' }}">
            About Us
        </a>

    </div>

    <!-- Profile Icon -->
    <a href="{{ route('profile') }}"
    class="w-9 h-9 bg-[#d5b893] rounded-full flex items-center justify-center 
            hover:scale-105 transition cursor-pointer shadow-sm ml-4">

        <svg xmlns="http://www.w3.org/2000/svg" 
            class="h-5 w-5 text-[#632024]" 
            viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" 
                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" 
                clip-rule="evenodd" />
        </svg>

    </a>

</nav>