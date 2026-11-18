<header class="site-header">
    <nav class="nav wrap" aria-label="Hlavná navigácia">
        <a class="brand" href="index.html"><img class="brand-logo" src="{{asset('/image/logo.png')}}" alt="SmartLab UCM &amp; Trnava"></a>
        <div class="links" id="site-links">
        <a class="{{ request()->routeIs('home') ? 'is-active' : '' }} font-semibold" href="{{route('home')}}" aria-current="page">Domov</a>
        <a class="{{ request()->routeIs('about') ? 'is-active' : '' }} font-semibold" href="{{route('about')}}">O SmartLabe</a>
        <a class="{{ request()->routeIs('aktualits') ? 'is-active' : '' }} font-semibold" href="{{route('aktualits')}}">Aktuality</a>
        <a href="{{route('projekts')}}" class="{{ request()->routeIs('projekts') ? 'is-active' : '' }} font-semibold">Projekty</a>
        <a class="{{ request()->routeIs('podujatia') ? 'is-active' : '' }} font-semibold" href="{{route('podujatia')}}">Podujatia</a>
        <a class="{{ request()->routeIs('partneri') ? 'is-active' : '' }} font-semibold" href="{{route('partneri')}}">Partneri</a>
        <a class="{{ request()->routeIs('kontakt') ? 'is-active' : '' }} font-semibold" href="{{route('kontakt')}}">Kontakt</a>
        <a class="{{ request()->routeIs('studenti') ? 'is-active' : '' }} font-semibold" href="{{route('studenti')}}">Študenti</a>
        <a class="links-login" href="{{route('login')}}">Prihlásiť</a>
        </div>
        <a class="btn btn-ink btn-small btn-login" href="{{route('login')}}">Prihlásiť</a>
        <button class="menu-button" type="button" aria-label="Otvoriť menu" aria-expanded="false" aria-controls="site-links">☰</button>
    </nav>
</header>

<!-- <header
    class="
        hero-header absolute top-0 left-0 z-50 w-full 
        transition-colors duration-500"
    >
    <div class="
        relative
        flex justify-between
        items-center
        py-3
        px-10
    ">

        <div class="flex gap-5">
            <div class="relative flex items-center gap-2 pl-1">
                <div class="w-[168px] rounded  p-2">
                    <img src="{{asset('image/header/logo_smartlabu.png')}}" alt="" class="w-full h-full">
                </div>
            </div>


            <nav class="flex">
                <div class="
                    flex
                    items-center gap-8
                ">
                    <div class="flex gap-2 items-center">
                        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                        <a href=""
                        class="
                                relative
                                overflow-hidden
                                py-1
                                font-medium
                                text-black
                                hover:underline
                        "
                        >Úvod</a>
                    </div>

                    <div class="flex gap-2 items-center">
                        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                        <a href=""
                        class="
                                relative
                                overflow-hidden
                                py-1
                                font-medium
                                text-black
                                hover:underline
                        "
                        >O SmartLabe</a>
                    </div>


                    <div class="flex gap-2 items-center">
                        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                        <a href=""
                        class="
                                relative
                                overflow-hidden
                                py-1
                                font-medium
                                text-black
                                hover:underline
                        "
                        >Novinky pre Vás</a>
                    </div>
                    
                    <div class="flex gap-2 items-center">
                        <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                        <a href=""
                        class="
                                relative
                                overflow-hidden
                                py-1
                                font-medium
                                text-black
                                hover:underline
                        "
                        >Naši partneri</a>
                    </div>

                    
                </div>
            </nav>
        </div>

        
        <div class="flex justify-end">
            <button class="flex gap-2 items-center bg-[#8D2F93]/85 px-6 py-3 rounded-full text-white font-medium text-sm">
                <span>Zapoj sa do projektu</span>
            </button>
        </div>
    </div>
</header> -->