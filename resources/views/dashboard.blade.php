<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Perpustakaan Digital</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="#">Dashboard</a>
                <a class="nav-link" href="#">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm p-4">
                    <h2 class="fw-bold text-dark">Selamat Datang di Sistem Perpustakaan Digital</h2>
                    <p class="text-secondary">Anda masuk sebagai anggota tim PBL. Di sini Anda bisa mengelola data buku dan peminjaman.</p>
                    <hr>
                    
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white p-3 border-0">
                                <h5>Total Buku</h5>
                                <h2 class="fw-bold">120</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white p-3 border-0">
                                <h5>Buku Dipinjam</h5>
                                <h2 class="fw-bold">15</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-warning text-dark p-3 border-0">
                                <h5>Anggota Baru</h5>
                                <h2 class="fw-bold">8</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<footer class="bg-[#632024] text-white py-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
            
            <div class="flex justify-center md:justify-start items-center">
                <img src="{{ asset('images/readspace-library.png') }}" 
                     alt="Logo Readspace" 
                     class="h-20 w-auto object-contain"> </div>

            <div>
                <h6 class="font-bold mb-2">Readspace Library</h6>
                <p class="text-sm text-gray-300 leading-relaxed">
                    Readspace Library adalah platform perpustakaan digital yang kami rancang untuk memudahkan mahasiswa dalam peminjaman buku serta memudahkan sistem perpustakan.
                </p>
            </div>

            <div>
                <h6 class="font-bold mb-2">Politeknik Negeri Batam</h6>
                <p class="text-sm text-gray-300">
                    Jl. Ahmad Yani, Batam Kota, Kota Batam, Kepulauan Riau, Indonesia.
                </p>
            </div>

            <div>
                <h6 class="font-bold mb-2">Hubungi Kami</h6>
                <p class="text-sm text-gray-300">
                    Email: readspacelibrary@poltek.ac.id<br>
                    Telp: (021) 673528
                </p>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
