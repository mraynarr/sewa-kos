<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Dashboard | Griya Asri Kos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-900 text-white p-6 hidden lg:block">
            <h2 class="text-xl font-black italic mb-10">Griya Master.</h2>
            <nav class="space-y-4">
                <a href="#" class="block py-2 text-blue-400 font-bold"><i class="fas fa-chart-line mr-3"></i> Ikhtisar</a>
                <a href="#" class="block py-2 hover:text-blue-400 transition-all"><i class="fas fa-users mr-3"></i> Data Owner</a>
                <a href="#" class="block py-2 hover:text-blue-400 transition-all"><i class="fas fa-file-invoice-dollar mr-3"></i> Laporan</a>
            </nav>
        </aside>

        <main class="flex-1 p-8 md:p-12">
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h1 class="text-2xl font-black text-slate-800">Selamat Datang, {{ Auth::user()->nickname }}!</h1>
                    <p class="text-slate-500 font-medium">Panel Kendali Master Startup Griya Asri Kos.</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-50 text-red-600 px-6 py-2 rounded-xl font-bold hover:bg-red-600 hover:text-white transition-all">
                        Keluar
                    </button>
                </form>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-2">Total Pendapatan</p>
                    <h3 class="text-2xl font-black text-slate-800">Rp 0</h3>
                </div>
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-2">Total Owner</p>
                    <h3 class="text-2xl font-black text-slate-800">0</h3>
                </div>
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <div class="flex items-center gap-2 text-green-500 mb-2">
                        <i class="fas fa-circle text-[8px]"></i>
                        <span class="text-[10px] font-black uppercase tracking-widest">Sistem Aktif</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-800">Server 2026</h3>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
