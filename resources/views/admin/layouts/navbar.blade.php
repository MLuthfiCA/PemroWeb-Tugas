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

    <!-- profile button -->
<div class="relative">
    <button onclick="toggleDropdown()">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#632024]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
    </button>

    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white rounded shadow">
        <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">
            Profile
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">
                Logout
            </button>
        </form>
    </div>
</div>

<script>
function toggleDropdown() {
    document.getElementById("dropdownMenu").classList.toggle("hidden");
}
</script>


        <svg xmlns="http://www.w3.org/2000/svg" 
            class="h-5 w-5 text-[#632024]" 
            viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" 
                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" 
                clip-rule="evenodd" />
        </svg>

    </a>

</nav>