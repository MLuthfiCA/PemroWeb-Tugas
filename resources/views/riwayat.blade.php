<div class="p-8 max-w-7xl mx-auto">
    <h2 class="text-3xl font-extrabold text-red-950 mb-6">Riwayat Peminjaman</h2>
    
    <div class="overflow-hidden bg-white rounded-3xl border border-stone-200 shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead class="bg-red-950 text-white text-sm">
                <tr>
                    <th class="px-6 py-4 font-bold uppercase">ID</th>
                    <th class="px-6 py-4 font-bold uppercase">Judul Buku</th>
                    <th class="px-6 py-4 font-bold uppercase text-center">Pinjam</th>
                    <th class="px-6 py-4 font-bold uppercase text-center bg-red-900">Batas Kembali (7 Hari)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @foreach($peminjaman as $p)
                <tr class="hover:bg-red-50 transition-colors">
                    <td class="px-6 py-4 font-medium text-stone-900">{{ $p['id_pengguna'] }}</td>
                    <td class="px-6 py-4 text-stone-700 font-semibold">{{ $p['judul'] }}</td>
                    <td class="px-6 py-4 text-center text-stone-500">{{ $p['tanggal_pinjam'] }}</td>
                    <td class="px-6 py-4 text-center font-bold text-red-900">{{ $p['batas_kembali'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2 class="text-3xl font-extrabold text-red-950 mt-12 mb-6">Riwayat Pengembalian</h2>
    <div class="overflow-hidden bg-white rounded-3xl border border-stone-200 shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead class="bg-stone-800 text-white text-sm">
                <tr>
                    <th class="px-6 py-4 font-bold uppercase">ID</th>
                    <th class="px-6 py-4 font-bold uppercase">Judul Buku</th>
                    <th class="px-6 py-4 font-bold uppercase text-center">Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @foreach($pengembalian as $k)
                <tr class="hover:bg-stone-50 transition-colors">
                    <td class="px-6 py-4 font-medium text-stone-900">{{ $k['id_pengguna'] }}</td>
                    <td class="px-6 py-4 text-stone-700">{{ $k['judul'] }}</td>
                    <td class="px-6 py-4 text-center text-green-700 font-bold">{{ $k['tanggal_kembali'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@vite(['resources/css/app.css', 'resources/js/app.js'])