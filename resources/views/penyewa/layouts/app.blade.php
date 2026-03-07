<!DOCTYPE html>
<html lang="id" class="scroll-smooth scroll-pt-24">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Griya Asri Kos | Hunian Eksklusif Mahasiswa' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-surface font-sans antialiased text-slate-900 selection:bg-primary selection:text-white">

    <nav x-data="{ activeSection: 'beranda' }"
        @scroll.window="
            let scrollPos = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollPos < 600) activeSection = 'beranda';
            else if (scrollPos >= 600 && scrollPos < 1400) activeSection = 'cari-kamar';
            else if (scrollPos >= 1400) activeSection = 'about';"
        class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 shadow-sm shadow-slate-200/20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">

                <div class="flex-shrink-0">
                    <a href="/" class="text-2xl font-black text-primary tracking-tighter italic flex items-center gap-2">
                        <span class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center not-italic shadow-lg shadow-primary/20">
                            <i class="fas fa-home text-white text-xs"></i>
                        </span>
                        Griya Asri Kos
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <div class="flex items-center space-x-6">
                        <a href="{{ route('home') }}"
                        @click="activeSection = 'beranda'"
                        :class="activeSection === 'beranda' && !{{ request()->is('profile') ? 'true' : 'false' }} ? 'text-primary border-b-2 border-primary pb-1' : 'text-slate-500 hover:text-primary'"
                        class="text-sm font-bold transition-all">Beranda</a>

                        <a href="/#daftar-kamar"
                        @click="activeSection = 'cari-kamar'"
                        :class="activeSection === 'cari-kamar' && !{{ request()->is('profile') ? 'true' : 'false' }} ? 'text-primary border-b-2 border-primary pb-1' : 'text-slate-500 hover:text-primary'"
                        class="text-sm font-bold transition-all">Kamar</a>

                        <a href="/#about"
                        @click="activeSection = 'about'"
                        :class="activeSection === 'about' && !{{ request()->is('profile') ? 'true' : 'false' }} ? 'text-primary border-b-2 border-primary pb-1' : 'text-slate-500 hover:text-primary'"
                        class="text-sm font-bold transition-all">Tentang</a>
                    </div>

                    @auth
                        <div class="flex items-center gap-5 pl-4 border-l border-gray-100">
                            <div class="text-right">
                                <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest leading-none">Mahasiswa</p>
                                <p class="text-sm font-bold text-primary">{{ Auth::user()->nickname }}</p>
                            </div>
                            <a href="{{ route('profile') }}"
                            class="w-11 h-11 rounded-2xl flex items-center justify-center transition-all shadow-inner group
                            {{ request()->is('profile') ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'bg-slate-100 text-primary hover:bg-primary hover:text-white' }}">
                                <i class="fas fa-user-graduate text-lg"></i>
                            </a>
                        </div>
                    @else
                        <div class="flex items-center gap-6">
                            <a href="{{ route('login') }}" class="text-sm font-bold text-slate-600 hover:text-primary transition-colors">Masuk</a>
                            <a href="{{ route('register') }}" class="bg-primary text-white px-7 py-3 rounded-xl font-bold text-sm shadow-xl shadow-primary/10 hover:bg-primary/90 hover:ring-4 hover:ring-primary/10 transition-all active:scale-95">
                                Daftar Sekarang
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-primary text-white pt-16 pb-8 rounded-t-4xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

                <div class="lg:col-span-1">
                    <h3 class="text-2xl font-black mb-6 italic">Griya Asri Kos.</h3>
                    <p class="text-blue-100 text-sm font-medium leading-relaxed mb-6">
                        Solusi hunian modern untuk mahasiswa kreatif. Kami percaya kenyamanan adalah awal dari setiap prestasi besar.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center hover:bg-white/20 transition-all text-lg">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center hover:bg-white/20 transition-all text-lg">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center hover:bg-white/20 transition-all text-lg">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center hover:bg-white/20 transition-all text-lg">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-black mb-6 uppercase tracking-widest text-blue-200">Navigasi</h4>
                    <ul class="space-y-4 font-bold text-sm">
                        <li><a href="/" class="hover:text-blue-200 transition-all">Beranda</a></li>
                        <li><a href="#daftar-kamar" class="hover:text-blue-200 transition-all">Kamar</a></li>
                        <li><a href="#" class="hover:text-blue-200 transition-all">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-blue-200 transition-all">Syarat & Ketentuan</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-black mb-6 uppercase tracking-widest text-blue-200">Kebijakan</h4>
                    <ul class="space-y-4 font-bold text-sm">
                        <li><a href="#" class="hover:text-blue-200 transition-all">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-blue-200 transition-all">Peraturan Kos</a></li>
                        <li><a href="#" class="hover:text-blue-200 transition-all">Prosedur Booking</a></li>
                        <li><a href="#" class="hover:text-blue-200 transition-all">Bantuan Pelanggan</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-black mb-6 uppercase tracking-widest text-blue-200">Hubungi Kami</h4>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-blue-200"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase text-blue-200 mb-1 tracking-widest">Email Support</p>
                                <p class="font-bold text-sm text-white">griyakos@gmail.com</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone-alt text-blue-200"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase text-blue-200 mb-1 tracking-widest">WhatsApp Admin</p>
                                <p class="font-bold text-sm text-white">+62 895 0239 0206</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 text-blue-200 font-bold text-[10px] uppercase tracking-[0.2em]">
                <p>&copy; 2026 Griya Asri Kos Surabaya. All rights reserved.</p>
                <p>Made for Mahasiswa Surabaya</p>
            </div>
        </div>
    </footer>

</body>
</html>
