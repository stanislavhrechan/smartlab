@props(['partners' => []])

<section class="page-hero">
    <div class="page-hero-inner wrap">
    <div>
        <!-- <p class="eyebrow">SmartLab UCM &amp; Trnava</p> -->
        <h1>Partneri</h1>
        <p class="lead">Spolupracujeme s inštitúciami, firmami a organizáciami, ktoré zdieľajú našu víziu.</p>
    </div>
    <span class="page-hero-art" aria-hidden="true"></span>
    </div>
</section>

<section class="partners-page">
    <div class="wrap">
        <div class="toolbar">
            <div class="chips" role="group" aria-label="Filtrovanie partnerov podľa typu">
            <button class="chip is-active" type="button" data-filter="all" aria-pressed="true">Všetci <span>{{$partners->count()}}</span></button>
            <!-- <button class="chip" type="button" data-filter="academic" aria-pressed="false">Akademická sféra <span>0</span></button>
            <button class="chip" type="button" data-filter="public" aria-pressed="false">Samospráva a verejný sektor <span>0</span></button>
            <button class="chip" type="button" data-filter="tech" aria-pressed="false">Technologické firmy <span>0</span></button>
            <button class="chip" type="button" data-filter="other" aria-pressed="false">Ďalší partneri <span>0</span></button> -->
            </div>
            <!-- <p class="count" aria-live="polite">Zobrazení partneri: <strong data-partner-count>12</strong> z 12</p> -->
        </div>
        <div class="partner-grid">
            @foreach($partners as $partner)
                <article class="partner-card" data-name="{{ $partner->name }}" data-description="{{ $partner->description }}" data-logo="{{ Storage::url($partner->logo) }}" data-website="{{ $partner->website ?? '' }}" data-type="{{ $partner->type ?? 'Partner' }}">
                    <div class="partner-logo">
                        <img src="{{Storage::url($partner->logo)}}" alt="Univerzita sv. Cyrila a Metoda v Trnave" loading="eager" referrerpolicy="no-referrer">
                    </div>
                    <div class="partner-body">
                        <!-- <span class="tag tag-mint">Akademická sféra</span> -->
                        <h2 class="partner-name"><button class="partner-open" type="button">{{$partner->name}}</button></h2>
                        <!-- <p class="partner-type">verejná vysoká škola</p> -->
                        <p class="partner-desc">{{$partner->description}}</p>
                        <div class="partner-meta flex gap-2">
                        <!-- <a class="partner-site" href="https://www.ucm.sk" target="_blank" rel="noopener">Navštíviť web ↗</a> -->
                            <span class="card-link">Viac o partnerovi </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<dialog class="article-dialog partner-dialog" aria-labelledby="partner-dialog-title">

    <button class="dialog-close" type="button" data-dialog-close aria-label="Zavrieť detail partnera">
        ×
    </button>

    <div class="partner-logo partner-dialog-logo">
        <img src="" alt="" data-dialog-logo referrerpolicy="no-referrer">
    </div>

    <div class="article-dialog-content">
        <span class="tag" data-dialog-tag></span>

        <h2 id="partner-dialog-title" data-dialog-title></h2>


        <p class="partner-dialog-body" data-dialog-body></p>

        <div class="article-dialog-actions">
            <a class="btn btn-ink"
               href="#"
               target="_blank"
               rel="noopener"
               data-dialog-link>
                Navštíviť web ↗
            </a>

            <button class="btn btn-ghost" type="button" data-dialog-close>
                Zavrieť
            </button>
        </div>
    </div>

</dialog>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const dialog = document.querySelector('.partner-dialog');

    if (!dialog) return;

    const title = dialog.querySelector('[data-dialog-title]');
    const description = dialog.querySelector('[data-dialog-body]');
    const logo = dialog.querySelector('[data-dialog-logo]');
    const tag = dialog.querySelector('[data-dialog-tag]');
    const link = dialog.querySelector('[data-dialog-link]');

    document.querySelectorAll('.partner-card').forEach(card => {

        card.addEventListener('click', () => {

            const name = card.dataset.name;
            const descriptionText = card.dataset.description;
            const logoUrl = card.dataset.logo;
            const website = card.dataset.website;

            title.textContent = name;
            description.textContent = descriptionText;
            

            if (logoUrl) {
                logo.src = logoUrl;
                logo.alt = name;
                logo.style.display = 'block';
            } else {
                logo.removeAttribute('src');
                logo.style.display = 'none';
            }

            let validWebsite = '';

            try {
                const parsedUrl = new URL(website);

                if (['http:', 'https:'].includes(parsedUrl.protocol)) {
                    validWebsite = parsedUrl.href;
                }
            } catch {}

            if (validWebsite) {
                link.href = validWebsite;
                link.style.display = 'inline-flex';
            } else {
                link.removeAttribute('href');
                link.style.display = 'none';
            }

            dialog.showModal();
        });

    });

    dialog.querySelectorAll('[data-dialog-close]').forEach(button => {
        button.addEventListener('click', () => {
            dialog.close();
        });
    });

    dialog.addEventListener('click', event => {
        if (event.target === dialog) {
            dialog.close();
        }
    });

});
</script>