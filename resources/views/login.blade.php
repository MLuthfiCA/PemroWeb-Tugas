@extends('app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 animate-fade-up">
        <div class="text-center">
            <div class="mx-auto h-16 w-16 rounded-2xl bg-gradient-to-tr from-burgundy-500 to-maroon flex items-center justify-center shadow-2xl shadow-red-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Selamat Datang Kembali</h2>
            <p class="mt-2 text-sm text-gray-500 font-medium">
                Masuk ke akun ReadSpace kamu untuk melanjutkan literasi
            </p>
        </div>

        <div class="glass-panel p-8 shadow-2xl shadow-red-50 border-white/60">
            <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                @csrf

                @if($errors->has('login_error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-2xl bg-red-50 border border-red-100 animate-shake" role="alert">
                    <span class="font-bold">Error:</span> {{ $errors->first('login_error') }}
                </div>
                @endif

                @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-2xl bg-green-50 border border-green-100" role="alert">
                    <span class="font-bold">Sukses:</span> {{ session('success') }}
                </div>
                @endif

                <div class="space-y-5">
                    <div>
                        <label for="username" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Username</label>
                        <input id="username" name="username" type="text" required 
                            class="appearance-none relative block w-full px-4 py-4 border border-white bg-white/50 rounded-2xl placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-burgundy-500 transition-all sm:text-sm font-medium" 
                            placeholder="Username kamu">
                    </div>
                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                        <input id="password" name="password" type="password" required 
                            class="appearance-none relative block w-full px-4 py-4 border border-white bg-white/50 rounded-2xl placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-burgundy-500 transition-all sm:text-sm font-medium" 
                            placeholder="••••••••">
                    </div>
                    <div>
                        <label for="role" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Login Sebagai</label>
                        <select id="role" name="role" required 
                            class="appearance-none relative block w-full px-4 py-4 border border-white bg-white/50 rounded-2xl text-gray-800 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-burgundy-500 transition-all sm:text-sm font-medium">
                            <option value="mahasiswa">User / Mahasiswa</option>
                            <option value="admin">Admin Perpustakaan</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-burgundy-600 focus:ring-burgundy-500 border-gray-300 rounded transition-all">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-500 font-medium cursor-pointer">Ingat saya</label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-bold text-burgundy-600 hover:text-maroon transition-colors">Lupa password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-2xl text-white bg-burgundy-500 hover:bg-maroon focus:outline-none focus:ring-4 focus:ring-red-100 transition-all shadow-lg shadow-red-100 transform active:scale-95">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-burgundy-400 group-hover:text-red-200 transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Masuk Sekarang
                    </button>
                </div>
            </form>
            
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500 font-medium">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-bold text-burgundy-600 hover:text-maroon transition-colors">Daftar gratis di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection