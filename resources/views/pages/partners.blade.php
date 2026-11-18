@extends('layouts.app')

@section('title', 'Partneri')
@section('body-class', 'page-site')

@section('content')
<section class="page-hero">
      <div class="page-hero-inner container">
        <div>
          <p class="eyebrow">SmartLab UCM &amp; Trnava</p>
          <h1>Partneri</h1>
          <p class="lead">Spolupracujeme s inštitúciami, firmami a organizáciami, ktoré zdieľajú našu víziu.</p>
        </div>
        <span class="page-hero-art" aria-hidden="true"></span>
      </div>
    </section>

    <section class="partners-page">
      <div class="container">
        <div class="toolbar">
          <div class="chips" role="group" aria-label="Filtrovanie partnerov podľa typu">
            <button class="chip is-active" type="button" data-filter="all" aria-pressed="true">Všetci <span>12</span></button>
            <button class="chip" type="button" data-filter="academic" aria-pressed="false">Akademická sféra <span>2</span></button>
            <button class="chip" type="button" data-filter="public" aria-pressed="false">Samospráva a verejný sektor <span>3</span></button>
            <button class="chip" type="button" data-filter="tech" aria-pressed="false">Technologické firmy <span>5</span></button>
            <button class="chip" type="button" data-filter="other" aria-pressed="false">Ďalší partneri <span>2</span></button>
          </div>
          <p class="count" aria-live="polite">Zobrazení partneri: <strong data-partner-count>12</strong> z 12</p>
        </div>
        <div class="partner-grid">
          <article class="partner-card" data-id="ucm" data-category="academic">
            <div class="partner-logo" data-initials="UCM">
              <img src="https://www.portalvs.sk/files/images/logos/720000000.png" alt="Univerzita sv. Cyrila a Metoda v Trnave" loading="eager" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-mint">Akademická sféra</span>
              <h2 class="partner-name"><button class="partner-open" type="button">Univerzita sv. Cyrila a Metoda v Trnave</button></h2>
              <p class="partner-type">verejná vysoká škola</p>
              <p class="partner-desc">Hlavný poslaním Univerzity sv. Cyrila a Metoda v Trnave je chrániť a šíriť poznanie, rozvíjať vzdelávanie na základe vedeckých poznatkov a tvorivej vedeckej či umeleckej činnosti, s ohľadom na národné, humanistické a demokratické tradície. Univerzita svoje poslanie vykonáva v duchu kultúrneho odkazu sv. Cyrila a Metoda, ktorý je zasadený do európskeho civilizačného okruhu a stredoeurópskych hodnôt.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://www.ucm.sk" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="fpv-ucm" data-category="academic">
            <div class="partner-logo" data-initials="FPV">
              <img src="https://www.portalvs.sk/_thumbs/250/150/720020000_4609.png" alt="Fakulta prírodných vied FPV" loading="eager" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-mint">Akademická sféra</span>
              <h2 class="partner-name"><button class="partner-open" type="button">Fakulta prírodných vied FPV</button></h2>
              <p class="partner-type">akademický</p>
              <p class="partner-desc">Fakulta prírodných vied UCM v Trnave sa zameriava na vzdelávanie a výskum v oblastiach informatiky, biológie, biotechnológií, chémie a environmentálnych vied. Ponúka študijné programy na bakalárskom, magisterskom aj doktorandskom stupni, napríklad Aplikovaná informatika, Aplikovaná biológia, Biotechnológie, Chémia, Aplikovaná chémia či Ekosystémové vedy a environmentálne zmeny. Výučba je podporená špecializovanými laboratóriami a prepojením vzdelávania s vedeckovýskumnou činnosťou.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://fpv.ucm.sk" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="mesto-trnava" data-category="public">
            <div class="partner-logo" data-initials="MT">
              <img src="https://www.trnava.sk/content/images/Loga/trnava_logo_farebne_negativ.jpg" alt="Mesto Trnava" loading="eager" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-blue">Samospráva a verejný sektor</span>
              <h2 class="partner-name"><button class="partner-open" type="button">Mesto Trnava</button></h2>
              <p class="partner-type">územná samospráva - krajské mesto</p>
              <p class="partner-desc">Trnava je historické krajské mesto na západe Slovenska, známe ako „Malý Rím“ vďaka množstvu kostolov. Patrí medzi najstaršie mestá na Slovensku a vyznačuje sa zachovalým historickým jadrom s mestskými hradbami. Dnes je významným centrom vzdelávania, kultúry a regionálneho rozvoja.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://www.trnava.sk" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="kira" data-category="public">
            <div class="partner-logo" data-initials="KIRA">
              <img src="https://kira.sk/assets/kira-logo-main-DMhCtnRD.svg" alt="Krajská inovačná a rozvojová agentúra (KIRA)" loading="eager" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-blue">Samospráva a verejný sektor</span>
              <h2 class="partner-name"><button class="partner-open" type="button">Krajská inovačná a rozvojová agentúra (KIRA)</button></h2>
              <p class="partner-type">regionálna rozvojová a inovačná agentúra</p>
              <p class="partner-desc">Krajská inovačná a rozvojová agentúra (KIRA) je regionálna organizácia zameraná na podporu inovácií, rozvoja a spolupráce medzi verejným sektorom, podnikmi a akademickým prostredím. Pôsobí v Trnavskom kraji a podporuje projekty orientované na digitalizáciu, inteligentné riešenia a regionálny rozvoj.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://kira.sk" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="govtech-laboratories" data-category="tech">
            <div class="partner-logo" data-initials="GTL">
              <img src="https://www.govtechlab.sk/smartlab/media/gtllogo.png" alt="GovTech Laboratories" loading="eager" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-yellow">Technologické firmy</span>
              <h2 class="partner-name"><button class="partner-open" type="button">GovTech Laboratories</button></h2>
              <p class="partner-type">technologická spoločnosť</p>
              <p class="partner-desc">GovTech Laboratories, s.r.o. je slovenská technologická spoločnosť zameraná na vývoj inovatívnych digitálnych riešení pre mestá, regióny a verejnú správu. Orientuje sa na digitálnu transformáciu verejného sektora, inteligentné mestá (Smart Cities), interoperabilitu informačných systémov a využívanie moderných technológií vrátane digitálnych dvojčiat a dátových priestorov. Jej zámerom je prepájať technologické inovácie s praktickými potrebami samospráv a podporovať vývoj a overovanie riešení v reálnych podmienkach.</p>
              <div class="partner-meta">
                <span class="partner-nosite">Bez webu</span>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="gent" data-category="public">
            <div class="partner-logo" data-initials="GenT">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiWBiPZQ_K-XoSV-ByS96C39sQLMDrqJ-Dvfbd3xbXew&amp;s=10" alt="GenT" loading="eager" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-blue">Samospráva a verejný sektor</span>
              <h2 class="partner-name"><button class="partner-open" type="button">GenT</button></h2>
              <p class="partner-type">verejná správa</p>
              <p class="partner-desc">GenT je mestská organizácia zameraná na podporu aktívneho občianstva a participácie mladých ľudí na rozhodovacích procesoch v meste, koordináciu činnosti mládežníckeho parlamentu, organizovanie a podporu vzdelávacích, rozvojových a kultúrnych aktivít pre mládež, ako aj na prevádzku a rozvoj mládežníckych klubovní a ďalších priestorov pre mladých ľudí. Zároveň podporuje inklúziu a rovnaké príležitosti, pripravuje stratégie a koncepcie v oblasti mládežníckej politiky, buduje partnerstvá so školami, organizáciami a komunitami a zabezpečuje aj správu zvereného majetku mesta a činnosti súvisiace s jeho hospodárením.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://www.trnava.sk/registre/449/gent-mestska-prispevkova-organizacia" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="yms" data-category="tech">
            <div class="partner-logo" data-initials="YMS">
              <img src="https://yms.sk/2024/wp-content/uploads/2024/07/YMS-menu-logo.-s-dovetkom.png" alt="YMS" loading="lazy" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-yellow">Technologické firmy</span>
              <h2 class="partner-name"><button class="partner-open" type="button">YMS</button></h2>
              <p class="partner-type">súkromný sektor</p>
              <p class="partner-desc">YMS patrí medzi najstaršie a najstabilnejšie slovenské IT spoločnosti. Ako certifikované výskumné pracovisko a partner Európskej vesmírnej agentúry sa dlhodobo venuje vývoju a implementácii informačných systémov pre významné spoločnosti a organizácie verejného sektora. Viac ako 30 rokov pôsobí najmä v oblastiach, ktoré si vyžadujú vysokú úroveň projektovej, analytickej a programátorskej expertízy, pričom za svoje inovatívne riešenia získala viacero významných ocenení vrátane ceny ministra hospodárstva Inovatívny čin roka.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://yms.sk" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="boc-group" data-category="tech">
            <div class="partner-logo" data-initials="BOC">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgXEugfm4elRFDuIAhMDjAsBYa9xDeNA9mVw&amp;s" alt="BOC Group" loading="lazy" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-yellow">Technologické firmy</span>
              <h2 class="partner-name"><button class="partner-open" type="button">BOC Group</button></h2>
              <p class="partner-type">súkromný sektor</p>
              <p class="partner-desc">BOC Group je spoločnosť zameraná na vývoj nástrojov pre podnikové riadenie, najmä v oblasti procesného manažmentu a enterprise architektúry. Je známa produktmi ako ADONIS a ADOIT, ktoré sa využívajú na modelovanie procesov, riadenie architektúry a podporu digitálnej transformácie organizácií.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://www.boc-group.com/en/" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="itaps" data-category="tech">
            <div class="partner-logo" data-initials="ITAPS">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlc0jIRgFHS_cwYwLwYdmp5JDV6dOtscNc62ZfqG2awLhXM-1GlpIbEx4&amp;s=10" alt="ITAPS" loading="lazy" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-yellow">Technologické firmy</span>
              <h2 class="partner-name"><button class="partner-open" type="button">ITAPS</button></h2>
              <p class="partner-type">technologická spoločnosť</p>
              <p class="partner-desc">ITAPS je slovenská technologická spoločnosť zameraná na vývoj softvérových riešení, digitalizáciu a automatizáciu podnikových procesov. Špecializuje sa na vývoj aplikácií, využívanie umelej inteligencie, robotickú automatizáciu procesov (RPA) a testovanie softvéru. Súčasťou jej činnosti je aj podpora rozvoja IT talentov, prepájanie vzdelávania s praxou a zapájanie študentov do reálnych technologických projektov.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://www.itaps.sk" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="esense" data-category="tech">
            <div class="partner-logo" data-initials="eSense">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjx4HjYrJF13H1PRxnK3MP3eYT4zq4OVVJZUBmJTvq6WLeq1S486n_lCQ&amp;s=10" alt="eSense" loading="lazy" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-yellow">Technologické firmy</span>
              <h2 class="partner-name"><button class="partner-open" type="button">eSense</button></h2>
              <p class="partner-type">technologická spoločnosť</p>
              <p class="partner-desc">eSense, s.r.o. je slovenská technologická spoločnosť, ktorá stojí za inovatívnym projektom AMBULANCIA.AI, zameraným na využitie umelej inteligencie v zdravotníctve. Projekt prináša moderné digitálne riešenia na automatizáciu administratívnych procesov v ambulanciách, znižovanie administratívnej záťaže zdravotníckeho personálu a zefektívnenie každodennej prevádzky zdravotníckych zariadení.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://ambulancia.ai" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="osinski-capital" data-category="other">
            <div class="partner-logo" data-initials="OC">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWOAqNMFpxU_GKr8SYuWBkvE-CpJF6oVncVAZlZzo&amp;s" alt="Osinski Capital" loading="lazy" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-red">Ďalší partneri</span>
              <h2 class="partner-name"><button class="partner-open" type="button">Osinski Capital</button></h2>
              <p class="partner-type">investičná spoločnosť</p>
              <p class="partner-desc">Osinski Capital, a.s. je slovenská súkromná investičná spoločnosť so sídlom v Trnave, zameraná na investície do nehnuteľností, obnoviteľných zdrojov energie a pozemkov. Jej činnosť zahŕňa najmä správu a prenájom nehnuteľností a rozvoj investičných aktivít s dôrazom na dlhodobé zhodnocovanie majetku.</p>
              <div class="partner-meta">
                <span class="partner-nosite">Bez webu</span>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
          <article class="partner-card" data-id="tvoriva-dimenzia" data-category="other">
            <div class="partner-logo" data-initials="TD">
              <img src="https://tvorivadimenzia.sk/logo.png" alt="Tvorivá dimenzia" loading="lazy" referrerpolicy="no-referrer">
            </div>
            <div class="partner-body">
              <span class="tag tag-red">Ďalší partneri</span>
              <h2 class="partner-name"><button class="partner-open" type="button">Tvorivá dimenzia</button></h2>
              <p class="partner-type">občianske združenie</p>
              <p class="partner-desc">Tvorivá dimenzia je slovenské občianske združenie zamerané na vzdelávanie, rozvoj praktických a technických zručností a podporu tvorivosti. Významnou súčasťou jeho činnosti je vzdelávanie v oblasti 3D tlače prostredníctvom odborných kurzov a praktických aktivít. Združenie sa usiluje o sprístupňovanie moderných technológií, podporu inovatívnych prístupov k vzdelávaniu a rozvoj zručností využiteľných v praxi.</p>
              <div class="partner-meta">
                <a class="partner-site" href="https://tvorivadimenzia.sk" target="_blank" rel="noopener">Navštíviť web ↗</a>
                <span class="card-link">Viac o partnerovi ↗</span>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <dialog class="article-dialog partner-dialog" aria-labelledby="partner-dialog-title">
      <button class="dialog-close" type="button" data-dialog-close aria-label="Zavrieť detail partnera">×</button>
      <div class="partner-logo partner-dialog-logo" data-initials="">
        <img src="" alt="" referrerpolicy="no-referrer">
      </div>
      <div class="article-dialog-content">
        <span class="tag" data-dialog-tag></span>
        <h2 id="partner-dialog-title" data-dialog-title></h2>
        <p class="article-dialog-byline" data-dialog-type></p>
        <p class="partner-dialog-body" data-dialog-body></p>
        <div class="article-dialog-actions">
          <a class="btn btn-ink" href="#" target="_blank" rel="noopener" data-dialog-link>Navštíviť web ↗</a>
          <button class="btn btn-ghost" type="button" data-dialog-close>Zavrieť</button>
        </div>
      </div>
    </dialog>
@endsection
