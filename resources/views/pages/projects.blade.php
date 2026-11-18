@extends('layouts.app')

@section('title', 'Projekty')
@section('body-class', 'page-projects')

@section('content')
<section class="hero container">
      <div class="kicker">SMARTLAB UCM &amp; TRNAVA</div>
      <h1>Projekty</h1>
      <p class="hero-copy">Prehľad projektov a pilotných riešení SmartLabu. Projekty budú postupne dopĺňané.</p>
      <div class="hero-art" aria-label="Ilustrácia nápadu a riešenia"></div>
    </section>
    <section class="projects-section container">
      <div class="section-rule"></div>
      <h2>Projekty v praxi</h2>
      <nav class="filters" aria-label="Filtrovanie projektov">
        <a href="#" data-filter="all">Všetky</a><a href="#" data-filter="iot">IoT</a><a href="#" data-filter="data">data</a><a href="#" data-filter="siete">siete</a><a href="#" data-filter="obstaravanie">inovatívne obstarávanie</a>
      </nav>
      <div class="project-grid">
        <article class="project"><div class="project-visual visual-one"><img src="https://images.unsplash.com/photo-1519501025264-65ba15a82390?auto=format&amp;fit=crop&amp;w=1000&amp;q=80" alt="Mesto v noci"></div><div class="project-info color"><p class="project-tag">IoT</p><h3>Aplikácia pre podporu správy mestského ekosystému IoT</h3><p>Množstvo IoT senzorov, ktoré mesto prevádzkuje, sa každým rokom zdvojnásobuje. Udržať si prehľad o účele, stave, spôsobe pripojenia a mieste inštalácie IoT je čoraz náročnejšie.</p><a class="detail" href="#">Detail projektu ↗</a></div></article>
        <article class="project"><div class="project-visual visual-two"><div>DATA<br><small>štatistiky a prehľad</small></div></div><div class="project-info yellow"><p class="project-tag">data</p><h3>GenT evidenčný systém</h3><p>Dáta a štatistiky sú podkladom pre rozhodovanie založené na faktoch nielen na úrovni mesta, ale stávajú sa bežnou súčasťou pri riadení činností organizácií.</p><a class="detail" href="#">Detail projektu ↗</a></div></article>
        <article class="project"><div class="project-visual visual-three">36.8° &nbsp; 25.9°<br>SERVER ROOM<br>temperature: OK</div><div class="project-info"><p class="project-tag">IoT</p><h3>IoT teplomery</h3><p>Bezpečnosť našich dát často závisí na bezpečnosti prostredia, v ktorom sú dáta ukladané a spracovávané. Monitorovanie teploty v serverovniach pomáha riešiť problémy včas.</p><a class="detail" href="#">Detail projektu ↗</a></div></article>
        <article class="project"><div class="project-visual visual-four">⌖<br><small>Lokál</small></div><div class="project-info"><p class="project-tag">data</p><h3>Lokál App</h3><p>Život v krajskom meste prináša množstvo príležitostí pre trávenie voľného času, vzdelávanie či občianske aktivity. Lokál zhromažďuje informácie z množstva zdrojov.</p><a class="detail" href="#">Detail projektu ↗</a></div></article>
        <article class="project"><div class="project-visual visual-five">LoRa<span class="wan">WAN</span>®</div><div class="project-info color"><p class="project-tag">siete</p><h3>Metropolitná LoRaWAN sieť</h3><p>Mesto Trnava v súčasnosti zbiera dáta zo senzorov a je prepojené. Jedným z cieľov samosprávy je vytvárať prehľadné riešenia pre kvalitnejší život obyvateľov.</p><a class="detail" href="#">Detail projektu ↗</a></div></article>
        <article class="project"><div class="project-visual visual-six">miniTrnava</div><div class="project-info yellow"><p class="project-tag">data</p><h3>Portál miniTrnava</h3><p>Prázdninové podujatie miniTrnava sa každým rokom stretáva s väčším záujmom detí a rodičov. Riešením je aplikácia, ktorá pomôže organizačne zvládnuť záujem účastníkov.</p><a class="detail" href="#">Detail projektu ↗</a></div></article>
        <article class="project"><div class="project-visual visual-seven"></div><div class="project-info"><p class="project-tag">inovatívne obstarávanie</p><h3>Portál pre obstarávanie potravín</h3><p>Verejné obstarávanie je jedným z oporných pilierov pre transparentné hospodárenie s verejnými financiami. SmartLab podporuje efektívne a hospodárne riešenia.</p><a class="detail" href="#">Detail projektu ↗</a></div></article>
      </div>
    </section>
@endsection
