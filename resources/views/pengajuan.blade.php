<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Content -->
    <div class="p-4" style="width:100%;">
        <h3>Form Peminjaman Buku</h3>

        <form>

            <div class="mb-3">
                <label class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" placeholder="Masukkan nama">
            </div>

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" placeholder="Masukkan NIM">
            </div>

            <div class="mb-3">
                <label class="form-label">ID Buku</label>
                <input type="number" class="form-control" placeholder="Masukkan ID buku">
            </div>

            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" class="form-control" placeholder="Masukkan judul buku">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control">
            </div>

            <button type="button" class="btn btn-primary">
                Pinjam Buku
            </button>

        </form>
    </div>

</div>

</body>
</html>