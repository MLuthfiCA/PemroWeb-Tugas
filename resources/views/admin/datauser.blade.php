<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Perbaikan: Nama class disamakan jadi bg-custom-maroon */
        .bg-custom-maroon { background-color: #632024; }
    </style>
</head>
<body class="bg-white flex flex-col min-h-screen font-sans">
<header class="bg-custom-maroon text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            
            <div class="flex items-center">
                <img src="{{ asset('images/logo.rsl.2.png') }}" alt="Logo" class="w-20 h-20 object-contain">
                <span class="ml-3 text-xl font-semibold">ReadSpace Library</span>
            </div>

        <nav class="flex justify-between items-center px-8 py-4 bg-[#632024] text-white shadow-lg">
    <!-- Menu -->
    <div class="flex items-center space-x-6">
        <a href="{{ route('katalog') }}" class="hover:text-[#d5b893] transition">Home</a>
        <a href="/search" class="hover:text-[#d5b893] transition">Search</a>
        <a href="{{ route('about') }}" class="hover:text-[#d5b893] transition">About Us</a>
    </div>

    <!-- Profile Icon -->
    
    <!-- Profile -->
    <div class="ml-6">
        <a href="{{ route('profile') }}" class="w-10 h-10 bg-[#d5b893] ...">
        class="w-10 h-10 bg-[#d5b893] rounded-full flex items-center justify-center 
                hover:scale-110 transition duration-300 shadow-md">
            
            <svg xmlns="http://www.w3.org/2000/svg" 
                class="h-6 w-6 text-[#632024]" 
                viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" 
                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" 
                    clip-rule="evenodd" />
            </svg>


    </a>

</nav>
        </div>
    </header>

    <div class="container mx-auto flex flex-col md:flex-row gap-6 p-6">
        <aside class="w-full md:w-32">
            <button onclick="openModal('add')" class="w-full bg-[#12417d] text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-900 transition">
                Add
            </button>
        </aside>

        <main class="flex-1">
            <div class="flex items-center gap-3 mb-6">
                <div class="flex-1 flex items-center bg-white border-2 border-gray-200 rounded-full px-4 py-2 shadow-sm focus-within:border-blue-400">
                    <span class="text-gray-400 mr-2">🔍</span>
                    <input type="text" id="searchInput" placeholder="Search User" class="w-full outline-none bg-transparent text-sm">
                </div>
                <button class="p-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 5h18M6 12h12M10 19h4"/></svg>
                </button>
            </div>

            <div class="hidden md:grid grid-cols-6 gap-4 p-4 font-bold text-blue-900 bg-white border-2 border-gray-200 rounded-xl mb-2 text-xs uppercase tracking-wider">
                <div>Photo</div>
                <div>Name</div>
                <div>ID Number</div>
                <div>Email</div>
                <div>Role</div>
                <div class="text-right">Actions</div>
            </div>

            <div class="space-y-3" id="userRows">
                @forelse($users as $user)
                    <div class="grid grid-cols-1 md:grid-cols-6 ...">
                    ...
                    </div>
                @empty
                <div class="p-10 text-center bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                    <p class="text-gray-400 font-medium">Belum ada data user. Klik tombol "Add" untuk menambah.</p>
                </div>
            </div>
        </div>
    @endforelse
</div>
        </main>
    </div>

    <div id="userModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-[100]">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden relative border-t-4 border-blue-900">
            <div class="p-6">
                <h3 class="text-xl font-bold text-blue-900 mb-4" id="modalTitle">Edit User</h3>
                
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-20 h-20 rounded-full bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center text-2xl font-bold text-gray-400">
                            U
                        </div>
                        <button class="text-xs text-blue-600 font-bold hover:underline">Change Photo</button>
                    </div>

                    <div class="flex-1 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" placeholder="Full Name" class="w-full border p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                            <input type="text" placeholder="ID Number" class="w-full border p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="email" placeholder="Email Address" class="w-full border p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                            <select class="w-full border p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                                <option>User</option>
                                <option>Admin</option>
                                <option>Editor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <button onclick="closeModal()" class="px-6 py-2 rounded-xl font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 transition">Cancel</button>
                    <button class="px-6 py-2 rounded-xl font-bold text-white bg-blue-900 shadow-lg shadow-blue-900/20 hover:bg-blue-800 transition">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function openModal(mode) {
            document.getElementById('userModal').style.display = 'flex';
            document.getElementById('modalTitle').innerText = mode === 'add' ? 'Add New User' : 'Edit User';
        }
        function closeModal() {
            document.getElementById('userModal').style.display = 'none';
        }
    </script>
</body>
</html>
