@extends('layouts.app')

@section('content')
    @include('components.hero')

    {{-- @include('components.promo-carousel') --}}

    <section id="daftar-kamar" class="py-16 max-w-7xl mx-auto px-4 sm:px-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-6">
            <div class="max-w-2xl text-left">
                <h2 class="text-3xl md:text-4xl font-black text-secondary tracking-tight mb-3">
                    Rekomendasi <span class="text-primary underline decoration-blue-100 underline-offset-8">Terbaik</span> Untukmu
                </h2>
                <p class="text-base md:text-lg text-surface0 font-medium">
                    Berdasarkan fasilitas terlengkap dan lokasi paling strategis dekat kampus UPN.
                </p>
            </div>

            <div class="flex gap-2 w-full md:w-auto">
                <button class="flex-1 md:flex-none px-4 py-2.5 bg-white border border-gray-100 rounded-xl font-bold text-secondary shadow-sm hover:shadow-md transition-all active:scale-95 text-sm md:text-md flex items-center gap-2">
                    <i class="fas fa-star text-yellow-400 text-lg"></i> Rating
                </button>
                <button class="flex-1 md:flex-none px-4 py-2.5 bg-white border border-gray-100 rounded-xl font-bold text-secondary shadow-sm hover:shadow-md transition-all active:scale-95 text-sm md:text-md flex items-center gap-2">
                    <i class="fas fa-fire text-orange-500 text-lg"></i> Terbaru
                </button>
            </div>

            
        </div>

        <div class="mb-10">
            <div class="flex gap-3 overflow-x-auto pb-4 no-scrollbar">
                @foreach ($categories as $cat)
                    <a href="#"
                        class="bg-white border border-gray-200 text-secondary px-6 py-2.5 rounded-xl shadow-sm hover:border-primary hover:text-primary transition min-w-max text-sm font-bold">
                        {{ $cat->name }}
                    </a>
                @endforeach
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
                            <p class="text-[10px] font-black text-surface0 uppercase tracking-widest mb-0.5 text-left">Harga Sewa</p>
                            <span class="text-primary font-extrabold text-xl">
                                Rp {{ number_format($room->price) }}
                            </span>
                            <span class="text-slate-600 text-md font-semibold">/bln</span>
                        </div>

                        <div class="mt-auto pt-2">
                            <a href="/rooms/{{ $room->id }}"
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
        </div>
    </section>

    @include('components.about')

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
@endsection
