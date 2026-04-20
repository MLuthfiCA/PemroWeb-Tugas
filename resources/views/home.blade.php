<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadSpace Library— Sistem Perpustakaan Online</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --header-color: #d5b893;
            --footer-color: #632024;
            --accent-dark: #4a1518;
            --cream: #fdf6ee;
            --text-dark: #2c1a0e;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--cream);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        h1, h2, h3, .font-display {
            font-family: 'Playfair Display', serif;
        }

        /* ── HEADER ── */
        header {
            background-color: var(--header-color);
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 16px rgba(99,32,36,0.10);
        }

        /* ── HERO ── */
        .hero-bg {
            background: linear-gradient(135deg, #fdf6ee 0%, #f5e6d0 60%, #e8c9a0 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(213,184,147,0.35) 0%, transparent 70%);
            top: -150px;
            right: -100px;
            pointer-events: none;
        }

        .hero-bg::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(99,32,36,0.08) 0%, transparent 70%);
            bottom: -100px;
            left: -80px;
            pointer-events: none;
        }

        .book-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(99,32,36,0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .book-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 48px rgba(99,32,36,0.18);
        }

        .feature-icon {
            background: linear-gradient(135deg, var(--header-color), #c4a070);
            color: white;
            border-radius: 16px;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background-color: var(--footer-color);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.2s, transform 0.15s;
            display: inline-block;
            text-decoration: none;
        }
        .btn-primary:hover {
            background-color: var(--accent-dark);
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 2px solid var(--footer-color);
            color: var(--footer-color);
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-block;
            text-decoration: none;
        }
        .btn-outline:hover {
            background-color: var(--footer-color);
            color: white;
        }

        /* ── STATS ── */
        .stat-card {
            background: white;
            border-left: 4px solid var(--header-color);
            border-radius: 10px;
            padding: 1.5rem 2rem;
            box-shadow: 0 4px 16px rgba(99,32,36,0.08);
        }

        /* ── FOOTER ── */
        footer {
            background-color: var(--footer-color);
        }

        /* ── FLOATING BOOKS ILLUSTRATION ── */
        .book-spine {
            border-radius: 4px 12px 12px 4px;
            box-shadow: 4px 4px 12px rgba(0,0,0,0.15);
            transition: transform 0.3s;
        }
        .book-spine:hover { transform: rotate(-3deg) scale(1.05); }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(32px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.7s ease both; }
        .delay-1 { animation-delay: 0.15s; }
        .delay-2 { animation-delay: 0.30s; }
        .delay-3 { animation-delay: 0.45s; }
        .delay-4 { animation-delay: 0.60s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-12px); }
        }
        .floating { animation: float 4s ease-in-out infinite; }
        .floating-slow { animation: float 6s ease-in-out infinite; }
    </style>
</head>
<body>

<!-- ═══════════════════════════ HEADER ═══════════════════════════ -->
<header>
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background-color:#632024;">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>
            <span class="font-display text-xl font-bold" style="color:#632024;">ReadSpace Library</span>
        </div>

        <!-- Nav Links -->
        <nav class="hidden md:flex items-center gap-8">
            <a href="#fitur" class="text-sm font-medium hover:opacity-70 transition" style="color:#632024;">Fitur</a>
            <a href="#koleksi" class="text-sm font-medium hover:opacity-70 transition" style="color:#632024;">Koleksi</a>
            <a href="#tentang" class="text-sm font-medium hover:opacity-70 transition" style="color:#632024;">Tentang</a>
        </nav>

        <!-- Auth Buttons -->
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}"
               class="text-sm font-medium px-5 py-2 rounded-lg border-2 transition-all duration-200"
               style="border-color:#632024; color:#632024;"
               onmouseover="this.style.background='#632024'; this.style.color='white';"
               onmouseout="this.style.background='transparent'; this.style.color='#632024';">
                Masuk
            </a>
            <a href="{{ route('register') }}"
               class="text-sm font-medium px-5 py-2 rounded-lg text-white transition-all duration-200"
               style="background-color:#632024;"
               onmouseover="this.style.background='#4a1518';"
               onmouseout="this.style.background='#632024';">
                Daftar
            </a>
        </div>
    </div>
</header>

<!-- ═══════════════════════════ HERO ═══════════════════════════ -->
<section class="hero-bg min-h-screen flex items-center">
    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center w-full">

        <!-- Left: Copy -->
        <div class="space-y-7">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-medium fade-up"
                 style="background:rgba(99,32,36,0.08); color:#632024; border:1px solid rgba(99,32,36,0.15);">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                Perpustakaan Digital Terpercaya
            </div>

            <h1 class="text-5xl lg:text-6xl font-bold leading-tight fade-up delay-1" style="color:#2c1a0e;">
                Baca Lebih Banyak,<br>
                <span style="color:#632024;">Di Mana Saja.</span>
            </h1>

            <p class="text-lg leading-relaxed fade-up delay-2" style="color:#6b4c30; max-width:480px;">
                BiblioNusa menghadirkan ribuan koleksi buku, jurnal, dan referensi akademik dalam satu platform yang mudah diakses kapan pun dan di mana pun Anda berada.
            </p>

            <div class="flex flex-wrap gap-4 fade-up delay-3">
                <a href="{{ route('register') }}" class="btn-primary">
                    Mulai Gratis →
                </a>
                <a href="#fitur" class="btn-outline">
                    Pelajari Fitur
                </a>
            </div>

            <!-- Mini Stats -->
            <div class="flex gap-8 pt-4 fade-up delay-4">
                <div>
                    <div class="text-2xl font-bold font-display" style="color:#632024;">12.000+</div>
                    <div class="text-sm" style="color:#8a6040;">Judul Buku</div>
                </div>
                <div class="w-px" style="background:#d5b893;"></div>
                <div>
                    <div class="text-2xl font-bold font-display" style="color:#632024;">5.000+</div>
                    <div class="text-sm" style="color:#8a6040;">Anggota Aktif</div>
                </div>
                <div class="w-px" style="background:#d5b893;"></div>
                <div>
                    <div class="text-2xl font-bold font-display" style="color:#632024;">24/7</div>
                    <div class="text-sm" style="color:#8a6040;">Akses Penuh</div>
                </div>
            </div>
        </div>

        <!-- Right: Illustrated Books Stack -->
        <div class="hidden md:flex justify-center items-end gap-4 relative h-96">
            <!-- Decorative circle -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-72 h-72 rounded-full opacity-20" style="background: radial-gradient(circle, #d5b893, transparent);"></div>
            </div>

            <!-- Book 1 -->
            <div class="book-spine w-14 h-52 floating-slow delay-1" style="background: linear-gradient(180deg,#632024,#4a1518); margin-bottom:24px;"></div>
            <!-- Book 2 -->
            <div class="book-spine w-12 h-64 floating" style="background: linear-gradient(180deg,#d5b893,#c4a070);"></div>
            <!-- Book 3 (tall center) -->
            <div class="book-spine w-16 h-72 floating-slow" style="background: linear-gradient(180deg,#2c1a0e,#4a2810); margin-bottom:8px;">
                <div class="h-full flex items-center justify-center">
                    <span class="text-white text-xs font-display" style="writing-mode:vertical-rl; transform:rotate(180deg); letter-spacing:2px;">PERPUSTAKAAN</span>
                </div>
            </div>
            <!-- Book 4 -->
            <div class="book-spine w-12 h-56 floating delay-2" style="background: linear-gradient(180deg,#8a3d20,#6b2d18); margin-bottom:16px;"></div>
            <!-- Book 5 -->
            <div class="book-spine w-10 h-44 floating-slow delay-3" style="background: linear-gradient(180deg,#e8b86d,#d5a050); margin-bottom:28px;"></div>

            <!-- Floating badge -->
            <div class="absolute top-8 right-0 book-card px-4 py-3 fade-up delay-3" style="background:white;">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs" style="background:#632024;">✓</div>
                    <div>
                        <div class="text-xs font-medium" style="color:#2c1a0e;">Buku Baru Ditambahkan</div>
                        <div class="text-xs" style="color:#8a6040;">48 judul minggu ini</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════ FITUR ═══════════════════════════ -->
<section id="fitur" class="py-24" style="background:white;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold font-display mb-4" style="color:#2c1a0e;">Semua yang Kamu Butuhkan</h2>
            <p class="text-lg max-w-xl mx-auto" style="color:#6b4c30;">Platform perpustakaan lengkap yang dirancang untuk kemudahan belajar dan eksplorasi ilmu pengetahuan.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="p-8 rounded-2xl transition-all duration-300 hover:-translate-y-2" style="background:#fdf6ee; border:1px solid #e8d5b8;">
                <div class="feature-icon mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold font-display mb-2" style="color:#2c1a0e;">Koleksi Lengkap</h3>
                <p style="color:#6b4c30;">Ribuan buku fiksi, nonfiksi, jurnal ilmiah, dan referensi akademik tersedia dalam satu tempat.</p>
            </div>

            <!-- Feature 2 -->
            <div class="p-8 rounded-2xl transition-all duration-300 hover:-translate-y-2" style="background:#fdf6ee; border:1px solid #e8d5b8;">
                <div class="feature-icon mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold font-display mb-2" style="color:#2c1a0e;">Pencarian Cepat</h3>
                <p style="color:#6b4c30;">Temukan buku berdasarkan judul, pengarang, kategori, atau ISBN dalam hitungan detik.</p>
            </div>

            <!-- Feature 3 -->
            <div class="p-8 rounded-2xl transition-all duration-300 hover:-translate-y-2" style="background:#fdf6ee; border:1px solid #e8d5b8;">
                <div class="feature-icon mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold font-display mb-2" style="color:#2c1a0e;">Peminjaman Online</h3>
                <p style="color:#6b4c30;">Pinjam dan kembalikan buku secara digital. Kelola riwayat pinjaman dengan mudah dari dashboard.</p>
            </div>

            <!-- Feature 4 -->
            <div class="p-8 rounded-2xl transition-all duration-300 hover:-translate-y-2" style="background:#fdf6ee; border:1px solid #e8d5b8;">
                <div class="feature-icon mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold font-display mb-2" style="color:#2c1a0e;">Notifikasi Otomatis</h3>
                <p style="color:#6b4c30;">Dapatkan pengingat jatuh tempo, buku baru, dan informasi penting lainnya secara real-time.</p>
            </div>

            <!-- Feature 5 -->
            <div class="p-8 rounded-2xl transition-all duration-300 hover:-translate-y-2" style="background:#fdf6ee; border:1px solid #e8d5b8;">
                <div class="feature-icon mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold font-display mb-2" style="color:#2c1a0e;">Laporan & Statistik</h3>
                <p style="color:#6b4c30;">Pantau aktivitas membaca, tracking progres, dan laporan lengkap untuk anggota maupun admin.</p>
            </div>

            <!-- Feature 6 -->
            <div class="p-8 rounded-2xl transition-all duration-300 hover:-translate-y-2" style="background:#fdf6ee; border:1px solid #e8d5b8;">
                <div class="feature-icon mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold font-display mb-2" style="color:#2c1a0e;">Akun Aman</h3>
                <p style="color:#6b4c30;">Data anggota terlindungi dengan sistem keamanan berlapis dan privasi yang terjamin.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════ CTA BANNER ═══════════════════════════ -->
<section class="py-20 relative overflow-hidden" style="background:linear-gradient(135deg,#632024,#4a1518);">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-64 h-64 rounded-full" style="background:#d5b893; transform:translate(-50%,-50%);"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full" style="background:#d5b893; transform:translate(30%,30%);"></div>
    </div>
    <div class="max-w-4xl mx-auto px-6 text-center relative">
        <h2 class="text-4xl font-bold font-display text-white mb-4">Siap Bergabung?</h2>
        <p class="text-lg mb-8" style="color:rgba(255,255,255,0.8);">Daftarkan diri sekarang dan nikmati akses penuh ke ribuan koleksi buku digital kami — gratis untuk pelajar.</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="{{ route('register') }}"
               class="px-8 py-3 rounded-lg font-medium text-sm transition-all duration-200 hover:-translate-y-1"
               style="background:#d5b893; color:#2c1a0e;">
                Daftar Sekarang
            </a>
            <a href="{{ route('login') }}"
               class="px-8 py-3 rounded-lg font-medium text-sm border-2 border-white text-white transition-all duration-200 hover:bg-white hover:-translate-y-1"
               class="px-8 py-3 rounded-lg font-medium text-sm border-2 border-white text-white transition-all duration-200 hover:bg-white hover:text-gray-900 hover:-translate-y-1">
                Sudah Punya Akun? Masuk
            </a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════ FOOTER ═══════════════════════════ -->
<footer style="background-color:#632024;" class="text-white">
    <div class="max-w-7xl mx-auto px-6 py-14">
        <div class="grid md:grid-cols-3 gap-10">
            <!-- Brand -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:rgba(213,184,147,0.2);">
                        <svg class="w-4 h-4" fill="#d5b893" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <span class="font-display text-lg font-bold" style="color:#d5b893;">BiblioNusa</span>
                </div>
                <p class="text-sm leading-relaxed" style="color:rgba(255,255,255,0.65);">
                    Sistem perpustakaan online modern yang menghubungkan pembaca dengan koleksi buku berkualitas.
                </p>
            </div>

            <!-- Links -->
            <div>
                <h4 class="font-semibold mb-4" style="color:#d5b893;">Navigasi</h4>
                <ul class="space-y-2 text-sm" style="color:rgba(255,255,255,0.65);">
                    <li><a href="#" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="#fitur" class="hover:text-white transition">Fitur</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-white transition">Masuk</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition">Daftar</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-semibold mb-4" style="color:#d5b893;">Kontak</h4>
                <ul class="space-y-2 text-sm" style="color:rgba(255,255,255,0.65);">
                    <li>📧 info@biblionusa.id</li>
                    <li>📞 (021) 1234-5678</li>
                    <li>🕐 Senin – Jumat, 08.00–16.00</li>
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-6 flex flex-col md:flex-row items-center justify-between gap-3 text-sm" style="border-top:1px solid rgba(213,184,147,0.2); color:rgba(255,255,255,0.45);">
            <span>© {{ date('Y') }} BiblioNusa. Hak cipta dilindungi.</span>
            <span>Dibuat dengan ❤️ untuk para pembaca Indonesia</span>
        </div>
    </div>
</footer>

</body>
</html>