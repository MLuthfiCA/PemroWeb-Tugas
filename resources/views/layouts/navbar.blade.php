<nav class="flex justify-between items-center px-6 py-4 bg-[#632024] text-white shadow-md">
    
    <div class="flex items-center gap-3">
        <div class="bg-white p-1 rounded-lg">
            <div class="w-7 h-7 bg-[#d5b893] rounded flex items-center justify-center text-[10px] text-[#632024] font-bold">
                RS
            </div>
        </div>
        <span class="font-bold text-xl tracking-tight">ReadSpace</span>
    </div>

    <div class="flex items-center gap-8">
        <div class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="{{ route('katalog') }}" class="hover:text-[#d5b893] transition">Home</a>
            <a href="{{ route('search') }}" class="hover:text-[#d5b893] transition">Search</a>
            <a href="{{ route('about') }}" class="hover:text-[#d5b893] transition">About Us</a>
    </div>

    <div class="flex items-center relative">
        <button id="dropdownUserButton" data-dropdown-toggle="dropdownUser" class="flex items-center justify-center w-10 h-10 bg-[#d5b893] rounded-full hover:scale-105 transition-all" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#632024]" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
        </button>

        <div id="dropdownUser" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 mt-2 absolute right-0 top-full">
            <ul class="py-2 text-sm text-gray-700">
                <li><a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">My Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 font-bold hover:bg-red-50">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>