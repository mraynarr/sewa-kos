    @extends('penyewa.layouts.app')

    @section('content')
        <div class="pt-8 pb-20 px-16 bg-slate-100">

            <div class="mb-5">
                <a href="{{ route('home') }}#daftar-kamar" class="text-primary hover:text-slate-950 flex items-center font-bold text-lg group transition-all">
                    <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>

                    <span class="hover:underline underline-offset-8 decoration-2">
                        Kembali ke Daftar Kamar
                    </span>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                <div class="lg:col-span-2 space-y-8">

                    <div class="relative rounded-[40px] overflow-hidden shadow-2xl h-[450px] border-8 border-white">
                        <img src="{{ asset('images/room_types/' . $room->roomType->image) }}"
                            class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                        <div class="absolute top-6 left-6 flex gap-3">
                            <span class="bg-white/90 backdrop-blur-md px-5 py-2 rounded-2xl text-primary font-black text-[10px] uppercase tracking-[0.2em] shadow-xl">
                                {{ $room->roomType->name }}
                            </span>
                            <span class="px-5 py-2 {{ $room->gender_type == 'Putra' ? 'bg-primary' : 'bg-pink-500' }} text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] shadow-xl">
                                <i class="fas fa-user-group mr-2"></i>{{ $room->gender_type }}
                            </span>
                        </div>
                    </div>

                    <div class="bg-white p-10 rounded-[40px] shadow-sm border border-slate-100">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-3xl font-black text-slate-800 tracking-tight italic">Kamar {{ $room->room_number }}</h1>
                            <div class="flex items-center gap-2 bg-yellow-50 px-4 py-2 rounded-2xl border border-yellow-100">
                                <i class="fas fa-star text-yellow-500"></i>
                                <span class="font-black text-yellow-700">{{ $room->rating }}</span>
                            </div>
                        </div>

                        <p class="text-slate-600 font-semibold leading-relaxed text-md mb-10 italic">
                            "{{ $room->roomType->description }}"
                        </p>

                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-2 h-6 bg-blue-500 rounded-full"></div>
                            <h3 class="text-xl font-extrabold text-slate-800 tracking-tight">Fasilitas Kamar</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-y-6 gap-x-4">
                            @php $facilities = explode(',', $room->facilities); @endphp
                            @foreach ($facilities as $item)
                                <div class="flex items-center gap-3 group">
                                    <div class="w-6 h-6 bg-blue-50 rounded-lg flex items-center justify-center transition-all duration-300 group-hover:bg-primary">
                                        <i class="fas fa-check text-[10px] text-primary group-hover:text-white"></i>
                                    </div>
                                    <span class="font-bold text-slate-600 text-[15px] tracking-tight group-hover:text-primary transition-colors">
                                        {{ trim($item) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white p-10 rounded-[40px] shadow-sm border border-slate-100">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-2 h-6 bg-primary rounded-full"></div>
                            <h3 class="text-xl font-extrabold text-slate-800 tracking-tight">Spesifikasi Kamar</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div class="flex items-center gap-4 p-5 bg-white rounded-3xl shadow-lg shadow-slate-100/50 border border-slate-300 group hover:border-primary transition-all duration-300">
                                <div class="w-12 h-12 bg-blue-50 text-primary rounded-xl flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                                    <i class="fas fa-vector-square"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest leading-none mb-1">Luas Kamar</p>
                                    <p class="text-lg font-black text-slate-800 tracking-tight">{{ $room->area_size }} M²</p>
                                    <p class="text-[9px] font-medium text-slate-400 italic">(PxL)</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 p-5 bg-white rounded-3xl shadow-lg shadow-slate-100/50 border border-slate-300 group hover:border-yellow-500 transition-all duration-300">
                                <div class="w-12 h-12 bg-yellow-50 text-yellow-500 rounded-xl flex items-center justify-center text-xl group-hover:bg-yellow-500 group-hover:text-white transition-colors duration-300">
                                    <i class="fas fa-bolt-lightning"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest leading-none mb-1">Sistem Listrik</p>
                                    <p class="text-lg font-black text-slate-800 tracking-tight">{{ $room->is_electric_included ? 'Termasuk' : 'Token' }}</p>
                                    <p class="text-[9px] font-medium text-slate-400 italic">(Mandiri)</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 p-5 bg-white rounded-3xl shadow-lg shadow-slate-100/50 border border-slate-300 group hover:border-blue-400 transition-all duration-300">
                                <div class="w-12 h-12 bg-blue-50 text-blue-400 rounded-xl flex items-center justify-center text-xl group-hover:bg-blue-400 group-hover:text-white transition-colors duration-300">
                                    <i class="fas fa-hand-holding-droplet"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest leading-none mb-1">Biaya Air</p>
                                    <p class="text-lg font-black text-slate-800 tracking-tight">{{ $room->is_water_included ? 'Gratis' : 'Berbayar' }}</p>
                                    <p class="text-[9px] font-medium text-slate-400 italic">(PDAM)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-10 rounded-[40px] shadow-sm border border-slate-100">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-2 h-6 bg-red-500 rounded-full"></div>
                            <h3 class="text-xl font-extrabold text-slate-800 tracking-tight">Peraturan Kamar</h3>
                        </div>

                        <div class="bg-red-50/50 border border-red-100 p-8 rounded-[30px] relative overflow-hidden">
                            <i class="fas fa-circle-exclamation absolute -right-4 -bottom-4 text-8xl text-red-500/5"></i>
                            <div class="prose prose-slate max-w-none">
                                <p class="text-slate-600 font-bold text-sm leading-relaxed whitespace-pre-line italic">
                                    {{ $room->room_rules }}
                                </p>
                            </div>
                        </div>
                        <p class="mt-6 text-[10px] text-slate-400 font-medium flex items-center gap-2">
                            <i class="fas fa-info-circle"></i> Pelanggaran terhadap peraturan dapat dikenakan sanksi sesuai kebijakan owner.
                        </p>
                    </div>
                </div>

                <div class="relative">
                    <div class="bg-white border border-gray-100 rounded-3xl shadow-xl p-8 sticky top-24">
                        <h3 class="text-xl font-bold text-secondary mb-6">Informasi Sewa</h3>

                        <div class="space-y-5">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label
                                        class="block text-xs font-bold text-surface0 uppercase tracking-wider mb-2">Tanggal
                                        Mulai</label>
                                    <input type="text" id="tglMulai"
                                        class="w-full bg-surface border-gray-200 rounded-xl focus:ring-blue-500 focus:border-blue-500 py-2 px-4 font-bold text-gray-800">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-bold text-surface0 uppercase tracking-wider mb-2">Tanggal
                                        Selesai</label>
                                    <input type="text" id="tglSelesai"
                                        class="w-full bg-surface border-gray-200 rounded-xl focus:ring-blue-500 focus:border-blue-500 py-2 px-4 font-bold text-gray-800">
                                </div>
                            </div>

                            <div
                                class="flex justify-between items-center bg-blue-50 px-4 py-2   rounded-2xl border border-blue-100">
                                <span class="text-blue-800 font-medium">Durasi Sewa:</span>
                                <span id="textDurasi" class="text-secondary-hover font-extrabold">0 Hari</span>
                            </div>

                            <div class="pt-3 border-t border-gray-300">
                                <h4 class="text-sm font-bold text-secondary ">Layanan Tambahan</h4>
                                <div class="-space-y-1">
                                    @foreach ($services as $service)
                                        <div class="flex items-center justify-between p-3 rounded-xl transition">
                                            <label class="flex items-center space-x-3 cursor-pointer">
                                                <input type="checkbox" class="service-checkbox w-5 h-5 rounded text-primary"
                                                    data-price="{{ $service->service_price }}"
                                                    data-type="{{ strtolower($service->duration_type) }}"
                                                    onchange="hitungTotal()">

                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-sm font-bold text-gray-800">{{ $service->service_name }}</span>
                                                    <span class="text-xs text-surface0">
                                                        Rp {{ number_format($service->service_price) }}
                                                        /{{ $service->duration_type }}
                                                    </span>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <p class="mt-3 text-[10px] text-red-500 font-medium italic">
                                    *Beberapa layanan tambahan hanya aktif minimal 7 hari sewa.
                                </p>
                            </div>

                            <div class="pt-4 border-t-2 border-dashed border-gray-300">
                                <div class="flex justify-between items-center mb-6">
                                    <div>
                                        <p class="text-gray-400 text-[10px] font-black uppercase tracking-tighter mb-3">
                                            Estimasi Total</p>
                                        <div class="flex items-baseline space-x-1">
                                            <span class="text-2xl md:text-3xl font-black text-primary">Rp</span>
                                            <span id="textTotal"
                                                class="text-2xl md:text-3xl font-black text-primary tracking-tight">0</span>
                                        </div>
                                    </div>
                                    <div class="text-right mt-6">
                                        <span class="bg-green-100 text-green-700 text-[9px] font-black px-2 py-2 rounded-full uppercase flex items-center gap-1 justify-center">
                                            <i class="fas fa-shield-alt"></i> Pasti Aman
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <button id="btnPesan" disabled class="w-full bg-primary hover:bg-primary-dark text-white font-black py-4 rounded-2xl shadow-lg transition-all active:scale-95 flex items-center justify-center gap-2 text-lg">
                                    <i class="fas fa-shopping-cart text-xl"></i> Pesan Sekarang
                                </button>

                                <a href="https://wa.me/62812345678" target="_blank" class="w-full flex items-center justify-center gap-3 border-2 border-green-500 bg-green-500 text-white font-black py-4 rounded-2xl hover:bg-green-600 transition-all active:scale-95 text-lg">
                                    <i class="fab fa-whatsapp text-3xl"></i> Hubungi Owner
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function hitungTotal() {

                const daily = {{ (int) $room->roomType->base_price_daily }};
                const weekly = {{ (int) $room->roomType->base_price_weekly }};
                const monthly = {{ (int) $room->roomType->base_price_monthly }};

                const tgl1 = document.getElementById('tglMulai').value;
                const tgl2 = document.getElementById('tglSelesai').value;
                const displayTotal = document.getElementById('textTotal');
                const displayDurasi = document.getElementById('textDurasi');
                const btn = document.getElementById('btnPesan');

                if (tgl1 && tgl2) {

                    const d1 = new Date(tgl1);
                    d1.setHours(0, 0, 0, 0);

                    const d2 = new Date(tgl2);
                    d2.setHours(0, 0, 0, 0);

                    const diffTime = d2.getTime() - d1.getTime();
                    const diffDays = Math.round(diffTime / (1000 * 60 * 60 * 24));

                    if (diffDays >= 0) {
                        let hargaKamar = 0;
                        if (diffDays >= 30) {
                            hargaKamar = (Math.floor(diffDays / 30) * monthly) + ((diffDays % 30) * daily);
                        } else if (diffDays >= 7) {
                            hargaKamar = (Math.floor(diffDays / 7) * weekly) + ((diffDays % 7) * daily);
                        } else {
                            const durasiHitung = diffDays === 0 ? 1 : diffDays;
                            hargaKamar = durasiHitung * daily;
                        }

                        let totalService = 0;
                        const checkboxes = document.querySelectorAll('.service-checkbox');

                        checkboxes.forEach(cb => {
                            const price = Number(cb.getAttribute('data-price'));
                            const type = cb.getAttribute('data-type').toLowerCase();
                            const durasiHitung = diffDays <= 0 ? 1 : diffDays;

                            if (type.includes('minggu') && durasiHitung < 7) {
                                cb.checked = false;
                                cb.disabled = true;
                            } else {
                                cb.disabled = false;
                            }

                            if (cb.checked) {
                                if (type.includes('minggu')) {
                                    const jumlahMinggu = Math.floor(durasiHitung / 7);
                                    totalService += (price * jumlahMinggu);
                                } else {
                                    totalService += (price * durasiHitung);
                                }
                            }
                        });

                        const totalAkhir = hargaKamar + totalService;
                        const durasiTampil = diffDays === 0 ? 1 : diffDays;

                        if (displayTotal) displayTotal.innerText = new Intl.NumberFormat('id-ID').format(totalAkhir);
                        if (displayDurasi) displayDurasi.innerText = durasiTampil + ' Hari';
                        if (btn) btn.disabled = false;
                    } else {
                        if (displayTotal) displayTotal.innerText = "0";
                        if (displayDurasi) displayDurasi.innerText = "0 Hari";
                        if (btn) btn.disabled = true;
                    }
                }
            }

            window.onload = function() {
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('tglMulai').value = today;
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                document.getElementById('tglSelesai').value = tomorrow.toISOString().split('T')[0];

                hitungTotal();
            };
        </script>

        <style>
            .flatpickr-calendar {
                width: 350px !important;
                font-family: inherit;
                border-radius: 20px !important;
                box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1) !important;
                border: 1px solid #e5e7eb !important;
                padding: 10px;
            }

            .flatpickr-day {
                height: 45px !important;
                line-height: 45px !important;
                border-radius: 12px !important;
                font-weight: 600;
            }

            .flatpickr-day.selected {
                background: #2563eb !important;
                border-color: #2563eb !important;
            }

            .flatpickr-input {
                display: none;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const today = new Date();
                const tomorrow = new Date();
                tomorrow.setDate(today.getDate() + 1);

                const flatpickrConfig = {
                    altInput: true,
                    altFormat: "d/m/Y",
                    dateFormat: "Y-m-d",
                    minDate: "today",
                    onChange: function(selectedDates, dateStr, instance) {
                        hitungTotal();
                    }
                };

                flatpickr("#tglMulai", {
                    ...flatpickrConfig,
                    defaultDate: today
                });

                flatpickr("#tglSelesai", {
                    ...flatpickrConfig,
                    defaultDate: tomorrow
                });

                setTimeout(() => {
                    hitungTotal();
                }, 100);
            });
        </script>
    @endsection
