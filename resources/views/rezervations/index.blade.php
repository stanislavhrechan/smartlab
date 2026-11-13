@extends('layouts.rezervation')
@section('SmartLab')
@section('content')
<div class="relative w-screen h-screen overflow-hidden bg-[#15191b]">

    <div class="absolute inset-0">
        <img
            src="{{ asset('rezervations/rooms/1_room.webp') }}"
            alt="SmartLab Room"
            class="w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/30"></div>
    </div>

    <div class="absolute top-8 left-5 z-10 text-white">
        <h1 class="text-2xl font-semibold tracking-tight">
            SMARTLAB
        </h1>
        <p class="tracking-widest text-white/60 uppercase font-mono">
            1. poschodie UPS01
        </p>
    </div>

    <div class="absolute bottom-8 left-5 z-10">
        <div class="flex gap-2">
            <div class="w-[120px] h-[80px] bg-white">
                <img
                        src="{{ asset('rezervations/rooms/2_room.png') }}"
                        alt="SmartLab Room"
                        class="w-full h-full object-cover"
                    >
            </div>
            <div class="w-[120px] h-[80px]  bg-white">
                <img
                    src="{{ asset('rezervations/rooms/3_room.png') }}"
                    alt="SmartLab Room"
                    class="w-full h-full object-cover"
                >
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 right-8 z-20 flex items-center gap-3">

        <button
            onclick="openPanel('reservation')"
            class="h-14 px-7 rounded-full bg-emerald-500 text-white
                   flex items-center gap-3 font-medium
                   hover:bg-emerald-400 transition duration-300"
        >
            Rezervovať
        </button>

        <button
            onclick="openPanel('info')"
            class="w-14 h-14 rounded-full backdrop-blur
                   flex items-center justify-center
                   hover:scale-105 transition duration-300 bg-yellow-500 hover:bg-yellow-400"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-7 h-7 text-white"
                 fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 16v-4m0-4h.01M22 12a10 10 0 11-20 0 10 10 0 0120 0z"/>
            </svg>
        </button>

    </div>

    <div
        id="panel-overlay"
        onclick="closePanel()"
        class="fixed inset-0 z-30 bg-black/40 backdrop-blur-sm
               opacity-0 invisible transition duration-300">
    </div>

    <div
        id="side-panel"
        class="fixed top-0 right-0 z-40 h-full
               w-full sm:max-w-[620px]
               bg-white translate-x-full
               transition-transform duration-500 ease-in-out
               overflow-y-auto"
    >

        <div class="p-8 md:p-5">

            <div class="flex justify-between items-center mb-16">

                <span class="text-xs tracking-widest text-gray-400 uppercase">
                    SMARTLAB / 1. poschodie UPS01
                </span>

                <button onclick="closePanel()"
                        class="w-10 h-10 rounded-full border border-gray-200
                               flex items-center justify-center
                               hover:bg-gray-100 transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                </button>

            </div>

            <div id="info-content" class="hidden">

                {{-- Header --}}
                <div class="mb-10">

                    <h2 class="text-5xl font-semibold tracking-tight text-gray-900 leading-[1.05] mb-5">
                        SmartLab<br>
                        <span class="text-blue-300">Room 01.</span>
                    </h2>

                    <p class="text-sm text-gray-500 leading-relaxed max-w-sm">
                        Moderný priestor vytvorený pre spoluprácu,
                        vzdelávanie, workshopy a realizáciu inovatívnych nápadov.
                    </p>
                </div>

                {{-- Main image --}}
                <div class="relative w-full h-48 rounded-xl overflow-hidden mb-10">
                    <img
                        src="{{ asset('rezervations/rooms/1_room.webp') }}"
                        alt="SmartLab Room"
                        class="w-full h-full object-cover"
                    >

                    <div class="absolute bottom-3 left-3">
                        <span class="bg-white/90 backdrop-blur px-3 py-1.5 rounded-full text-[10px] uppercase tracking-wider">
                            SmartLab Space
                        </span>
                    </div>
                </div>

                {{-- Specifications --}}
                <div class="mb-10">

                    <p class="text-[11px] uppercase tracking-[0.2em] text-gray-400 mb-5">
                        Charakteristika
                    </p>

                    <div class="grid grid-cols-2 gap-3">

                        <div class="bg-gray-50 rounded-xl p-5">
                            <svg class="w-5 h-5 text-gray-400 mb-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>

                            <p class="text-3xl font-semibold text-gray-900">20</p>
                            <p class="text-xs text-gray-400 mt-1">Max. kapacita</p>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <svg class="w-5 h-5 text-gray-400 mb-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l9-5 9 5v8l-9 5-9-5V8z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l9 5 9-5M12 13v8"/>
                            </svg>

                            <p class="text-lg font-semibold text-gray-900">Meeting</p>
                            <p class="text-xs text-gray-400 mt-1">Typ priestoru</p>
                        </div>

                    </div>
                </div>

                {{-- Equipment --}}
                <div class="border-t border-gray-100 pt-7">

                    <p class="text-[11px] uppercase tracking-[0.2em] text-gray-400 mb-5">
                        Vybavenie miestnosti
                    </p>

                    <div class="space-y-4">

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Projektor</span>
                            <span class="text-sm text-green-600">Dostupné</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Wi-Fi pripojenie</span>
                            <span class="text-sm text-green-600">Dostupné</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Workshop vybavenie</span>
                            <span class="text-sm text-green-600">Dostupné</span>
                        </div>

                    </div>

                </div>

            </div>

            {{-- Reservation form --}}
            <div id="reservation-content" class="hidden">

                <h2 class="text-4xl font-semibold tracking-tight mb-3">
                    Rezervujte si priestor.
                </h2>

                <p class="text-gray-500 text-sm mb-10">
                    Vyplňte formulár a pošlite nám žiadosť o rezerváciu.
                </p>

                <form action="#" method="POST" class="space-y-6">

                    @csrf

                    <div>
                        <label class="text-sm font-medium block mb-2">
                            Meno a priezvisko
                        </label>
                        <input type="text" name="name"
                               placeholder="Vaše meno"
                               required
                               class="w-full border-b border-gray-300 py-3
                                      outline-none focus:border-black transition rounded-full px-4">
                    </div>

                    <div>
                        <label class="text-sm font-medium block mb-2">
                            E-mail
                        </label>
                        <input type="email" name="email"
                               placeholder="vas@email.sk"
                               required
                               class="w-full border-b border-gray-300 py-3
                                      outline-none focus:border-black transition rounded-full px-4">
                    </div>

                    <div>
                        <label class="text-sm font-medium block mb-2">
                            Organizácia
                        </label>
                        <input type="text" name="organization"
                               placeholder="Názov organizácie"
                               class="w-full border-b border-gray-300 py-3
                                      outline-none focus:border-black transition rounded-full px-4">
                    </div>

                    <div class="grid grid-cols-2 gap-5">

                        <div>
                            <label class="text-sm font-medium block mb-2">
                                Dátum
                            </label>
                            <input type="date" name="date" required
                                   class="w-full border-b border-gray-300 py-3
                                          outline-none focus:border-black rounded-full px-4">
                        </div>

                        <div>
                            <label class="text-sm font-medium block mb-2">
                                Počet osôb
                            </label>
                            <input type="number" name="people"
                                   min="1" max="20" required
                                   placeholder="20"
                                   class="w-full border-b border-gray-300 py-3
                                          outline-none focus:border-black rounded-full px-4">
                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-5">

                        <div>
                            <label class="text-sm font-medium block mb-2">
                                Od
                            </label>
                            <input type="time" name="start_time" required
                                   class="w-full border-b border-gray-300 py-3 rounded-full px-4">
                        </div>

                        <div>
                            <label class="text-sm font-medium block mb-2">
                                Do
                            </label>
                            <input type="time" name="end_time" required
                                   class="w-full border-b border-gray-300 py-3 rounded-full px-4">
                        </div>

                    </div>

                    <div>
                        <label class="text-sm font-medium block mb-2">
                            Účel rezervácie
                        </label>
                        <textarea name="purpose" rows="3"
                                  placeholder="Popíšte účel stretnutia..."
                                  required
                                  class="w-full border-b border-gray-300 py-3
                                         outline-none focus:border-black resize-none rounded-full px-8"></textarea>
                    </div>

                    <button type="submit"
                            class="w-full bg-emerald-600 text-white py-5
                                   rounded-full font-medium
                                   hover:bg-emerald-800 transition">
                        Odoslať žiadosť
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>
    function openPanel(type) {
        const overlay = document.getElementById('panel-overlay');
        const panel = document.getElementById('side-panel');

        document.getElementById('info-content').classList.toggle(
            'hidden', type !== 'info'
        );

        document.getElementById('reservation-content').classList.toggle(
            'hidden', type !== 'reservation'
        );

        overlay.classList.remove('invisible', 'opacity-0');
        overlay.classList.add('opacity-100');

        panel.classList.remove('translate-x-full');

        document.body.style.overflow = 'hidden';
    }

    function closePanel() {
        document.getElementById('panel-overlay')
            .classList.add('invisible', 'opacity-0');

        document.getElementById('panel-overlay')
            .classList.remove('opacity-100');

        document.getElementById('side-panel')
            .classList.add('translate-x-full');

        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closePanel();
    });
</script>

@endsection

