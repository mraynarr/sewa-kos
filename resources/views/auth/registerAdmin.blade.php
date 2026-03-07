<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Master Admin | Griya Asri Kos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-900 font-sans antialiased flex items-center justify-center min-h-screen p-6">

    <div class="max-w-md w-full">
        <div class="bg-white rounded-[32px] shadow-2xl overflow-hidden p-8 md:p-10 border border-white/10">
            <div class="mb-8">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h2 class="text-xl font-black text-slate-800">Registrasi Admin Master</h2>
                <p class="text-slate-500 text-xs font-bold mt-1">Pendaftaran khusus untuk tim pengembang sistem.</p>
            </div>

            <form action="{{ route('admin.register.store') }}" method="POST" class="space-y-4">
                @csrf

                <div class="space-y-1.5">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                    <input type="text" name="name" required
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 focus:border-blue-500 rounded-2xl transition-all font-bold text-slate-700 outline-none text-sm">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Panggilan</label>
                    <input type="text" name="nickname" required maxlength="15"
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 focus:border-blue-500 rounded-2xl transition-all font-bold text-slate-700 outline-none text-sm">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Master</label>
                    <input type="email" name="email" required
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 focus:border-blue-500 rounded-2xl transition-all font-bold text-slate-700 outline-none text-sm">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 focus:border-blue-500 rounded-2xl transition-all font-bold text-slate-700 outline-none text-sm"
                        placeholder="Minimal 8 karakter">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-4 rounded-2xl font-black text-sm shadow-xl shadow-blue-600/20 hover:bg-blue-700 transition-all active:scale-95 mt-4">
                    Buat Akun Master
                </button>
            </form>

            <div class="mt-8 text-center">
                <a href="{{ route('admin.login') }}" class="text-xs font-bold text-slate-400 hover:text-blue-600 transition-colors">
                    Kembali ke Login Master
                </a>
            </div>
        </div>
    </div>

</body>
</html>
