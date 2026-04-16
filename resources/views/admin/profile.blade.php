@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">

    <h2 class="text-2xl font-bold mb-6 text-[#632024]">
        Profile Admin
    </h2>

    <div class="flex items-center gap-6">
        
        <!-- Foto -->
        <div class="w-24 h-24 bg-[#d5b893] rounded-full flex items-center justify-center text-3xl text-white">
            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
        </div>

        <!-- Info -->
        <div>
            <p class="text-lg font-semibold">
                Nama: {{ auth()->user()->name ?? 'Admin' }}
            </p>
            <p>
                Email: {{ auth()->user()->email ?? 'admin@gmail.com' }}
            </p>
            <p>Role: Admin</p>
        </div>

    </div>

    <div class="mt-6">
        <button class="bg-[#632024] text-white px-4 py-2 rounded-lg hover:bg-[#4a1a1d]">
            Edit Profile
        </button>
    </div>

</div>
@endsection