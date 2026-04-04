<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
    
    <a href="/" class="text-white text-decoration-none">
        <span class="fs-4">Perpustakaan App</span>
    </a>

    <hr>

    <ul class="nav flex-column">
        <li>
            <a href="/katalog" class="nav-link text-white">Katalog Buku</a>
        </li>
        <li>
            <a href="/riwayat" class="nav-link text-white">Riwayat Pinjam</a>
        </li>
        <li>
            <a href="/pengajuan" class="nav-link text-white">Form Peminjaman</a>
        </li>
    </ul>

    <hr>

    <span class="text-secondary small">
        User: {{ optional(Auth::user())->name ?? 'Guest' }}
    </span>

</div>