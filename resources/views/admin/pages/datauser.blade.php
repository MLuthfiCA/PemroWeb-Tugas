@extends('admin.layouts.app')

@section('content')
<div class="py-10 space-y-8">
    
    <!-- Page Header -->
    <x-ui.page-header 
        title="Users Data" 
        subtitle="Manage library user and student data."
    >
        <button onclick="openModal('add')" class="px-6 py-3 rounded-xl bg-burgundy-500 text-white font-bold shadow-lg shadow-red-100 hover:bg-maroon transition-all">
            + Add User
        </button>
    </x-ui.page-header>

    <!-- Table Section -->
    <x-ui.glass-card class="overflow-hidden border border-white/60 animate-fade-up delay-100 shadow-2xl shadow-red-50">
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
    </x-ui.glass-card>
</div>

<!-- Modal (Moved outside of space-y-8 to prevent layout issues) -->
<div id="userModal" class="fixed inset-0 bg-gray-900/40 backdrop-blur-sm hidden items-center justify-center p-4 z-[100] transition-all duration-300 opacity-0 data-[show=true]:opacity-100 !m-0">
    <div class="bg-white/90 backdrop-blur-xl border border-white/60 w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden relative transform scale-95 data-[show=true]:scale-100 transition-transform duration-300">
        <div class="p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6" id="modalTitle">Add User</h3>
            
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Full Name</label>
                        <input type="text" placeholder="Full Name" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">ID Number</label>
                        <input type="text" placeholder="ID Number" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm transition-all">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Email</label>
                        <input type="email" placeholder="Email Address" class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Role</label>
                        <select class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm transition-all text-gray-700">
                            <option>Student</option>
                            <option>Admin</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button onclick="closeModal()" class="px-6 py-2.5 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition-colors">Cancel</button>
                <button onclick="saveUser()" class="px-6 py-2.5 rounded-xl font-bold text-white bg-burgundy-500 shadow-lg shadow-red-100 hover:bg-maroon transition-all">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Toast Notification -->
<div id="successToast" class="fixed top-5 right-5 z-[200] transform transition-all duration-500 translate-x-full opacity-0">
    <div class="bg-white/90 backdrop-blur-xl border border-white/60 p-4 rounded-2xl shadow-2xl flex items-center gap-4 w-80 relative overflow-hidden">
        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-green-500"></div>
        <div class="bg-green-100 p-2.5 rounded-full ml-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <div>
            <h4 class="text-sm font-bold text-gray-800">Success</h4>
            <p class="text-xs text-gray-500 font-medium">New user successfully added!</p>
        </div>
        <button onclick="hideToast()" class="ml-auto text-gray-400 hover:text-gray-600 hover:bg-gray-100 p-1 rounded-lg transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>

<script>
    function openModal(mode) {
        const modal = document.getElementById('userModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
        
        // Timeout for transition
        setTimeout(() => {
            modal.setAttribute('data-show', 'true');
            modal.querySelector('div').setAttribute('data-show', 'true');
        }, 10);
        
        document.getElementById('modalTitle').innerText = mode === 'add' ? 'Add New User' : 'Edit User';
    }
    
    function closeModal() {
        const modal = document.getElementById('userModal');
        modal.setAttribute('data-show', 'false');
        modal.querySelector('div').setAttribute('data-show', 'false');
        
        // Restore body scroll
        document.body.style.overflow = 'auto';
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300); // match transition duration
    }

    function saveUser() {
        closeModal();
        
        // Show success toast instead of SweetAlert
        setTimeout(() => {
            showToast();
        }, 300);
    }

    function showToast() {
        const toast = document.getElementById('successToast');
        toast.classList.remove('translate-x-full', 'opacity-0');
        
        // Auto hide after 4 seconds
        setTimeout(() => {
            hideToast();
        }, 4000);
    }

    function hideToast() {
        const toast = document.getElementById('successToast');
        toast.classList.add('translate-x-full', 'opacity-0');
    }
</script>
@endsection
