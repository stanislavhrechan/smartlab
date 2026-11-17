<section class="page-hero">
    <div class="page-hero-inner wrap">
    <div>
        <p class="eyebrow">SmartLab UCM &amp; Trnava</p>
        <h1>Podujatia a udalosti</h1>
        <p class="lead">Pozrite si naše nadchádzajúce podujatia, workshopy a konferencie.</p>
    </div>
    <span class="page-hero-art" aria-hidden="true"></span>
    </div>
</section>

<section class="events-page">
    <div class="events-layout wrap">
    <aside class="filters panel" aria-label="Filtre podujatí">
        <h2 class="panel-title">Filtre</h2>
        <div class="field">
        <label for="filter-date">Dátum</label>
        <select id="filter-date" data-filter="date">
            <option value="all">Všetky</option>
            <option value="upcoming">Nadchádzajúce</option>
            <option value="past">Minulé</option>
        </select>
        </div>
        <div class="field">
        <label for="filter-form">Forma</label>
        <select id="filter-form" data-filter="form">
            <option value="all">Všetky formy</option>
            <option value="Vzdelávacie aktivity">Vzdelávacie aktivity</option>
            <option value="Výskum a odborné aktivity">Výskum a odborné aktivity</option>
            <option value="Inovačné a aplikačné aktivity">Inovačné a aplikačné aktivity</option>
            <option value="Networking a spolupráca">Networking a spolupráca</option>
            <option value="Popularizačné a verejné aktivity">Popularizačné a verejné aktivity</option>
            <option value="Práca s mladými talentmi">Práca s mladými talentmi</option>
        </select>
        </div>
        <div class="field">
        <label for="filter-audience">Cieľová skupina</label>
        <select id="filter-audience" data-filter="audience">
            <option value="all">Všetky skupiny</option>
            <option value="studenti">Študenti</option>
            <option value="verejnost">Verejnosť</option>
            <option value="firmy">Firmy</option>
            <option value="samosprava">Samospráva</option>
            <option value="akademici">Akademici</option>
        </select>
        </div>
        <div class="field">
        <label for="filter-partner">Partner</label>
        <select id="filter-partner" data-filter="partner">
            <option value="all">Všetci partneri</option>
        </select>
        </div>
        <button class="btn btn-ghost btn-small" type="button" data-filter-reset hidden>Zrušiť filtre</button>
    </aside>

    <div class="events-main">
        <section class="calendar panel" aria-label="Kalendár podujatí">
        <div class="calendar-head">
            <h2 class="panel-title calendar-title" aria-live="polite"></h2>
            <div class="calendar-nav">
            <button type="button" data-calendar-nav="-1" aria-label="Predchádzajúci mesiac">‹</button>
            <button type="button" data-calendar-nav="1" aria-label="Nasledujúci mesiac">›</button>
            </div>
        </div>
        <div class="calendar-weekdays" aria-hidden="true"><span>Po</span><span>Ut</span><span>St</span><span>Št</span><span>Pi</span><span>So</span><span>Ne</span></div>
        <div class="calendar-grid" role="grid"></div>
        <div class="legend">
            <p class="legend-title">Legendy</p>
            <span class="legend-item"><span class="legend-swatch cat-1"></span>Vzdelávacie aktivity</span>
            <span class="legend-item"><span class="legend-swatch cat-2"></span>Výskum a odborné aktivity / Networking a spolupráca</span>
            <span class="legend-item"><span class="legend-swatch cat-3"></span>Inovačné a aplikačné aktivity</span>
            <span class="legend-item"><span class="legend-swatch cat-4"></span>Popularizačné a verejné aktivity</span>
            <span class="legend-item"><span class="legend-swatch cat-5"></span>Práca s mladými talentmi</span>
        </div>
        </section>

        <section class="event-list-section" aria-labelledby="event-list-title">
        <div class="event-list-head">
            <h2 id="event-list-title" class="panel-title">Zoznam podujatí</h2>
        </div>
        <ul class="event-list"></ul>
        <div class="empty-state" role="status">
            <h3>Žiadne podujatia</h3>
            <p data-empty-text>Zatiaľ nie sú naplánované žiadne podujatia.</p>
        </div>
        </section>
    </div>
    </div>
</section>