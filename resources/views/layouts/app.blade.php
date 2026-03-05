<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Sewa Kos Mahasiswa' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css"> <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-surface font-sans antialiased">
    <nav class="bg-primary shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0">
                    <a href="/" class="text-2xl font-bold text-surface">Sewa Kos</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" class="text-surface hover:text-surface px-3 py-2 font-bold underline decoration-2 decoration-transparent hover:decoration-surface underline-offset-7">Beranda</a>

                        @auth
                            @if (Auth::user()->role == 'admin')
                                <a href="/admin/dashboard"
                                    class="text-surface hover:text-surface px-3 py-2 font-bold">Panel Admin</a>
                            @elseif(Auth::user()->role == 'owner')
                                <a href="/owner/rooms" class="text-surface hover:text-surface px-3 py-2 font-bold">Kos
                                    Saya</a>
                            @endif

                            <a href="/profile" class="bg-primary text-white px-4 py-2 rounded-lg">Profil
                                ({{ Auth::user()->name }})
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="text-surface font-bold underline decoration-2 decoration-transparent hover:decoration-surface underline-offset-7">Masuk</a>
                        <a href="{{ route('login') }" class="ml-4 bg-surface text-primary hover:text-surface hover:bg-primary-dark px-3 py-1.5 font-bold rounded-lg">Daftar</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <footer class="bg-primary text-white pt-16 pb-8 rounded-t-[60px]">
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
                        <li><a href="#daftar-kamar" class="hover:text-blue-200 transition-all">Cari Kamar</a></li>
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
                <p>Made with ❤️ for Mahasiswa Surabaya</p>
            </div>
        </div>
    </footer>

    {{-- <footer class="bg-white border-t mt-10">
        <div class="max-w-7xl mx-auto py-6 px-4 text-center text-surface0 text-sm">
            &copy; 2026 Kos Mahasiswa Professional - SDGs 8 Project
        </div>
    </footer> --}}
</body>

</html>
