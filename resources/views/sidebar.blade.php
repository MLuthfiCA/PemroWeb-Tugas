<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Perpustakaan App</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/katalog" class="nav-link text-white {{ Request::is('katalog*') ? 'active' : '' }}">
                <i class="bi bi-book me-2"></i> Katalog Buku
            </a>
        </li>
        <li>
            <a href="/riwayat" class="nav-link text-white {{ Request::is('riwayat*') ? 'active' : '' }}">
                <i class="bi bi-clock-history me-2"></i> Riwayat Pinjam & Kembali
            </a>
        </li>
        <li>
            <a href="/pengajuan" class="nav-link text-white {{ Request::is('pengajuan*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-plus me-2"></i> Form Pengajuan Pinjam
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <span class="text-secondary small">User: {{ Auth::user()->name ?? 'Guest' }}</span>
    </div>
</div>
