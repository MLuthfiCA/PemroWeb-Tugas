@extends('app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 animate-fade-up">
        <div class="text-center">
            <div class="mx-auto h-16 w-16 rounded-2xl bg-gradient-to-tr from-burgundy-500 to-maroon flex items-center justify-center shadow-2xl shadow-red-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Create a New Account</h2>
            <p class="mt-2 text-sm text-gray-500 font-medium">Join our community of readers.</p>
        </div>

        <div class="glass-panel p-8 shadow-2xl shadow-red-50 border-white/60">
            <form class="space-y-5" action="{{ route('register') }}" method="POST">
                @csrf

                @if($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-2xl bg-red-50 border border-red-100" role="alert">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li class="font-medium">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Username</label>
                        <input name="username" type="text" required class="w-full px-4 py-3.5 border border-white bg-white/50 rounded-2xl placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-burgundy-500 transition-all text-sm font-medium" placeholder="Ex: crist">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Role</label>
                        <select name="role" class="w-full px-4 py-3.5 border border-white bg-white/50 rounded-2xl text-gray-800 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-burgundy-500 transition-all text-sm font-medium cursor-pointer appearance-none">
                            <option value="mahasiswa">Student</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Full name</label>
                    <input name="name" type="text" required class="w-full px-4 py-3.5 border border-white bg-white/50 rounded-2xl placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-burgundy-500 transition-all text-sm font-medium" placeholder="Your full name">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Email</label>
                    <input name="email" type="email" required class="w-full px-4 py-3.5 border border-white bg-white/50 rounded-2xl placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-burgundy-500 transition-all text-sm font-medium" placeholder="email@example.com">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                    <input name="password" type="password" required class="w-full px-4 py-3.5 border border-white bg-white/50 rounded-2xl placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-burgundy-500 transition-all text-sm font-medium" placeholder="••••••••">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-2xl text-white bg-burgundy-500 hover:bg-maroon focus:outline-none focus:ring-4 focus:ring-red-100 transition-all shadow-lg shadow-red-100 transform active:scale-95">
                        Register Account
                    </button>
                </div>
            </form>
            
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500 font-medium">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-bold text-burgundy-600 hover:text-maroon transition-colors">Sign in here</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
