<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Login | Griya Asri Kos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-900 font-sans antialiased flex items-center justify-center min-h-screen p-6">

    <div class="max-w-md w-full">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-2xl mb-4 border border-white/20">
                <i class="fas fa-shield-halved text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-black text-white tracking-tighter italic">Griya Asri <span class="text-blue-400">Master.</span></h1>
            <p class="text-slate-400 text-sm font-bold mt-1 uppercase tracking-widest">Startup Control Panel</p>
        </div>

        <div class="bg-white rounded-[32px] shadow-2xl overflow-hidden border border-white/10 p-8 md:p-10">
            <div class="mb-8">
                <h2 class="text-xl font-black text-slate-800">Autentikasi Master</h2>
                <p class="text-slate-500 text-xs font-bold mt-1">Silakan masuk untuk mengelola seluruh ekosistem kos.</p>
            </div>

            <form action="{{ route('admin.login.process') }}" method="POST" class="space-y-5">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-50 text-red-600 p-4 rounded-xl text-xs font-bold border border-red-100">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="space-y-1.5">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Master</label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                        class="w-full px-5 py-4 bg-slate-50 border border-slate-200 focus:border-slate-800 rounded-2xl transition-all font-bold text-slate-700 outline-none text-sm placeholder:text-slate-300"
                        placeholder="admin@griyaasri.com">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-5 py-4 bg-slate-50 border border-slate-200 focus:border-slate-800 rounded-2xl transition-all font-bold text-slate-700 outline-none text-sm"
                        placeholder="••••••••">
                </div>

                <button type="submit"
                    class="w-full bg-slate-900 text-white py-4 rounded-2xl font-black text-sm shadow-xl shadow-slate-900/20 hover:bg-black transition-all active:scale-95 mt-4">
                    Masuk ke Sistem Pusat
                </button>
            </form>
        </div>

        <p class="text-center mt-8 text-[10px] text-slate-500 font-bold uppercase tracking-widest">
            &copy; 2026 Griya Asri Startup Solution
        </p>
    </div>

</body>
</html>
