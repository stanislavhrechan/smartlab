@extends('layouts.app')

@section('title', 'Projekty')
@section('body-class', 'page-site')

@section('content')
<section class="page-hero listing-page-hero">
    <div class="page-hero-inner container">
        <div>
            <p class="eyebrow">SmartLab UCM &amp; Trnava</p>
            <h1>Projekty</h1>
            <p class="lead">Prehľad projektov a pilotných riešení SmartLabu. Projekty budú postupne dopĺňané.</p>
        </div>
        <span class="page-hero-art" aria-hidden="true"></span>
    </div>
</section>

<section class="news projects-page">
    <div class="container">
        <div class="news-toolbar">
            <div class="chips" role="group" aria-label="Filtrovanie projektov podľa kategórie">
                <button class="chip is-active" type="button" data-filter="all" aria-pressed="true">Všetky <span>7</span></button>
                <button class="chip" type="button" data-filter="iot" aria-pressed="false">IoT <span>2</span></button>
                <button class="chip" type="button" data-filter="data" aria-pressed="false">Dáta <span>3</span></button>
                <button class="chip" type="button" data-filter="siete" aria-pressed="false">Siete <span>1</span></button>
                <button class="chip" type="button" data-filter="obstaravanie" aria-pressed="false">Inovatívne obstarávanie <span>1</span></button>
            </div>
            <p class="news-count" aria-live="polite">Zobrazené projekty: <strong data-project-count>7</strong> z 7</p>
        </div>

        <div class="news-grid">
            <article class="news-card project-card" data-id="iot-ekosystem" data-category="iot">
                <div class="project-visual visual-one"><img src="https://images.unsplash.com/photo-1519501025264-65ba15a82390?auto=format&amp;fit=crop&amp;w=1000&amp;q=80" alt="Mesto v noci" loading="lazy"></div>
                <div class="news-body">
                    <div class="news-tags"><span class="tag tag-blue">IoT</span></div>
                    <h2 class="news-title"><button class="news-open project-open" type="button">Aplikácia pre podporu správy mestského ekosystému IoT</button></h2>
                    <p class="news-excerpt">Množstvo IoT senzorov, ktoré mesto prevádzkuje, sa každým rokom zdvojnásobuje. Udržať si prehľad o účele, stave, spôsobe pripojenia a mieste inštalácie IoT je čoraz náročnejšie.</p>
                    <div class="news-meta"><span>Pilotné riešenie SmartLabu</span><span class="card-link">Detail projektu ↗</span></div>
                </div>
                <template><p>Projekt pomáha mestu udržať si prehľad o účele, stave, spôsobe pripojenia a umiestnení rastúceho počtu IoT senzorov.</p></template>
            </article>

            <article class="news-card project-card" data-id="gent-evidencny-system" data-category="data">
                <div class="project-visual visual-two"><div>DATA<small>štatistiky a prehľad</small></div></div>
                <div class="news-body">
                    <div class="news-tags"><span class="tag tag-yellow">Dáta</span></div>
                    <h2 class="news-title"><button class="news-open project-open" type="button">GenT evidenčný systém</button></h2>
                    <p class="news-excerpt">Dáta a štatistiky sú podkladom pre rozhodovanie založené na faktoch nielen na úrovni mesta, ale stávajú sa bežnou súčasťou pri riadení činností organizácií.</p>
                    <div class="news-meta"><span>Pilotné riešenie SmartLabu</span><span class="card-link">Detail projektu ↗</span></div>
                </div>
                <template><p>Evidenčný systém sprístupňuje štatistiky a prehľadné dáta, ktoré pomáhajú organizáciám pri každodennom rozhodovaní.</p></template>
            </article>

            <article class="news-card project-card" data-id="iot-teplomery" data-category="iot">
                <div class="project-visual visual-three"><div>36.8° &nbsp; 25.9°<br>SERVER ROOM<br><small>temperature: OK</small></div></div>
                <div class="news-body">
                    <div class="news-tags"><span class="tag tag-blue">IoT</span></div>
                    <h2 class="news-title"><button class="news-open project-open" type="button">IoT teplomery</button></h2>
                    <p class="news-excerpt">Bezpečnosť našich dát často závisí na bezpečnosti prostredia, v ktorom sú dáta ukladané a spracovávané. Monitorovanie teploty v serverovniach pomáha riešiť problémy včas.</p>
                    <div class="news-meta"><span>Pilotné riešenie SmartLabu</span><span class="card-link">Detail projektu ↗</span></div>
                </div>
                <template><p>Monitorovanie teploty v serverovniach pomáha včas odhaliť podmienky, ktoré môžu ohroziť bezpečnosť a dostupnosť dát.</p></template>
            </article>

            <article class="news-card project-card" data-id="lokal-app" data-category="data">
                <div class="project-visual visual-four"><div>⌖<small>Lokál</small></div></div>
                <div class="news-body">
                    <div class="news-tags"><span class="tag tag-yellow">Dáta</span></div>
                    <h2 class="news-title"><button class="news-open project-open" type="button">Lokál App</button></h2>
                    <p class="news-excerpt">Život v krajskom meste prináša množstvo príležitostí pre trávenie voľného času, vzdelávanie či občianske aktivity. Lokál zhromažďuje informácie z množstva zdrojov.</p>
                    <div class="news-meta"><span>Pilotné riešenie SmartLabu</span><span class="card-link">Detail projektu ↗</span></div>
                </div>
                <template><p>Lokál zhromažďuje informácie o voľnom čase, vzdelávaní a občianskych aktivitách v meste na jednom mieste.</p></template>
            </article>

            <article class="news-card project-card" data-id="lorawan-siet" data-category="siete">
                <div class="project-visual visual-five">LoRa<span class="wan">WAN</span>®</div>
                <div class="news-body">
                    <div class="news-tags"><span class="tag tag-mint">Siete</span></div>
                    <h2 class="news-title"><button class="news-open project-open" type="button">Metropolitná LoRaWAN sieť</button></h2>
                    <p class="news-excerpt">Mesto Trnava v súčasnosti zbiera dáta zo senzorov a je prepojené. Jedným z cieľov samosprávy je vytvárať prehľadné riešenia pre kvalitnejší život obyvateľov.</p>
                    <div class="news-meta"><span>Pilotné riešenie SmartLabu</span><span class="card-link">Detail projektu ↗</span></div>
                </div>
                <template><p>Metropolitná sieť prepája senzory a vytvára infraštruktúru pre zber dát a užitočné digitálne služby pre mesto.</p></template>
            </article>

            <article class="news-card project-card" data-id="mini-trnava" data-category="data">
                <div class="project-visual visual-six">miniTrnava</div>
                <div class="news-body">
                    <div class="news-tags"><span class="tag tag-yellow">Dáta</span></div>
                    <h2 class="news-title"><button class="news-open project-open" type="button">Portál miniTrnava</button></h2>
                    <p class="news-excerpt">Prázdninové podujatie miniTrnava sa každým rokom stretáva s väčším záujmom detí a rodičov. Riešením je aplikácia, ktorá pomôže organizačne zvládnuť záujem účastníkov.</p>
                    <div class="news-meta"><span>Pilotné riešenie SmartLabu</span><span class="card-link">Detail projektu ↗</span></div>
                </div>
                <template><p>Portál miniTrnava pomáha organizačne zvládnuť rastúci záujem detí a rodičov o prázdninové podujatie.</p></template>
            </article>

            <article class="news-card project-card" data-id="obstaravanie-potravin" data-category="obstaravanie">
                <div class="project-visual visual-seven"></div>
                <div class="news-body">
                    <div class="news-tags"><span class="tag tag-red">Inovatívne obstarávanie</span></div>
                    <h2 class="news-title"><button class="news-open project-open" type="button">Portál pre obstarávanie potravín</button></h2>
                    <p class="news-excerpt">Verejné obstarávanie je jedným z oporných pilierov pre transparentné hospodárenie s verejnými financiami. SmartLab podporuje efektívne a hospodárne riešenia.</p>
                    <div class="news-meta"><span>Pilotné riešenie SmartLabu</span><span class="card-link">Detail projektu ↗</span></div>
                </div>
                <template><p>Projekt podporuje transparentnejšie, efektívnejšie a hospodárnejšie verejné obstarávanie potravín.</p></template>
            </article>
        </div>
    </div>
</section>

<dialog class="article-dialog project-dialog" aria-labelledby="project-dialog-title">
    <button class="dialog-close" type="button" data-dialog-close aria-label="Zavrieť detail projektu">×</button>
    <div class="article-dialog-content">
        <div class="news-tags"><span class="tag" data-dialog-tag></span></div>
        <h2 id="project-dialog-title" data-dialog-title></h2>
        <p class="article-dialog-lead" data-dialog-lead></p>
        <div class="article-dialog-body" data-dialog-body></div>
        <div class="article-dialog-actions">
            <button class="btn btn-ghost" type="button" data-dialog-close>Zavrieť</button>
        </div>
    </div>
</dialog>
@endsection
