@extends('layouts.app')

@section('title', 'Študenti')
@section('body-class', 'page-site')

@section('content')
<section class="page-hero">
      <div class="page-hero-inner container">
        <div>
          <p class="eyebrow">Ponuky a zákazky</p>
          <h1>Študenti</h1>
          <p class="lead">Menšie projekty a zákazky (napr. web, dizajn, analytika), na ktorých si vieš zarobiť a získať skúsenosť.</p>
        </div>
        <span class="page-hero-art" aria-hidden="true"></span>
      </div>
    </section>

    <section class="students-page">
      <div class="container">
        <div class="toolbar">
          <div class="chips" role="group" aria-label="Filtrovanie ponúk podľa stavu">
            <button class="chip is-active" type="button" data-filter="all" aria-pressed="true">Všetky <span>1</span></button>
            <button class="chip" type="button" data-filter="open" aria-pressed="false">Dostupné <span>0</span></button>
            <button class="chip" type="button" data-filter="reserved" aria-pressed="false">Rezervované <span>1</span></button>
          </div>
          <p class="count" aria-live="polite">Zobrazené ponuky: <strong data-opportunity-count>1</strong> z 1</p>
        </div>
        <div class="students-layout">
          <div class="opportunities">
          <article class="opportunity" data-id="test" data-category="reserved" data-email="patrik.borsos@ucm.sk">
            <div class="opp-main">
              <div class="opp-head">
                <h2 class="opp-title"><button class="opp-title-button" type="button" data-open>Test</button></h2>
                <span class="tag tag-yellow">Rezervované</span>
              </div>
              <p class="opp-summary">oauncnwdc</p>
            </div>
            <div class="opp-side">
              <dl class="opp-facts">
                <div><dt>Odmena</dt><dd>150€</dd></div>
                <div><dt>Odhad</dt><dd>20&nbsp;h</dd></div>
                <div><dt>Deadline</dt><dd><time datetime="2026-03-03T10:00:00.000Z" data-deadline>3. 3. 2026 11:00</time> <span class="opp-expired" hidden>termín uplynul</span></dd></div>
              </dl>
              <button class="btn btn-ink btn-small" type="button" data-open>Detail ↗</button>
            </div>
            <template>
              <h3>Popis</h3>
              <p>woicwncd</p>
              <p class="opp-note">Táto ponuka je momentálne rezervovaná.</p>
              <p>Po odoslaní prihlášky sa ti ozveme emailom. Kontakt: <a href="mailto:patrik.borsos@ucm.sk">patrik.borsos@ucm.sk</a></p>
            </template>
          </article>
            <div class="empty-state" role="status" hidden>
              <h3>Žiadne ponuky</h3>
              <p>Pre zvolený filter momentálne nie sú žiadne ponuky.</p>
            </div>
          </div>
          <aside class="apply-panel panel" aria-labelledby="apply-title">
            <h2 id="apply-title" class="panel-title">Prihlásiť sa</h2>
            <p>Po odoslaní prihlášky sa ti ozveme emailom.</p>
            <p>Kontakt: <a class="contact-email" href="mailto:patrik.borsos@ucm.sk">patrik.borsos@ucm.sk</a></p>
            <a class="btn btn-ink" href="mailto:patrik.borsos@ucm.sk?subject=Prihl%C3%A1%C5%A1ka%3A%20%C5%A1tudentsk%C3%A1%20ponuka">Napísať e-mail ↗</a>
          </aside>
        </div>
      </div>
    </section>

    <dialog class="article-dialog student-dialog" aria-labelledby="student-dialog-title">
      <button class="dialog-close" type="button" data-dialog-close aria-label="Zavrieť detail ponuky">×</button>
      <div class="article-dialog-content">
        <span class="tag" data-dialog-tag></span>
        <h2 id="student-dialog-title" data-dialog-title></h2>
        <p class="article-dialog-lead" data-dialog-lead></p>
        <dl class="opp-facts opp-facts-row" data-dialog-facts></dl>
        <div class="article-dialog-body" data-dialog-body></div>
        <div class="article-dialog-actions">
          <a class="btn btn-ink" href="mailto:patrik.borsos@ucm.sk" data-dialog-link>Napísať e-mail ↗</a>
          <button class="btn btn-ghost" type="button" data-dialog-close>Zavrieť</button>
        </div>
      </div>
    </dialog>
@endsection
