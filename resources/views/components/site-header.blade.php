<header class="site-header">
    <nav class="nav container" aria-label="Hlavná navigácia">
        <a class="brand" href="{{ route('home') }}">
            <img class="brand-logo" src="{{ asset('images/smartlab-logo.png') }}" alt="SmartLab UCM &amp; Trnava">
        </a>
        <div class="links" id="site-links">
            @foreach ([
                ['route' => 'home', 'label' => 'Domov'],
                ['route' => 'about', 'label' => 'O SmartLabe'],
                ['route' => 'news', 'label' => 'Aktuality'],
                ['route' => 'projects', 'label' => 'Projekty'],
                ['route' => 'events', 'label' => 'Podujatia'],
                ['route' => 'partners', 'label' => 'Partneri'],
                ['route' => 'contacts', 'label' => 'Kontakt'],
                ['route' => 'students', 'label' => 'Študenti'],
            ] as $item)
                <a class="{{ request()->routeIs($item['route']) ? 'is-active' : '' }}"
                   href="{{ route($item['route']) }}"
                   @if (request()->routeIs($item['route'])) aria-current="page" @endif>
                    {{ $item['label'] }}
                </a>
            @endforeach
            @guest
                <a class="links-login" href="{{ route('login') }}">Prihlásiť</a>
            @endguest
            @auth
                <a class="links-login" href="{{ route('dashboard') }}">Môj profil</a>
                <form class="links-logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="links-logout-button" type="submit">Odhlásiť sa</button>
                </form>
            @endauth
        </div>
        @guest
            <a class="btn btn-ink btn-small btn-login" href="{{ route('login') }}">Prihlásiť</a>
        @endguest
        @auth
            <a class="btn btn-ink btn-small btn-login" href="{{ route('dashboard') }}">Môj profil</a>
            <form class="desktop-logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-ghost btn-small" type="submit">Odhlásiť sa</button>
            </form>
        @endauth
        <button class="menu-button" type="button" aria-label="Otvoriť menu" aria-expanded="false" aria-controls="site-links">☰</button>
    </nav>
</header>
