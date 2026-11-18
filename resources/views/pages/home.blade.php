@extends('layouts.app')

@section('title', 'SmartLab UCM & Trnava')
@section('body-class', 'page-site')

@section('content')
<section class="hero" id="home">
      <div class="hero-inner container">
        <div class="hero-copy">
          <p class="eyebrow">Spoločný projekt UCM v Trnave a mesta Trnava</p>
          <h1>Inovačné laboratórium pre <span class="teal">digitálnu budúcnosť</span></h1>
          <p class="lead">SmartLab reaguje na rastúci dopyt po IT odborníkoch a podporuje štúdium informatiky prostredníctvom praktických projektov, spolupráce s odbornou praxou a rozvoja digitálnych kompetencií.</p>
          <div class="hero-actions">
            <a class="btn btn-ink" href="{{ route('projects') }}">Projekty ↗</a>
            <a class="btn btn-ghost" href="#contact">Kontaktujte nás</a>
          </div>
        </div>
        <div class="hero-art">
          <img class="hero-sun" src="{{ asset('images/yellow-circle.png') }}" alt="">
          <img class="hero-dot" src="{{ asset('images/red-circle.png') }}" alt="">
          <img class="hero-campus" src="{{ asset('images/hero-campus.png') }}" alt="Človek pracujúci na streche mesta">
        </div>
      </div>
    </section>

    <section class="section" id="values">
      <div class="container">
        <div class="section-head">
          <div>
            <h2>SmartLab v skratke</h2>
          </div>
          <p class="section-lead">Štyri piliere, ktoré určujú naše zameranie a spôsob práce.</p>
        </div>
        <div class="pillars">
          <article class="pillar">
            <img src="{{ asset('images/yellow-circle.png') }}" alt="">
            <h3>Inovácie</h3>
            <p>Návrh a overovanie prototypov a pilotných riešení v digitálnych technológiách.</p>
          </article>
          <article class="pillar">
            <img src="{{ asset('images/collaboration.png') }}" alt="">
            <h3>Spolupráca</h3>
            <p>Spoločné projekty s firmami, samosprávou a akademickými tímami.</p>
          </article>
          <article class="pillar">
            <img src="{{ asset('images/education.png') }}" alt="">
            <h3>Vzdelávanie</h3>
            <p>Workshopy, prednášky a projektová výučba so zameraním na prax.</p>
          </article>
          <article class="pillar">
            <img src="{{ asset('images/digital.png') }}" alt="">
            <h3>Digitálna transformácia</h3>
            <p>Metódy, nástroje a architektúry pre modernizáciu procesov a služieb.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="container">
      <div class="feature" id="projects">
        <div class="feature-head">
          <div>
            <h2>Aktuálne projekty</h2>
            <p class="section-lead">Domovská stránka zobrazuje len výber. Kompletný katalóg projektov budeme dopĺňať a publikovať na stránke Projekty.</p>
          </div>
          <a class="btn btn-yellow" href="{{ route('projects') }}">Projekty ↗</a>
        </div>
        <div class="feature-cards">
          <a class="feature-card" href="{{ route('projects') }}">
            <span class="tag tag-mint">IoT</span>
            <h3>Aplikácia pre podporu správy mestského ekosystému IoT</h3>
            <p>Množstvo IoT senzorov, ktoré mesto prevádzkuje, sa každým rokom zdvojnásobuje. Udržať si prehľad o účele, stave, spôsobe pripojenia a mieste inštalácie IoT je čoraz náročnejšie.</p>
            <span class="card-link">Detail projektu ↗</span>
          </a>
          <a class="feature-card" href="{{ route('projects') }}">
            <span class="tag tag-yellow">data</span>
            <h3>GenT evidenčný systém</h3>
            <p>Dáta a štatistiky sú podkladom pre rozhodovanie založené na faktoch nielen na úrovni mesta, ale stávajú sa bežnou súčasťou pri riadení činností organizácií.</p>
            <span class="card-link">Detail projektu ↗</span>
          </a>
          <a class="feature-card" href="{{ route('projects') }}">
            <span class="tag tag-mint">IoT</span>
            <h3>IoT teplomery</h3>
            <p>Bezpečnosť našich dát často závisí na bezpečnosti prostredia, v ktorom sú dáta ukladané a spracovávané. Monitorovanie teploty v serverovniach pomáha riešiť problémy včas.</p>
            <span class="card-link">Detail projektu ↗</span>
          </a>
        </div>
      </div>
    </section>

    <section class="section" id="events">
      <div class="container">
        <div class="section-head">
          <div>
            <h2>Najbližšie podujatia</h2>
          </div>
          <div class="section-aside">
            <p class="section-lead">Výber najbližších plánovaných podujatí. Kompletný zoznam nájdeš v sekcii Podujatia.</p>
            <a class="text-link" href="{{ route('events') }}">Zobraziť všetky ↗</a>
          </div>
        </div>
        <div class="event-grid">
          <article class="event-card">
            <h3>SmartLab Talks: Prezentuj tak, aby ťa počuli</h3>
            <p>Naše akcie približujú už od prvých sekúnd prístupnosť tak, aby si každý našiel svoje miesto.</p>
          </article>
          <article class="event-card event-card-red">
            <h3>SmartLab Talks odštartovali!</h3>
            <p>Spoznaj SmartLab UCM &amp; Trnava – priestor, kde sa spájajú nápady, technológie a prax.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="cta" id="contact">
      <div class="cta-inner container">
        <div>
          <h2>Chcete spolupracovať?</h2>
          <p class="section-lead">Napíšte nám krátky kontext vašej témy. Ozveme sa s návrhom postupu a možným formátom spolupráce.</p>
        </div>
        <a class="btn btn-yellow btn-large" href="mailto:patrik.borsos@ucm.sk">Kontaktujte nás ↗</a>
      </div>
    </section>
@endsection
