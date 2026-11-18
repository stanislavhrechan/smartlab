/*
 * SmartLab - consolidated script.
 * The shared header (.site-header: mobile menu and scroll shadow) is initialised on any page that has it.
 * Other behaviour is initialised only if the page's body class is present:
 *   page-about     -> about page
 *   page-projects  -> projects page
 */
document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;

    // Mobile menu of the shared header (.menu-button toggles .links).
    const initMenuButton = (header) => {
        const menuButton = header.querySelector('.menu-button');
        const links = header.querySelector('.links');
        if (!menuButton || !links) return null;

        const closeMenu = () => {
            menuButton.setAttribute('aria-expanded', 'false');
            menuButton.setAttribute('aria-label', 'Otvoriť menu');
            links.classList.remove('is-open');
        };

        menuButton.addEventListener('click', () => {
            const open = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', String(!open));
            menuButton.setAttribute('aria-label', open ? 'Otvoriť menu' : 'Zavrieť menu');
            links.classList.toggle('is-open', !open);
        });

        return closeMenu;
    };

    // Shared site header (.site-header): mobile menu and scroll shadow.
    // Blade sets the active link from the current named route.
    const initSiteHeader = () => {
        const header = document.querySelector('.site-header');
        if (!header) return;

        const closeMenu = initMenuButton(header);
        if (closeMenu) {
            header.querySelectorAll('.links a').forEach((link) => {
                link.addEventListener('click', () => closeMenu());
            });
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') closeMenu();
            });
        }

        const updateHeaderShadow = () => header.classList.toggle('is-scrolled', window.scrollY > 4);
        window.addEventListener('scroll', updateHeaderShadow, { passive: true });
        updateHeaderShadow();
    };

    // About page
    const initAbout = () => {
        const observerOptions = {
            threshold: 0.15,
            rootMargin: "0px 0px -50px 0px"
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const elementsToAnimate = document.querySelectorAll('main > section, main hr, article.card');

        elementsToAnimate.forEach(el => {
            el.classList.add('fade-element');
            observer.observe(el);
        });

        document.querySelectorAll('[data-gallery-carousel]').forEach((carousel) => {
            const slides = [...carousel.querySelectorAll('[data-gallery-slide]')];
            const previousButton = carousel.querySelector('[data-gallery-prev]');
            const nextButton = carousel.querySelector('[data-gallery-next]');
            const status = carousel.querySelector('[data-gallery-status]');
            if (slides.length < 2 || !previousButton || !nextButton || !status) return;

            let activeIndex = slides.findIndex((slide) => !slide.hidden);
            if (activeIndex < 0) activeIndex = 0;
            const desktopAutoplay = window.matchMedia('(min-width: 769px) and (prefers-reduced-motion: no-preference)');
            let autoplayTimer = null;

            const showSlide = (index, announce = false) => {
                activeIndex = (index + slides.length) % slides.length;
                slides.forEach((slide, slideIndex) => {
                    slide.hidden = slideIndex !== activeIndex;
                    slide.classList.toggle('is-entering', slideIndex === activeIndex);
                    slide.setAttribute('aria-label', `Fotografia ${slideIndex + 1} z ${slides.length}`);
                });
                status.setAttribute('aria-live', announce ? 'polite' : 'off');
                status.textContent = `${activeIndex + 1} / ${slides.length}`;
            };

            const restartAutoplay = () => {
                if (autoplayTimer !== null) window.clearInterval(autoplayTimer);
                autoplayTimer = desktopAutoplay.matches
                    ? window.setInterval(() => showSlide(activeIndex + 1), 5000)
                    : null;
            };
            const navigate = (index) => {
                showSlide(index, true);
                restartAutoplay();
            };

            previousButton.addEventListener('click', () => navigate(activeIndex - 1));
            nextButton.addEventListener('click', () => navigate(activeIndex + 1));
            carousel.addEventListener('keydown', (event) => {
                if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') return;
                event.preventDefault();
                navigate(activeIndex + (event.key === 'ArrowRight' ? 1 : -1));
            });
            desktopAutoplay.addEventListener('change', restartAutoplay);
            restartAutoplay();
        });
    };

    // Events page: month calendar + filters over any .event-item elements in the list.
    // Items are plain markup: <li class="event-item" data-date="YYYY-MM-DD" data-form="..."
    // data-audience="studenti verejnost" data-partner="..."> (none are published yet).
    const initEventsPage = () => {
        const page = document.querySelector('.events-page');
        if (!page) return;

        const monthNames = ['január', 'február', 'marec', 'apríl', 'máj', 'jún', 'júl', 'august', 'september', 'október', 'november', 'december'];
        const categories = {
            'Vzdelávacie aktivity': 1,
            'Výskum a odborné aktivity': 2,
            'Networking a spolupráca': 2,
            'Inovačné a aplikačné aktivity': 3,
            'Popularizačné a verejné aktivity': 4,
            'Práca s mladými talentmi': 5
        };

        const title = page.querySelector('.calendar-title');
        const grid = page.querySelector('.calendar-grid');
        const items = [...page.querySelectorAll('.event-item')];
        const selects = [...page.querySelectorAll('[data-filter]')];
        const resetButton = page.querySelector('[data-filter-reset]');
        const emptyState = page.querySelector('.empty-state');
        const emptyText = page.querySelector('[data-empty-text]');
        const defaultEmptyText = emptyText.textContent;

        const toKey = (date) => [
            date.getFullYear(),
            String(date.getMonth() + 1).padStart(2, '0'),
            String(date.getDate()).padStart(2, '0')
        ].join('-');

        const today = new Date();
        const todayKey = toKey(today);
        let view = new Date(today.getFullYear(), today.getMonth(), 1);

        const filterValue = (key) => page.querySelector(`[data-filter="${key}"]`).value;

        const matches = (item) => {
            const date = filterValue('date');
            const form = filterValue('form');
            const audience = filterValue('audience');
            const partner = filterValue('partner');
            if (date === 'upcoming' && item.dataset.date < todayKey) return false;
            if (date === 'past' && item.dataset.date >= todayKey) return false;
            if (form !== 'all' && item.dataset.form !== form) return false;
            if (audience !== 'all' && !(item.dataset.audience || '').split(' ').includes(audience)) return false;
            if (partner !== 'all' && item.dataset.partner !== partner) return false;
            return true;
        };

        const renderCalendar = (visible) => {
            const year = view.getFullYear();
            const month = view.getMonth();
            const offset = (new Date(year, month, 1).getDay() + 6) % 7; // weeks start on Monday
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const cells = Math.ceil((offset + daysInMonth) / 7) * 7;

            const categoriesByDay = new Map();
            visible.forEach((item) => {
                const set = categoriesByDay.get(item.dataset.date) || new Set();
                set.add(categories[item.dataset.form] || 1);
                categoriesByDay.set(item.dataset.date, set);
            });

            title.textContent = `${monthNames[month]} ${year}`;
            grid.replaceChildren();
            for (let i = 0; i < cells; i++) {
                const day = new Date(year, month, 1 - offset + i);
                const key = toKey(day);
                const cell = document.createElement('div');
                cell.className = 'calendar-day';
                cell.setAttribute('role', 'gridcell');
                if (day.getMonth() !== month) cell.classList.add('is-outside');
                if (key === todayKey) {
                    cell.classList.add('is-today');
                    cell.setAttribute('aria-current', 'date');
                }

                const number = document.createElement('span');
                number.textContent = day.getDate();
                cell.append(number);

                const dayCategories = categoriesByDay.get(key);
                if (dayCategories) {
                    const dots = document.createElement('span');
                    dots.className = 'calendar-dots';
                    dayCategories.forEach((category) => {
                        const dot = document.createElement('span');
                        dot.className = `dot cat-${category}`;
                        dots.append(dot);
                    });
                    cell.append(dots);
                }
                grid.append(cell);
            }
        };

        const render = () => {
            const visible = items.filter(matches);
            items.forEach((item) => { item.hidden = !visible.includes(item); });
            emptyState.hidden = visible.length > 0;
            emptyText.textContent = items.length ? 'Pre zvolené filtre sa nenašli žiadne podujatia.' : defaultEmptyText;
            resetButton.hidden = selects.every((select) => select.value === 'all');
            renderCalendar(visible);
        };

        page.querySelectorAll('[data-calendar-nav]').forEach((button) => {
            button.addEventListener('click', () => {
                view = new Date(view.getFullYear(), view.getMonth() + Number(button.dataset.calendarNav), 1);
                render();
            });
        });
        selects.forEach((select) => select.addEventListener('change', render));
        resetButton.addEventListener('click', () => {
            selects.forEach((select) => { select.value = 'all'; });
            render();
        });

        render();
    };

    // Shared by the filterable news, project and partner pages: category chips with a
    // result count, plus a detail dialog that is filled by `fill(card)` and deep-linkable via #card-id.
    const initFilterableCards = ({ page, dialog, cards, openSelector, countSelector, fill }) => {
        const chips = [...page.querySelectorAll('.chip')];
        const count = page.querySelector(countSelector);

        const applyFilter = (category) => {
            let shown = 0;
            chips.forEach((chip) => {
                const active = chip.dataset.filter === category;
                chip.classList.toggle('is-active', active);
                chip.setAttribute('aria-pressed', String(active));
            });
            cards.forEach((card) => {
                const visible = category === 'all' || card.dataset.category === category;
                card.hidden = !visible;
                if (visible) shown++;
            });
            count.textContent = shown;
            const emptyState = page.querySelector('.empty-state');
            if (emptyState) emptyState.hidden = shown > 0;
        };

        const setHash = (hash) => {
            try {
                history.replaceState(null, '', window.location.href.split('#')[0] + hash);
            } catch (error) { /* some file:// contexts block history updates */ }
        };

        const openCard = (card, updateHash = true) => {
            fill(card);
            dialog.scrollTop = 0;
            if (!dialog.open) dialog.showModal();
            document.body.classList.add('dialog-open');
            if (updateHash) setHash(`#${card.dataset.id}`);
        };

        chips.forEach((chip) => chip.addEventListener('click', () => applyFilter(chip.dataset.filter)));
        page.querySelectorAll(openSelector).forEach((button) => {
            button.addEventListener('click', () => openCard(button.closest('[data-id]')));
        });
        dialog.querySelectorAll('[data-dialog-close]').forEach((button) => {
            button.addEventListener('click', () => dialog.close());
        });
        dialog.addEventListener('click', (event) => { if (event.target === dialog) dialog.close(); });
        dialog.addEventListener('close', () => {
            document.body.classList.remove('dialog-open');
            setHash('');
        });

        const linked = cards.find((card) => card.dataset.id === window.location.hash.slice(1));
        if (linked) openCard(linked, false);
    };

    // Project cards use the same filter and detail-dialog behavior as the news cards.
    const initProjectsPage = () => {
        const page = document.querySelector('.projects-page');
        const dialog = document.querySelector('.project-dialog');
        if (!page || !dialog) return;

        const part = (name) => dialog.querySelector(`[data-dialog-${name}]`);
        initFilterableCards({
            page,
            dialog,
            cards: [...page.querySelectorAll('.project-card')],
            openSelector: '.project-open',
            countSelector: '[data-project-count]',
            fill: (card) => {
                const tag = card.querySelector('.tag');

                part('tag').className = tag.className;
                part('tag').textContent = tag.textContent;
                part('title').textContent = card.querySelector('.project-open').textContent.trim();
                part('lead').textContent = card.querySelector('.news-excerpt').textContent.trim();
                part('body').replaceChildren(card.querySelector('template').content.cloneNode(true));
            }
        });
    };

    // News page: each .news-card holds its full article in a <template>.
    const initNewsPage = () => {
        const page = document.querySelector('.news-page');
        const dialog = document.querySelector('.article-dialog');
        if (!page || !dialog) return;

        const part = (name) => dialog.querySelector(`[data-dialog-${name}]`);
        initFilterableCards({
            page,
            dialog,
            cards: [...page.querySelectorAll('.news-card')],
            openSelector: '.news-open',
            countSelector: '[data-news-count]',
            fill: (card) => {
                const tag = card.querySelector('.tag');
                const time = card.querySelector('time');
                const image = card.querySelector('img');

                part('tag').className = tag.className;
                part('tag').textContent = tag.textContent;
                part('date').textContent = time.textContent;
                part('date').setAttribute('datetime', time.getAttribute('datetime'));
                part('title').textContent = card.querySelector('.news-open').textContent.trim();
                part('lead').textContent = card.querySelector('.news-excerpt').textContent.trim();
                part('byline').textContent = `${card.querySelector('.news-meta span').textContent.trim()} · Publikované ${card.dataset.published}`;
                part('body').replaceChildren(card.querySelector('template').content.cloneNode(true));
                part('link').href = card.dataset.url;
                dialog.querySelector('.article-dialog-image').src = image.currentSrc || image.src;
                dialog.querySelector('.article-dialog-image').alt = image.alt;
            }
        });
    };

    // Partners page: partner cards with a full-description dialog. Logos are hotlinked, so a logo
    // that fails to load is replaced by the partner's initials (data-initials on .partner-logo).
    const initPartnersPage = () => {
        const page = document.querySelector('.partners-page');
        const dialog = document.querySelector('.partner-dialog');
        if (!page || !dialog) return;

        const markBroken = (image) => image.closest('.partner-logo').classList.add('is-broken');
        page.querySelectorAll('.partner-logo img').forEach((image) => {
            if (image.complete && image.naturalWidth === 0) markBroken(image);
            else image.addEventListener('error', () => markBroken(image), { once: true });
        });

        const part = (name) => dialog.querySelector(`[data-dialog-${name}]`);
        initFilterableCards({
            page,
            dialog,
            cards: [...page.querySelectorAll('.partner-card')],
            openSelector: '.partner-open',
            countSelector: '[data-partner-count]',
            fill: (card) => {
                const tag = card.querySelector('.tag');
                const logo = card.querySelector('.partner-logo');
                const image = logo.querySelector('img');
                const site = card.querySelector('.partner-site');

                part('tag').className = tag.className;
                part('tag').textContent = tag.textContent;
                part('title').textContent = card.querySelector('.partner-open').textContent.trim();
                part('type').textContent = card.querySelector('.partner-type').textContent.trim();
                part('body').textContent = card.querySelector('.partner-desc').textContent.trim();

                const dialogLogo = dialog.querySelector('.partner-logo');
                dialogLogo.dataset.initials = logo.dataset.initials;
                dialogLogo.classList.toggle('is-broken', logo.classList.contains('is-broken'));
                const dialogImage = dialogLogo.querySelector('img');
                dialogImage.src = image.currentSrc || image.src;
                dialogImage.alt = image.alt;

                const link = part('link');
                link.hidden = !site;
                if (site) link.href = site.href;
            }
        });
    };

    // Contacts page: "Ako nás nájdete" step-by-step guide. Steps are the .guide-step buttons
    // (data-image / data-alt); the scene card, counter and progress bar follow the current step.
    const initFindUs = () => {
        const guide = document.querySelector('.guide');
        if (!guide) return;

        const steps = [...guide.querySelectorAll('.guide-step')];
        const image = guide.querySelector('.guide-scene img');
        const label = guide.querySelector('[data-guide-label]');
        const title = guide.querySelector('[data-guide-title]');
        const text = guide.querySelector('[data-guide-text]');
        const current = guide.querySelector('[data-guide-current]');
        const progress = guide.querySelector('progress');
        const prev = guide.querySelector('[data-guide-prev]');
        const next = guide.querySelector('[data-guide-next]');
        let index = Math.max(0, steps.findIndex((step) => step.getAttribute('aria-current') === 'step'));

        const show = (target) => {
            index = Math.min(Math.max(target, 0), steps.length - 1);
            const step = steps[index];
            steps.forEach((item, i) => {
                if (i === index) item.setAttribute('aria-current', 'step');
                else item.removeAttribute('aria-current');
            });
            image.src = step.dataset.image;
            image.alt = step.dataset.alt;
            label.textContent = `Scéna ${index + 1}`;
            title.textContent = step.querySelector('.guide-step-title').textContent;
            text.textContent = step.querySelector('.guide-step-desc').textContent;
            current.textContent = index + 1;
            progress.value = index + 1;
            prev.disabled = index === 0;
            next.disabled = index === steps.length - 1;
            if (steps[index + 1]) new Image().src = steps[index + 1].dataset.image; // warm the next photo
        };

        steps.forEach((step, i) => step.addEventListener('click', () => show(i)));
        prev.addEventListener('click', () => show(index - 1));
        next.addEventListener('click', () => show(index + 1));
        guide.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowLeft') show(index - 1);
            else if (event.key === 'ArrowRight') show(index + 1);
        });
        show(index);
    };

    // Students page: status filter chips + opportunity detail dialog; flags listings whose
    // deadline has passed. Each .opportunity holds its dialog body in a <template>.
    const initStudentsPage = () => {
        const page = document.querySelector('.students-page');
        const dialog = document.querySelector('.student-dialog');
        if (!page || !dialog) return;

        page.querySelectorAll('time[data-deadline]').forEach((time) => {
            if (new Date(time.getAttribute('datetime')) < new Date()) {
                time.parentElement.querySelector('.opp-expired').hidden = false;
            }
        });

        const part = (name) => dialog.querySelector(`[data-dialog-${name}]`);
        initFilterableCards({
            page,
            dialog,
            cards: [...page.querySelectorAll('.opportunity')],
            openSelector: '[data-open]',
            countSelector: '[data-opportunity-count]',
            fill: (card) => {
                const tag = card.querySelector('.tag');
                const title = card.querySelector('.opp-title').textContent.trim();

                part('tag').className = tag.className;
                part('tag').textContent = tag.textContent;
                part('title').textContent = title;
                part('lead').textContent = card.querySelector('.opp-summary').textContent.trim();
                part('facts').replaceChildren(...[...card.querySelector('.opp-facts').children].map((fact) => fact.cloneNode(true)));
                part('body').replaceChildren(card.querySelector('template').content.cloneNode(true));
                part('link').href = `mailto:${card.dataset.email}?subject=${encodeURIComponent(`Prihláška: ${title}`)}`;
            }
        });
    };

    initSiteHeader();
    initStudentsPage();
    initFindUs();
    initPartnersPage();
    initNewsPage();
    initEventsPage();
    if (body.classList.contains('page-about')) initAbout();
    initProjectsPage();
});
