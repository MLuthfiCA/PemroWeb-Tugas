@extends('layouts.app')

@section('title', 'Dashboard - Readspace Library')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-sm border border-gray-200">
    <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Welcome, PBL Members! 👋</h2>
    <p class="text-gray-500 mb-6">Manage physical book data and monitor student loan status here.</p>
    
    <hr class="mb-8">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="p-6 bg-blue-600 rounded-2xl shadow-lg shadow-blue-200">
            <h5 class="text-blue-100 font-medium">Total Book Collection</h5>
            <h2 class="text-4xl font-bold text-white mt-2">120</h2>
        </div>
        
        <!-- Card 2 -->
        <div class="p-6 bg-emerald-500 rounded-2xl shadow-lg shadow-emerald-200">
            <h5 class="text-emerald-50 text-emerald-100 font-medium">Books on Borrow</h5>
            <h2 class="text-4xl font-bold text-white mt-2">15</h2>
        </div>
        
        <!-- Card 3 -->
        <div class="p-6 bg-amber-400 rounded-2xl shadow-lg shadow-amber-100">
            <h5 class="text-amber-900 font-medium">New Member Queue</h5>
            <h2 class="text-4xl font-bold text-amber-900 mt-2">8</h2>
        </div>
    </div>
</div>
@endsection