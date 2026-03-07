@extends('penyewa.layouts.app')

@section('content')
    @include('penyewa.layouts.hero')

    <section id="daftar-kamar" class="py-16 max-w-7xl mx-auto px-4 sm:px-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 gap-6">
            <div class="max-w-2xl text-left">
                <h2 class="text-3xl md:text-4xl font-black text-primary tracking-tighter mb-3">
                    Rekomendasi Terbaik Untukmu<span class="text-primary/20">.</span>
                </h2>
                <p class="text-base md:text-lg text-slate-500 font-medium">
                    Berdasarkan fasilitas terlengkap dan lokasi paling strategis dekat kampus UPN.
                </p>
            </div>

            <div class="flex gap-3 w-full md:w-auto">
                <button class="flex-1 md:flex-none px-5 py-3 bg-white border border-slate-200 rounded-2xl font-bold text-primary shadow-sm hover:border-slate-300 hover:shadow-lg transition-all active:scale-95 text-sm flex items-center gap-2">
                    <i class="fas fa-star text-yellow-500"></i> Rating
                </button>
                <button class="flex-1 md:flex-none px-5 py-3 bg-white border border-slate-200 rounded-2xl font-bold text-primary shadow-sm hover:border-slate-300 hover:shadow-lg transition-all active:scale-95 text-sm flex items-center gap-2">
                    <i class="fas fa-fire text-orange-500"></i> Terbaru
                </button>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row items-center justify-between gap-6 mb-12">
            <div class="w-full lg:w-auto overflow-x-auto no-scrollbar">
                <div class="flex gap-3">
                    @foreach ($categories as $cat)
                        <a href="#"
                            class="bg-white border border-2 border-slate-300/80 text-slate-500 text-black px-7 py-3.5 rounded-2xl shadow-sm hover:border-primary/60 hover:text-primary hover:shadow-xl transition min-w-max text-sm font-bold flex items-center justify-center">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="w-full lg:w-[500px]">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none z-10">
                        <i class="fas fa-search text-slate-400 group-focus-within:text-primary transition-colors duration-300 text-sm"></i>
                    </div>

                    <input type="text"
                        placeholder="Cari fasilitas..."
                        class="w-full pl-12 pr-36 py-3.5 bg-white border border-slate-300/80 rounded-2xl shadow-sm focus:outline-none focus:ring-4 focus:ring-primary/6 focus:border-primary transition-all duration-300 font-medium text-slate-700 placeholder:text-slate-400 text-sm">

                    <div class="absolute inset-y-1.5 right-1.5 flex items-center">
                        <button class="h-full w-30 px-8 bg-primary text-white text-sm font-bold rounded-xl hover:bg-primary/90 transition-all duration-300">
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach ($rooms as $index => $room)
                @if($index == 8)
                    @break
                @endif

                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/50 flex flex-col group">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/room_types/'. $room->roomType->image) }}" alt="Kamar {{ $room->roomType->name }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                        <div class="absolute top-3 left-3 right-3 flex justify-between items-start">
                            <span class="text-[10px] font-black px-2 py-1 bg-white/90 backdrop-blur text-primary rounded-lg shadow-sm uppercase tracking-wider">
                                {{ $room->roomType->name }}
                            </span>

                            <span class="text-[10px] font-black px-2 py-1 {{ $room->gender_type == 'Putra' ? 'bg-primary' : 'bg-pink-500' }} text-white rounded-lg shadow-sm uppercase tracking-wider">
                                {{ $room->gender_type }}
                            </span>
                        </div>
                    </div>

                    <div class="p-5 flex flex-col flex-grow">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-bold text-secondary">No. {{ $room->room_number }}</h3>
                            <span class="text-yellow-500 font-bold text-md flex items-center gap-1">
                                <i class="fas fa-star text-md"></i> {{ $room->rating }}
                            </span>
                        </div>

                        <div class="mt-2 mb-4">
                            <p class="text-xs font-black text-primary/60 text-surface0 uppercase tracking-widest mb-0.5 text-left">Harga Sewa</p>
                            <span class="text-primary font-extrabold text-xl">
                                Rp {{ number_format($room->price) }}
                            </span>
                            <span class="text-slate-600 text-md font-semibold">/bln</span>
                        </div>

                        <div class="mt-auto pt-2">
                            <a href="{{ route('kamar.show', $room->id) }}"
                            class="block text-center bg-primary text-white hover:bg-primary-dark py-2.5 rounded-xl font-black text-sm transition-all duration-200 hover:scale-105 active:scale-95 shadow-lg shadow-blue-100/50">
                            Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($rooms->count() > 8)
            <div class="mt-16 text-center">
                <a href="/all-rooms"
                    class="inline-flex items-center gap-2 px-12 py-4 bg-white border-2 border-primary text-primary font-black rounded-2xl hover:bg-primary hover:text-white transition-all duration-300 shadow-xl shadow-primary/10 group active:scale-95">
                    Tampilkan Semua Kamar
                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        @endif
    </section>

    @include('penyewa.layouts.about')

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
@endsection
