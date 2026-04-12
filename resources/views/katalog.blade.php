@extends('app')

@section('content')
<div class="p-4 sm:ml-64 bg-gray-50 min-h-screen">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">Katalog Buku Fisik</h2>
        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">PBL Project</span>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div class="max-w-sm bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition-shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex justify-between items-start mb-2">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Laskar Pelangi</h5>
                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Tersedia</span>
                </div>
                <p class="text-sm text-gray-500 mb-4">Andrea Hirata</p>
                <hr class="mb-4">
                <div class="space-y-2 mb-5">
                    <p class="text-sm text-gray-600"><strong>Genre:</strong> Drama, Pendidikan</p>
                    <p class="text-sm text-gray-600"><strong>Publikasi:</strong> 2005</p>
                </div>
                <button data-modal-target="modal-pinjam" data-modal-toggle="modal-pinjam" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors">
                    Pinjam Buku
                </button>
            </div>
        </div>

        <div class="max-w-sm bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition-shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex justify-between items-start mb-2">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Bumi</h5>
                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-0.5 rounded">Tersedia</span>
                </div>
                <p class="text-sm text-gray-500 mb-4">Tere Liye</p>
                <hr class="mb-4">
                <div class="space-y-2 mb-5">
                    <p class="text-sm text-gray-600"><strong>Genre:</strong> Petualangan, Fantasi</p>
                    <p class="text-sm text-gray-600"><strong>Publikasi:</strong> 2014</p>
                </div>
                <button data-modal-target="modal-pinjam" data-modal-toggle="modal-pinjam" class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">
                    Pinjam Buku
                </button>
            </div>
        </div>

        <div class="max-w-sm bg-gray-100 border border-gray-200 rounded-2xl shadow-sm opacity-75 dark:bg-gray-700 dark:border-gray-600">
            <div class="p-5">
                <div class="flex justify-between items-start mb-2">
                    <h5 class="text-xl font-bold tracking-tight text-gray-400">Filosofi Teras</h5>
                    <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-0.5 rounded">Dipinjam</span>
                </div>
                <p class="text-sm text-gray-400 mb-4">Henry Manampiring</p>
                <hr class="mb-4 border-gray-300">
                <div class="space-y-2 mb-5 text-gray-400">
                    <p class="text-sm"><strong>Genre:</strong> Self-Development</p>
                    <p class="text-sm"><strong>Publikasi:</strong> 2018</p>
                </div>
                <button disabled class="w-full text-white bg-gray-400 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5">
                    Tidak Tersedia
                </button>
            </div>
        </div>

    </div>
</div>

<div id="modal-pinjam" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-2xl shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Formulir Pinjam Buku
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-pinjam">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mahasiswa</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan nama lengkap" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                        <input type="number" name="nim" id="nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="1234..." required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Ambil</label>
                        <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-all w-full justify-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Kirim Pengajuan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection