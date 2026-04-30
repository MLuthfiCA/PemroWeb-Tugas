<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ReadSpace Library Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        burgundy: {
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            500: '#800020',
                            600: '#630330',
                            900: '#4c0519',
                        },
                        maroon: '#630330',
                        rose: {
                            gold: '#E7C0B7',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --glass: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.5);
            --burgundy: #800020;
            --maroon: #630330;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(135deg, #FFFDF5 0%, #F3E5D8 100%);
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
            color: #2D1B1E;
        }

        .glass-panel {
            background: var(--glass);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(128, 0, 32, 0.1); border-radius: 10px; }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Background Elements -->
    <div class="fixed inset-0 pointer-events-none z-[-1] overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-orange-50 opacity-50 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-[#EBD8C1] opacity-30 blur-[120px]"></div>
        <div class="absolute top-[20%] right-[10%] w-[30%] h-[30%] rounded-full bg-amber-50 opacity-40 blur-[100px]"></div>
    </div>

    @include('admin.components.navbar')

    <div class="flex-grow pt-24 transition-all duration-300">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>

    <footer class="bg-[#d5b893] text-white pt-12 pb-6 mt-10">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

            {{-- LOGO --}}
            <div>
                <img src="{{ asset('images/readspace-library.png') }}" 
                     alt="Logo Readspace" 
                     class="h-16 mb-4">
                <p class="text-sm text-white/80 leading-relaxed">
                    A digital library platform to make it easier for students to search and borrow books efficiently.
                </p>
            </div>

            {{-- ABOUT --}}
            <div>
                <h4 class="font-semibold text-lg mb-3">Readspace</h4>
                <ul class="space-y-2 text-sm text-white/80">
                    <li><a href="#" class="hover:text-[#d5b893] transition">About Us</a></li>
                    <li><a href="#" class="hover:text-[#d5b893] transition">Book Catalog</a></li>
                    <li><a href="#" class="hover:text-[#d5b893] transition">Contact</a></li>
                </ul>
            </div>

            {{-- ADDRESS --}}
            <div>
                <h4 class="font-semibold text-lg mb-3">Address</h4>
                <p class="text-sm text-white/80 leading-relaxed">
                    Politeknik Negeri Batam <br>
                    Ahmad Yani Street, Batam City <br>
                    Kepulauan Riau, Indonesia
                </p>
            </div>

            {{-- SOCIAL MEDIA --}}
            <div>
                <h4 class="font-semibold text-lg mb-3">Follow Us</h4>

                <div class="flex space-x-4 mt-3">

                    {{-- Instagram --}}
                    <a href="#" class="p-2 bg-white/10 rounded-full hover:bg-[#d5b893] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.75 2C4.678 2 2 4.678 2 7.75v8.5C2 19.322 4.678 22 7.75 22h8.5C19.322 22 22 19.322 22 16.25v-8.5C22 4.678 19.322 2 16.25 2h-8.5zm0 2h8.5C18.216 4 20 5.784 20 7.75v8.5c0 1.966-1.784 3.75-3.75 3.75h-8.5C5.784 20 4 18.216 4 16.25v-8.5C4 5.784 5.784 4 7.75 4zm8.25 1a1 1 0 100 2 1 1 0 000-2zM12 7a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6z"/>
                        </svg>
                    </a>

                    {{-- Facebook --}}
                    <a href="#" class="p-2 bg-white/10 rounded-full hover:bg-[#d5b893] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12a10 10 0 10-11.563 9.875v-6.987H8.078V12h2.359V9.797c0-2.325 1.392-3.607 3.523-3.607.997 0 2.04.178 2.04.178v2.245h-1.149c-1.133 0-1.486.704-1.486 1.426V12h2.527l-.404 2.888h-2.123v6.987A10.002 10.002 0 0022 12z"/>
                        </svg>
                    </a>

                    {{-- Twitter/X --}}
                    <a href="#" class="p-2 bg-white/10 rounded-full hover:bg-[#d5b893] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2H21l-6.56 7.49L22 22h-6.828l-5.35-6.993L3.64 22H1l7.02-8.01L2 2h6.828l4.86 6.36L18.244 2zm-2.396 18h1.885L7.103 4H5.07l10.778 16z"/>
                        </svg>
                    </a>

                    {{-- Email --}}
                    <a href="#" class="p-2 bg-white/10 rounded-full hover:bg-[#d5b893] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 12H8m8 0l-4 4m4-4l-4-4m8 8V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12"/>
                        </svg>
                    </a>

                </div>
            </div>

        </div>

        {{-- COPYRIGHT --}}
        <div class="border-t border-white/20 mt-10 pt-6 text-center text-sm text-white/60">
            © {{ date('Y') }} Readspace Library. All rights reserved.
        </div>

    </div>
</footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </div>
</body>
</html>
