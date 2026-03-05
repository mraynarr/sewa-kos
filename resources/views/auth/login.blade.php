@extends('layouts.auth', ['title' => 'Masuk'])

@section('content')
<div class="flex min-h-screen">
    <div class="hidden lg:flex lg:w-1/2 bg-primary relative overflow-hidden items-center justify-center">
        <div class="absolute inset-0 bg-black/20 z-10"></div>
        <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?auto=format&fit=crop&q=80&w=1200"
             class="absolute inset-0 w-full h-full object-cover" alt="Interior Kos">

        <div class="relative z-20 text-white p-12 max-w-lg">
            <h1 class="text-5xl font-black leading-tight mb-6 italic">Griya Asri Kos.</h1>
            <p class="text-xl font-medium text-blue-100 italic">"Kenyamanan hunian adalah awal dari setiap prestasi besar mahasiswa."</p>
            <div class="mt-12 flex items-center gap-4 bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/20">
                <div class="w-12 h-12 bg-yellow-400 rounded-2xl flex items-center justify-center text-2xl">⭐</div>
                <div>
                    <p class="font-black text-white">Rating 4.9/5.0</p>
                    <p class="text-xs text-blue-100 font-bold uppercase tracking-widest">Dari 100+ Mahasiswa UPN</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
        <div class="max-w-md w-full">
            <div class="mb-10 text-center lg:text-left">
                <a href="/" class="inline-block mb-8 text-primary font-black text-xl lg:hidden">Griya Asri Kos.</a>
                <h2 class="text-4xl font-black text-secondary tracking-tight mb-3">Selamat Datang!</h2>
                <p class="text-surface0 font-medium italic italic">Silakan masuk untuk mengelola pesanan kamar Anda.</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-black uppercase tracking-[0.2em] text-surface0 mb-2 ml-1">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" required
                               class="w-full pl-11 pr-4 py-4 bg-gray-50 border-2 border-transparent focus:border-primary focus:bg-white rounded-2xl transition-all font-bold outline-none"
                               placeholder="nama@student.upnjatim.ac.id">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-black uppercase tracking-[0.2em] text-surface0 mb-2 ml-1">Kata Sandi</label>
                    <div class="relative" x-data="{ show: false }">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input :type="show ? 'text' : 'password'" name="password" required
                               class="w-full pl-11 pr-12 py-4 bg-gray-50 border-2 border-transparent focus:border-primary focus:bg-white rounded-2xl transition-all font-bold outline-none"
                               placeholder="••••••••">
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-primary">
                            <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex ms-2 items-center gap-2 cursor-pointer group">
                        <input type="checkbox" class="w-5 h-5 rounded-lg border-2 border-gray-200 text-primary focus:ring-primary cursor-pointer">
                        <span class="text-sm font-bold text-surface0 group-hover:text-secondary transition-colors italic italic">Ingat Saya</span>
                    </label>
                    <a href="#" class="text-sm font-black text-primary hover:text-primary-dark transition-colors italic italic">Lupa Sandi?</a>
                </div>

                <button type="submit"
                        class="w-full bg-primary text-white py-4 rounded-2xl font-black text-lg shadow-xl shadow-blue-100 hover:bg-primary-dark hover:-translate-y-1 transition-all active:scale-95">
                    Masuk Sekarang
                </button>

                <div class="mt-8">
                    <div class="relative flex items-center justify-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span class="flex-shrink mx-4 text-gray-400 text-sm font-black uppercase tracking-widest">Atau masuk dengan</span>
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

                <p class="text-center text-surface0 font-bold text-sm">
                    Belum punya akun?
                    <a href="/register" class="text-primary hover:underline ml-1 italic italic">Daftar di sini</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
