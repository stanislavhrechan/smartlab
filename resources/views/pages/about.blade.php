@extends('layouts.app')

@section('title', 'O SmartLabe')
@section('body-class', 'page-about')

@section('content')
<section class="SmartLab-o_nas">
            <section class="hero-text">
                <small>SMARTLAB UCM & TRNAVA</small>
                <h1>O SmartLabe</h1>
                <p>SmartLab vznikol ako spoločná iniciatíva Univerzity sv. Cyrila a Metoda v Trnave a mesta Trnava zameraná na podporu vzdelávania, aplikovaného výskumu a spolupráce medzi akademickou sférou, verejným sektorom a odbornou praxou.</p>
            </section>
            
            <section class="SmartLab-images">
                <img src="{{ asset('images/smartlab.png') }}" alt="smartlab">
            </section>
        </section>

        <hr>

      
        <section class="SmartLab-contain">
            <small>SMARTLAB</small>
            <h2>Priestor pre nápady.</h2>
            <p class="intro-text">Jeho vznik zároveň nadväzuje na podporu študijného odboru Informatika, ktorý je Ministerstvom školstva, výskumu, vývoja a mládeže SR zaradený medzi nedostatkové študijné odbory. Cieľom SmartLabu je prispieť k rozvoju digitálnych kompetencií, zvýšeniu záujmu o štúdium informatiky a vytváraniu priestoru pre inovácie a technologický rozvoj.</p>

            <section class="grid idea-cards">
                <section class="card idea-card">
                    <h3>Čo je SmartLab?</h3>
                    <p>SmartLab je inovačný ekosystém, ktorý prepája akademickú sféru s praxou a vytvára priestor pre spoluprácu vo výskume, vzdelávaní a implementácii moderných technológií.</p>
                </section>
                
                <section class="card idea-card">
                    <h3>Inovácie</h3>
                    <p>Podporujeme kreatívne nápady a inovačné riešenia v oblasti digitálnych technológií.</p>
                </section>

                <section class="card idea-card">
                    <h3>Spolupráca</h3>
                    <p>Združujeme študentov, akademikov, firmy a samosprávu na spoločných projektoch.</p>
                </section>

                <section class="card idea-card">
                    <h3>Vzdelávanie</h3>
                    <p>Poskytujeme praktické vzdelávanie a workshopy zamerané na reálne potreby trhu.</p>
                </section>

                <section class="card idea-card">
                    <h3>Rozvoj</h3>
                    <p>Podporujeme udržateľný rozvoj a digitálnu transformáciu regiónu.</p>
                </section>
            </section>
        </section>
        

        <hr>

        <!-- Sekcia: Naše hodnoty -->
        <section class="content-section values-section">
            <small>SMARTLAB</small>
            <h2>Naše hodnoty</h2>
            <p class="intro-text">SmartLab je postavený na princípoch otvorenosti, partnerstva, kvality a spoločenskej zodpovednosti. Tieto hodnoty určujú spôsob spolupráce, výber tém aj hodnotenie aktivít, ktoré majú dlhodobý prínos pre univerzitu, verejný sektor a regionálne prostredie.</p>

            <section class="grid values-grid">
                <article class="card value-card value-card--teal">
                    <div class="value-card-content">
                        <h3>Otvorenosť</h3>
                        <p>Transparentné a predvídateľné fungovanie, ktoré podporuje medziodborovú výmenu poznatkov a prístupnosť aktivít pre definované cieľové skupiny.</p>
                    </div>
                    <img class="value-icon" src="{{ asset('images/icons/door-open.svg') }}" alt="" aria-hidden="true">
                </article>

                <article class="card value-card value-card--yellow">
                    <div class="value-card-content">
                        <h3>Partnerstvo</h3>
                        <p>Dlhodobá spolupráca založená na rovnosti, vzájomnom rešpekte a jasne vymedzených úlohách, právach a zodpovednostiach všetkých zapojených strán.</p>
                    </div>
                    <img class="value-icon" src="{{ asset('images/icons/handshake.svg') }}" alt="" aria-hidden="true">
                </article>

                <article class="card value-card value-card--blue">
                    <div class="value-card-content">
                        <h3>Kvalita</h3>
                        <p>Dôraz na odbornú úroveň, vecnú presnosť, metodickú primeranosť a dlhodobý prínos realizovaných aktivít aj ich výsledkov.</p>
                    </div>
                    <img class="value-icon" src="{{ asset('images/icons/badge-check.svg') }}" alt="" aria-hidden="true">
                </article>

                <article class="card value-card value-card--red">
                    <div class="value-card-content">
                        <h3>Spoločenská zodpovednosť</h3>
                        <p>Orientácia na verejný záujem, regionálne potreby a zodpovedné využívanie digitálnych a technologických riešení v podmienkach spoločenskej transformácie.</p>
                    </div>
                    <img class="value-icon" src="{{ asset('images/icons/users-round.svg') }}" alt="" aria-hidden="true">
                </article>
            </section>
        </section>

        <hr>
        
        <!-- Sekcia: Naše ciele -->
        <section class="content-section">
            <small>SMARTLAB</small>
            <h2>Naše ciele</h2>
            <p class="intro-text">Hlavným cieľom SmartLabu je vytvoriť a dlhodobo udržiavať stabilnú interdisciplinárnu univerzitnú platformu, ktorá prepája vzdelávacie, výskumné a aplikačné aktivity univerzity s potrebami samosprávy, verejných inštitúcií, podnikateľského sektora a občianskej spoločnosti.</p>

            <ul class="objective-list">
                <li>
                    <section>
                        <h3>Stabilná interdisciplinárna platforma spolupráce</h3>
                        <p>Vytvoriť rámec pre systematickú spoluprácu medzi študijnými programami, pracoviskami univerzity a externými partnermi pri spoločných aktivitách.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3>Prepájanie vzdelávania a výskumu s potrebami mesta a regiónu</h3>
                        <p>Prepájať výučbu a výskum s potrebami mesta Trnava, KIRA, verejného sektora a regionálneho prostredia tak, aby mali akademické poznatky praktický prínos.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3>Praktická aplikácia poznatkov a transfer odborných kapacít</h3>
                        <p>Vytvárať podmienky na uplatnenie poznatkov v praxi prostredníctvom projektov, pilotných iniciatív a spoločných riešení s externými partnermi.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3>Rozvoj odborných, digitálnych a analytických zručností</h3>
                        <p>Rozvíjať odborné, digitálne a analytické zručnosti študentov a účastníkov aktivít vrátane zodpovedného využívania digitálnych technológií a umelej inteligencie.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3>Dlhodobá a udržateľná spolupráca</h3>
                        <p>Budovať dlhodobé partnerstvá založené na spolupráci, dôvere a jasných cieľoch, ktoré podporujú rozvoj univerzity, mesta a regiónu.</p>
                    </section>
                </li>
            </ul>
        </section>

        <hr>

        <!-- Sekcia: Obsah činnosti -->
        <section class="content-section">
            <small>SMARTLAB</small>
            <h2>Obsah činnosti</h2>
            <p class="intro-text">Naše aktivity pokrývajú päť kľúčových oblastí, ktoré tvoria ucelený rámec pôsobenia SmartLabu.</p>

            <ul class="objective-list">
                <li>
                    <section>
                        <h3>Vzdelávacie aktivity a rozvoj kompetencií</h3>
                        <p>Rozširovanie vzdelávania o interdisciplinárne a projektovo orientované formy práce s dôrazom na odborné, digitálne a analytické kompetencie.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3>Výskumné aktivity</h3>
                        <p>Tvorba a overovanie poznatkov, analytické spracovanie tém a rozvoj metodických prístupov relevantných pre verejné, mestské a regionálne prostredie.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3>Vývoj a rozvoj aplikačných riešení</h3>
                        <p>Návrh, rozpracovanie a overovanie konkrétnych riešení s partnermi verejného sektora a regiónu s dôrazom na projektový prístup a pilotné iniciatívy.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3>Popularizácia vedy, technológií a vzdelávania</h3>
                        <p>Sprostredkovanie odborných poznatkov verejnosti, zvyšovanie povedomia o význame vedy a technológií a podpora digitálnej gramotnosti v regióne.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3>Práca s mladými ľuďmi a rozvoj talentov</h3>
                        <p>Podpora záujmu o vedu a technológie u žiakov a študentov, budovanie talentovej základne a dlhodobejšie rozvojové aktivity v spolupráci so školami.</p>
                    </section>
                </li>
            </ul>
        </section>

        <hr>

        @php
            $roomFloors = config('smartlab.room_floors');
        @endphp

        <section class="content-section room-information-section" id="rooms">
            <small>NAŠE PRIESTORY</small>
            <h2>Naše priestory</h2>

            @foreach ($roomFloors as $floorKey => $floor)
                <section class="floor-section room-floor-showcase" aria-labelledby="room-floor-title-{{ $floorKey }}">
                    <h3 id="room-floor-title-{{ $floorKey }}">{{ $floor['label'] }}</h3>
                    <p>{{ $floor['description'] }}</p>
                    <div class="gallery-carousel" data-gallery-carousel role="region" aria-roledescription="karusel" aria-label="Fotografie {{ $floor['label'] }}">
                        <div class="gallery-carousel__stage">
                            <button class="gallery-carousel__button gallery-carousel__button--prev" type="button" data-gallery-prev aria-label="Predchádzajúca fotografia">←</button>
                            <div class="gallery-carousel__viewport">
                                @for ($photo = 1; $photo <= $floor['photo_count']; $photo++)
                                    <figure class="gallery-slide" data-gallery-slide role="group" aria-roledescription="snímka" aria-label="Fotografia {{ $photo }} z {{ $floor['photo_count'] }}" @if ($photo > 1) hidden @endif>
                                        <img
                                            src="{{ asset(sprintf('images/room-%s-floor-%02d.jpg', $floorKey, $photo)) }}"
                                            alt="Interiér {{ $floor['label'] }} – fotografia {{ $photo }}">
                                    </figure>
                                @endfor
                            </div>
                            <button class="gallery-carousel__button gallery-carousel__button--next" type="button" data-gallery-next aria-label="Nasledujúca fotografia">→</button>
                            <p class="gallery-carousel__status" data-gallery-status aria-live="off" aria-atomic="true">1 / {{ $floor['photo_count'] }}</p>
                        </div>
                    </div>
                    @if ($loop->first || $loop->last)
                        <div class="room-reservation-cta-wrap">
                            <a class="btn btn-ink btn-large room-reservation-cta" href="{{ route('reservations.create') }}">
                                Rezervovať miestnosť <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    @endif
                </section>
            @endforeach
        </section>
@endsection
