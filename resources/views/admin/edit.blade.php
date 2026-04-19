@extends('admin.layouts.app')

@section('title', 'Edit Buku')

@section('content')

<div class="max-w-xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Buku</h2>

    <form action="{{ route('admin.update', $buku['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="judul" value="{{ $buku['judul'] }}" class="w-full mb-3 p-2 border rounded">

        <input type="text" name="penulis" value="{{ $buku['penulis'] }}" class="w-full mb-3 p-2 border rounded">

        <input type="text" name="genre" value="{{ $buku['genre'] }}" class="w-full mb-3 p-2 border rounded">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>

@endsection