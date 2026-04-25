@extends('app')

@section('content')
<div class="py-10 space-y-8">
    
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 animate-fade-up">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Users Data</h1>
            <p class="text-gray-500 mt-2">Manage library user and student data.</p>
        </div>
        
        <div>
            <button onclick="openModal('add')" class="px-6 py-3 rounded-xl bg-burgundy-500 text-white font-bold shadow-lg shadow-red-100 hover:bg-maroon transition-all">
                + Add User
            </button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="glass-panel overflow-hidden border border-white/60 animate-fade-up delay-100 shadow-2xl shadow-red-50">
        <div class="p-6 border-b border-red-50/50 flex justify-between items-center bg-white/40">
            <div class="relative w-full md:w-1/3">
                <input type="text" placeholder="Search Users..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-white bg-white/50 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-red-50/50 text-gray-400 text-[10px] font-bold uppercase tracking-widest">
                    <tr>
                        <th class="px-8 py-5">User Info</th>
                        <th class="px-8 py-5">ID Number</th>
                        <th class="px-8 py-5">Role</th>
                        <th class="px-8 py-5 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-red-50">
                    <tr class="group hover:bg-red-50/30 transition-colors duration-300">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-burgundy-500 text-white flex items-center justify-center font-bold shadow-md">
                                    B
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800">Aksel Sarira</p>
                                    <p class="text-xs text-gray-400 font-medium">aksel@student.polibatam.ac.id</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 font-medium text-gray-600">3312001001</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1.5 rounded-lg bg-white/80 text-gray-500 text-[10px] font-bold uppercase tracking-widest border border-red-50">
                                Student
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button onclick="openModal('edit')" class="text-blue-500 hover:text-blue-700 font-bold text-xs px-3 transition-colors">Edit</button>
                            <button class="text-red-500 hover:text-red-700 font-bold text-xs px-3 transition-colors">Delete</button>
                        </td>
                    </tr>
                    <tr class="group hover:bg-red-50/30 transition-colors duration-300">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-maroon text-white flex items-center justify-center font-bold shadow-md">
                                    A
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800">Library Admin</p>
                                    <p class="text-xs text-gray-400 font-medium">admin@polibatam.ac.id</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 font-medium text-gray-600">ADM-001</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1.5 rounded-lg bg-burgundy-50/80 text-burgundy-600 text-[10px] font-bold uppercase tracking-widest border border-burgundy-100">
                                Admin
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button onclick="openModal('edit')" class="text-blue-500 hover:text-blue-700 font-bold text-xs px-3 transition-colors">Edit</button>
                            <button class="text-red-500 hover:text-red-700 font-bold text-xs px-3 transition-colors">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="userModal" class="fixed inset-0 bg-gray-900/40 backdrop-blur-sm hidden items-center justify-center p-4 z-[100] transition-all duration-300 opacity-0 data-[show=true]:opacity-100">
        <div class="bg-white/90 backdrop-blur-xl border border-white/60 w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden relative transform scale-95 data-[show=true]:scale-100 transition-transform duration-300">
            <div class="p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6" id="modalTitle">Add User</h3>
                
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                            <input type="text" placeholder="Full Name" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">NIM / ID</label>
                            <input type="text" placeholder="ID Number" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Email</label>
                            <input type="email" placeholder="Email Address" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Role</label>
                            <select class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm">
                                <option>Student</option>
                                <option>Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <button onclick="closeModal()" class="px-6 py-2.5 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition-colors">Cancel</button>
                    <button onclick="closeModal()" class="px-6 py-2.5 rounded-xl font-bold text-white bg-burgundy-500 shadow-lg shadow-red-100 hover:bg-maroon transition-all">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(mode) {
        const modal = document.getElementById('userModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Timeout for transition
        setTimeout(() => {
            modal.setAttribute('data-show', 'true');
            modal.querySelector('div').setAttribute('data-show', 'true');
        }, 10);
        
        document.getElementById('modalTitle').innerText = mode === 'add' ? 'Tambah User Baru' : 'Edit User';
    }
    
    function closeModal() {
        const modal = document.getElementById('userModal');
        modal.setAttribute('data-show', 'false');
        modal.querySelector('div').setAttribute('data-show', 'false');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300); // match transition duration
    }
</script>
@endsection
