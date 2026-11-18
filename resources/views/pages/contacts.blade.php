@extends('layouts.app')

@section('title', 'Kontakt')
@section('body-class', 'page-site')

@section('content')
<section class="page-hero">
      <div class="contact-hero-inner container">
        <div class="contact-main">
          <div>
            <p class="eyebrow">SmartLab UCM &amp; Trnava</p>
            <h1>Kontakt</h1>
          </div>
          <div class="contact-cards">
            <article class="contact-card">
              <span class="contact-icon"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg></span>
              <div class="contact-text">
                <p class="contact-label">Email</p>
                <a class="contact-email" href="mailto:patrik.borsos@ucm.sk">patrik.borsos@ucm.sk</a>
              </div>
            </article>
            <article class="contact-card">
              <span class="contact-icon contact-icon-yellow"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s-7-6.2-7-11a7 7 0 0 1 14 0c0 4.8-7 11-7 11Z"/><circle cx="12" cy="10" r="2.5"/></svg></span>
              <div class="contact-text">
                <p class="contact-label">Adresa</p>
                <address class="contact-address">
                  <span>SmartLab UCM &amp; Trnava</span>
                  <span>Hlavná 5</span>
                  <span>917 01 Trnava</span>
                </address>
                <a class="text-link" href="https://www.google.com/maps/search/?api=1&amp;query=Hlavn%C3%A1%205%2C%20917%2001%20Trnava" target="_blank" rel="noopener">Otvoriť v mapách ↗</a>
              </div>
            </article>
          </div>
        </div>
        <div class="map-card panel">
          <div class="map-head">
            <h2 class="panel-title">Kde nás nájdete</h2>
            <p>Presná poloha SmartLab UCM &amp; Trnava na mape.</p>
          </div>
          <iframe class="map-frame" src="https://www.google.com/maps?q=Hlavn%C3%A1%205,%20917%2001%20Trnava&output=embed" title="Mapa: SmartLab UCM &amp; Trnava, Hlavná 5, 917 01 Trnava" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>

    <section class="guide" id="ako-nas-najdete">
      <div class="container">
        <div class="guide-head">
          <div>
            <span class="tag tag-mint">Navigácia ku vstupu</span>
            <h2>Ako nás nájdete</h2>
            <p class="section-lead">Jednoduchá navigácia od ulice až ku vstupu do priestorov SmartLab UCM &amp; Trnava.</p>
          </div>
          <div class="guide-progress">
            <p>Krok <strong data-guide-current>1</strong>/6</p>
            <progress max="6" value="1" aria-label="Priebeh navigácie"></progress>
          </div>
        </div>
        <div class="guide-layout">
          <article class="guide-scene">
            <img src="https://smartlab.fpvucm.sk/_next/static/media/ulica.9e211414.jpg" alt="Hlavný vstup z ulice smerom do pasáže">
            <div class="guide-scene-body" aria-live="polite">
              <span class="guide-scene-label" data-guide-label>Scéna 1</span>
              <h3 data-guide-title>Hlavný vstup z ulice</h3>
              <p data-guide-text>Vstúpte hlavným vchodom z Hlavnej ulice do pasáže smerom k priestorom SmartLabu.</p>
              <div class="guide-nav">
                <button class="btn btn-ghost btn-small" type="button" data-guide-prev disabled>‹ Späť</button>
                <button class="btn btn-ink btn-small" type="button" data-guide-next>Ďalší krok ›</button>
              </div>
              <p class="guide-hint">Ak si nie si istý, kde pokračovať, klikni na konkrétny krok v zozname alebo použi tlačidlá nižšie.</p>
            </div>
          </article>
          <div class="guide-steps panel">
            <h3 class="guide-steps-title">Postup navigácie</h3>
            <ol class="guide-step-list">
            <li>
              <button class="guide-step" type="button" data-image="https://smartlab.fpvucm.sk/_next/static/media/ulica.9e211414.jpg" data-alt="Hlavný vstup z ulice smerom do pasáže" aria-current="step">
                <span class="guide-step-number">1</span>
                <span>
                  <span class="guide-step-title">Hlavný vstup z ulice</span>
                  <span class="guide-step-desc">Vstúpte hlavným vchodom z Hlavnej ulice do pasáže smerom k priestorom SmartLabu.</span>
                </span>
              </button>
            </li>
            <li>
              <button class="guide-step" type="button" data-image="https://smartlab.fpvucm.sk/_next/static/media/celachodba.55beb4fc.jpg" data-alt="Celá chodba smerujúca k dverám SmartLabu">
                <span class="guide-step-number">2</span>
                <span>
                  <span class="guide-step-title">Prejdite celou chodbou</span>
                  <span class="guide-step-desc">Po vstupe do pasáže pokračujte chodbou až na jej koniec k posledným dverám napravo.</span>
                </span>
              </button>
            </li>
            <li>
              <button class="guide-step" type="button" data-image="https://smartlab.fpvucm.sk/_next/static/media/dvere.ad778730.jpg" data-alt="Dvere do priestorov SmartLabu UCM &amp; Trnava">
                <span class="guide-step-number">3</span>
                <span>
                  <span class="guide-step-title">Toto sú naše dvere</span>
                  <span class="guide-step-desc">Na konci chodby sa nachádzajú dvere do priestorov SmartLabu.</span>
                </span>
              </button>
            </li>
            <li>
              <button class="guide-step" type="button" data-image="https://smartlab.fpvucm.sk/_next/static/media/zvoncek.09c5ab9d.jpg" data-alt="Zvonček SmartLab UCM &amp; Trnava pri vstupe">
                <span class="guide-step-number">4</span>
                <span>
                  <span class="guide-step-title">Použite zvonček SmartLab</span>
                  <span class="guide-step-desc">Ak sú dvere zatvorené, použite zvonček SmartLab. Radi vás privítame.</span>
                </span>
              </button>
            </li>
            <li>
              <button class="guide-step" type="button" data-image="https://smartlab.fpvucm.sk/_next/static/media/schody.c3753508.jpg" data-alt="Schody vedúce k učebni a kanceláriám SmartLabu">
                <span class="guide-step-number">5</span>
                <span>
                  <span class="guide-step-title">Pokračujte po schodoch</span>
                  <span class="guide-step-desc">Po vstupe pokračujte po schodoch nahor. Učebňa sa nachádza na 1. poschodí, kancelárie na 2. poschodí.</span>
                </span>
              </button>
            </li>
            <li>
              <button class="guide-step" type="button" data-image="https://smartlab.fpvucm.sk/_next/static/media/oznacenie.eb5ae569.jpg" data-alt="Označenie SmartLab pre navigáciu v interiéri">
                <span class="guide-step-number">6</span>
                <span>
                  <span class="guide-step-title">Sledujte označenie SmartLab</span>
                  <span class="guide-step-desc">Pri orientácii sa riaďte označením SmartLab, ktoré vás navedie k správnym priestorom.</span>
                </span>
              </button>
            </li>
            </ol>
          </div>
        </div>
      </div>
    </section>
@endsection
