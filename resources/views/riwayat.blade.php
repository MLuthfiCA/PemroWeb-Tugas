<h2>Riwayat Peminjaman</h2>
<table border="1">
    <thead>
        <tr><th>ID</th><th>Judul Buku</th><th>Tanggal Pinjam</th></tr>
    </thead>
    <tbody>
        @foreach($peminjaman as $p)
        <tr>
            <td>{{ $p['id_pengguna'] }}</td>
            <td>{{ $p['judul'] }}</td>
            <td>{{ $p['tanggal_pinjam'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Riwayat Pengembalian</h2>
<table border="1">
    <thead>
        <tr><th>ID</th><th>Judul Buku</th><th>Tanggal Kembali</th></tr>
    </thead>
    <tbody>
        @foreach($pengembalian as $k)
        <tr>
            <td>{{ $k['id_pengguna'] }}</td>
            <td>{{ $k['judul'] }}</td>
            <td>{{ $k['tanggal_kembali'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
