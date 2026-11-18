<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SmartLab')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.getItem('sidebar-collapsed') === 'true') {
            document.documentElement.classList.add('sidebar-collapsed');
        }
    </script>

    <style>
        .sidebar-collapsed #sidebar {
            width: 4rem;
        }

        .sidebar-text {
            transition: opacity 200ms ease, transform 200ms ease;
            white-space: nowrap;
        }

        .sidebar-collapsed .sidebar-text {
            opacity: 0;
            transform: translateX(-6px);
            pointer-events: none;
        }

        .sidebar-collapsed .user-block {
            justify-content: center;
        }

        .sidebar-collapsed .user-text {
            display: none;
        }
        

        #sidebar {
            transition: width 300ms ease;
        }
    </style>
</head>

<body class="font-sans antialiased">

<div class="flex min-h-screen md:h-screen md:overflow-hidden">
    <aside
        id="sidebar"
        class="relative bg-white border-r border-black/10 w-52 overflow-visible shrink-0 hidden md:block">

        <div class="flex items-center justify-between h-16 px-4">
            <div class="relative user-menu w-full">
                <div class="relative flex justify-between items-center w-full hover:bg-gray-100 rounded-md transition cursor-pointer p-2" onclick="toggleUserMenu()">

                    <div class="flex gap-3 items-center user-block cursor-pointe pl-1">
                        <div class="hidden rounded-sm bg-gray-100 px-2 text-[14px]">
                            SH
                        </div>

                        <div class="sidebar-text user-text font-medium text-[14px]">
                            Stanislav H
                        </div>
                    </div>

                    <div class="sidebar-text whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>

                </div>
                <div id="userDropdown"
                    class="absolute left-0 top-full mt-2 w-60 bg-white border border-black/10 rounded-lg shadow-lg hidden z-50 items-center">

                    <div class="flex flex-col items-center px-4 pt-4">
                        <div class="bg-gray-100 rounded p-2 font-semibold text-sm text-black/65">
                            SH
                        </div>
                        <div class="text-sm text-black/85 font-semibold mt-2">Stanislav Hrechan</div>
                    </div>

                    <a href="">
                        <div class="flex gap-2 items-center mt-5 px-4 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-black/60 size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span class="text-sm font-regular">Nastavenia</span>
                        </div>
                    </a>
                    

                    <div class="w-full border-t border-t-black/25 mt-3"></div>

                    <div class="flex gap-2 items-center mt-3 px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="text-black/60 size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <span class="text-sm ">Stanislav Hrechan</span>
                    </div>

                    <form method="POST" action="/logout">
                        @csrf
                        <button class="flex gap-2 items-center mt-3 mb-3 px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="text-black/60 size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                            </svg>
                            <span class="text-sm ">Odhlásiť sa</span>
                        </button>
                    </form>

                </div>
            </div>
            

            <button
                onclick="toggleSidebar()"
                class="absolute top-1/2 -right-5 -translate-y-1/2 group"
            >
                <div class="relative w-6 h-6 flex items-center justify-center">

                    <div
                        id="bar"
                        class="w-[2px] h-6 bg-black/60 rounded-full transition-all duration-300 group-hover:opacity-0 group-hover:scale-y-50"
                    ></div>

                    <div
                        id="arrow"
                        class="absolute opacity-0 scale-0 transition-all rotate-180 duration-300 group-hover:opacity-100 group-hover:scale-100 text-black/70"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>

                </div>
            </button>

        </div>

        @if(auth()->user()->utype === 'ADM')
            <x-admin.admin-nav/>
        @endif

    </aside>

    
    <div class="flex flex-col flex-1 min-w-0">
        <x-dashboard.header/>

        <main class="flex-1 px-5 mt-5">
            @yield('content')
            @if(session('success'))
                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 5000)"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-2"
                    class="absolute flex gap-2 bottom-3 left-1/2 -translate-x-1/2 bg-black/65 px-4 py-2 rounded text-white text-sm font-medium shadow-lg"
                >   
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 text-green-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>

                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 5000)"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-2"
                    class="absolute flex gap-2 bottom-3 left-1/2 -translate-x-1/2 bg-black/65 px-4 py-2 rounded text-white text-sm font-medium shadow-lg"
                >   
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 text-black-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>

                    {{ session('error') }}
                </div>
            @endif
        </main>
    </div>

</div>

<script>
    let collapsed = localStorage.getItem('sidebar-collapsed') === 'true';

    const sidebar = document.getElementById('sidebar');
    const arrow = document.getElementById('arrow');

    function applySidebarState() {
        document.documentElement.classList.toggle('sidebar-collapsed', collapsed);

        sidebar.classList.toggle('w-16', collapsed);
        sidebar.classList.toggle('w-52', !collapsed);

        arrow.classList.toggle('rotate-180', !collapsed);
    }

    function toggleSidebar() {
        collapsed = !collapsed;
        localStorage.setItem('sidebar-collapsed', collapsed);
        applySidebarState();
    }

    document.addEventListener('DOMContentLoaded', applySidebarState);
</script>

<script>
    function toggleUserMenu() {
        const menu = document.getElementById('userDropdown');
        menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function (e) {
        const menu = document.getElementById('userDropdown');
        const trigger = document.querySelector('.user-menu');

        if (!trigger.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>


<script>
    function toggleMobileSidebar(forceState) {
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('mobileSidebarOverlay');
        const button = document.getElementById('mobileMenuButton');

        if (!sidebar || !overlay || !button) return;

        const isOpen = !sidebar.classList.contains('-translate-x-full');
        const shouldOpen = typeof forceState === 'boolean'
            ? forceState
            : !isOpen;

        sidebar.classList.toggle('-translate-x-full', !shouldOpen);
        sidebar.classList.toggle('invisible', !shouldOpen);

        overlay.classList.toggle('opacity-0', !shouldOpen);
        overlay.classList.toggle('invisible', !shouldOpen);

        sidebar.setAttribute('aria-hidden', String(!shouldOpen));
        sidebar.inert = !shouldOpen;

        button.setAttribute('aria-expanded', String(shouldOpen));
        document.body.classList.toggle('overflow-hidden', shouldOpen);
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            toggleMobileSidebar(false);
        }
    });

    document.querySelectorAll('#mobileSidebar a').forEach(link => {
        link.addEventListener('click', () => {
            toggleMobileSidebar(false);
        });
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            toggleMobileSidebar(false);
        }
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/Draggable.min.js"></script>

</body>
</html>