@extends('layouts.auth', ['title' => 'Daftar Akun'])

@section('content')
<div class="flex min-h-screen">
    <div class="hidden lg:flex lg:w-1/2 bg-secondary relative overflow-hidden items-center justify-center text-white p-12">
        <div class="relative z-10 max-w-lg">
            <h1 class="text-5xl font-black italic mb-6">Mulai Langkah Baru.</h1>
            <p class="text-xl font-medium text-gray-300 italic">"Gabung bersama 100+ mahasiswa lainnya dan temukan kenyamanan belajar yang sesungguhnya."</p>
        </div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-primary/20 rounded-full blur-3xl"></div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
        <div class="max-w-md w-full">
            <div class="mb-10">
                <h2 class="text-4xl font-black text-secondary tracking-tight mb-3">Daftar Akun</h2>
                <p class="text-surface0 font-medium italic italic">Lengkapi data diri untuk mulai melakukan booking kamar.</p>
            </div>

            <form action="#" class="space-y-5">
                <div>
                    <label class="block text-sm font-black uppercase tracking-widest text-surface0 mb-2 ml-1">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama sesuai KTP"
                           class="w-full px-5 py-4 bg-gray-50 border-2 border-transparent focus:border-primary focus:bg-white rounded-2xl transition-all font-bold outline-none">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-black uppercase tracking-widest text-surface0 mb-2 ml-1">Email Student</label>
                        <input type="email" placeholder="nama@student.upn..."
                               class="w-full px-5 py-4 bg-gray-50 border-2 border-transparent focus:border-primary focus:bg-white rounded-2xl transition-all font-bold outline-none text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-black uppercase tracking-widest text-surface0 mb-2 ml-1">No. WhatsApp</label>
                        <input type="tel" placeholder="0812..."
                               class="w-full px-5 py-4 bg-gray-50 border-2 border-transparent focus:border-primary focus:bg-white rounded-2xl transition-all font-bold outline-none text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-black uppercase tracking-widest text-surface0 mb-2 ml-1">Kata Sandi</label>
                    <input type="password" placeholder="Minimal 8 karakter"
                           class="w-full px-5 py-4 bg-gray-50 border-2 border-transparent focus:border-primary focus:bg-white rounded-2xl transition-all font-bold outline-none">
                </div>

                <button type="submit"
                        class="w-full bg-primary text-white py-4 rounded-2xl font-black text-lg shadow-xl shadow-blue-100 hover:bg-primary-dark transition-all active:scale-95 mt-4">
                    Buat Akun Sekarang
                </button>

                <div class="mt-8">
                    <div class="relative flex items-center justify-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span class="flex-shrink mx-4 text-gray-400 text-[10px] font-black uppercase tracking-widest">Atau masuk dengan</span>
                        <div class="flex-grow border-t border-gray-200"></div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-8">
                        <a href="#" class="flex items-center justify-center py-4 border-2 border-gray-100 rounded-2xl hover:bg-gray-50 hover:border-gray-200 transition-all group shadow-sm">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6 group-hover:scale-110 transition-transform" alt="Google">
                        </a>

                        <a href="#" class="flex items-center justify-center py-4 border-2 border-gray-100 rounded-2xl hover:bg-gray-50 hover:border-gray-200 transition-all group shadow-sm text-[#1877F2]">
                            <i class="fab fa-facebook text-2xl group-hover:scale-110 transition-transform"></i>
                        </a>

                        <a href="#" class="flex items-center justify-center py-4 border-2 border-gray-100 rounded-2xl hover:bg-gray-50 hover:border-gray-200 transition-all group shadow-sm text-black">
                            <i class="fab fa-apple text-2xl group-hover:scale-110 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <p class="text-center text-surface0 font-bold text-sm mt-6">
                    Sudah punya akun?
                    <a href="/login" class="text-primary hover:underline ml-1 italic italic">Masuk di sini</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
