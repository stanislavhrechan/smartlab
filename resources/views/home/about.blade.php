<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O SmartLabe</title>
    <link rel="stylesheet" href="styleSM.css">
</head>

<style>
    :root {
    --teal: #65cbb8;
    --yellow: #fcd53f;
    --red: #ff757b;
    --text-dark: #1a1a1a;
    --text-gray: #555555;
    --border-light: #e5e5e5;
    --footer-border: #42a996;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: var(--text-dark);
    line-height: 1.5;
    background-color: #ffffff;
    overflow-x: hidden;
}

main {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px max(20px, calc(50% - 600px));
    border-bottom: 1px solid var(--border-light);
    position: relative;
    box-shadow: 0 25px 20px -15px rgba(164, 255, 229, 0.25);
    width: 100%;
}

header img {
    height: clamp(30px, 4vw, 40px);
    display: block;
}

nav {
    display: flex;
    align-items: center;
    gap: 25px;
}

nav ul {
    display: flex;
    list-style: none;
    gap: 25px;
}

nav a {
    text-decoration: none;
    color: var(--text-gray);
    font-size: 0.9rem;
    font-weight: 500;
    padding-bottom: 5px;
    transition: color 0.3s;
}

nav a.active {
    color: var(--teal);
    border-bottom: 2px solid var(--teal);
}

nav a:hover {
    color: var(--teal);
}

span.icon-arrow {
    font-size: 1.2rem;
    color: var(--teal);
    cursor: pointer;
}

.hamburger {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px;
    z-index: 100;
}

.hamburger span {
    display: block;
    width: 25px;
    height: 3px;
    background-color: var(--text-dark);
    margin: 5px 0;
    transition: all 0.3s ease;
}

.SmartLab-o_nas {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: clamp(20px, 4vw, 40px);
    margin-bottom: clamp(40px, 6vw, 60px);
    gap: clamp(20px, 4vw, 40px);
    background-color: rgba(239, 237, 237, 0.46);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 25px 20px -15px rgba(0, 0, 0, 0.25);
}

.hero-text {
    flex: 1;
}

.hero-text small {
    color: var(--text-dark);
    font-size: 0.75rem;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.hero-text h1 {
    font-size: clamp(2.2rem, 5vw, 3.5rem);
    font-weight: 800;
    margin: 15px 0;
    letter-spacing: -1px;
    line-height: 1.1;
}

.hero-text p {
    font-size: clamp(0.95rem, 2vw, 1rem);
    color: var(--text-gray);
    max-width: 90%;
}

.SmartLab-images {
    flex: 1;
    display: flex;
    justify-content: flex-end;
}

.SmartLab-images img {
    width: 100%;
    max-width: 450px;
    height: auto;
    border-radius: 50%;
    object-fit: cover;
}

hr {
    border: none;
    border-top: 1px solid var(--border-light);
    margin: clamp(20px, 4vw, 40px) 0;
}

.SmartLab-contain, .content-section {
    margin-bottom: clamp(40px, 8vw, 80px);
     background-color: rgba(239, 237, 237, 0.46);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 25px 20px -15px rgba(0, 0, 0, 0.25);





}

.SmartLab-contain small, .content-section small {
    font-size: 0.75rem;
    font-weight: bold;
    letter-spacing: 1px;
}

.SmartLab-contain h2, .content-section h2 {
    font-size: clamp(1.8rem, 4vw, 2.5rem);
    margin: 15px 0 20px 0;
    font-weight: 700;
    letter-spacing: -1px;
    line-height: 1.2;
}

p.intro-text {
    font-size: clamp(0.95rem, 2vw, 1rem);
    color: var(--text-gray);
    max-width: 800px;
    margin-bottom: clamp(20px, 4vw, 40px);
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

.card {
    padding: clamp(20px, 3vw, 30px);
    transition: transform 0.2s ease-in-out;
    height: 100%;
}

.card:hover {
    transform: translateY(-5px);
}

.card h3 {
    font-size: 1.25rem;
    margin-bottom: 15px;
    font-weight: 700;
}

.card p {
    font-size: 0.95rem;
    line-height: 1.4;
}

.bg-teal { background-color: var(--teal); color: #000; }
.bg-yellow { background-color: var(--yellow); color: #000; }
.bg-red { background-color: var(--red); color: #000; }

ol.numbered-list {
    list-style: none;
    padding: 0;
}

ol.numbered-list li {
    border-bottom: 1px solid var(--border-light);
    padding: clamp(15px, 3vw, 25px) 0;
}

ol.numbered-list li:first-child {
    border-top: 1px solid var(--border-light);
}

ol.numbered-list li section h3 {
    display: flex;
    align-items: flex-start;
    font-size: clamp(1.05rem, 2vw, 1.2rem);
    font-weight: 700;
    margin-bottom: 10px;
    line-height: 1.3;
}

ol.numbered-list li section h3 span {
    font-size: 0.9rem;
    font-weight: bold;
    margin-right: clamp(15px, 3vw, 30px);
    margin-top: 2px;
    flex-shrink: 0;
}

ol.numbered-list li section p {
    color: var(--text-gray);
    padding-left: clamp(35px, 6vw, 50px);
    max-width: 900px;
    font-size: clamp(0.9rem, 2vw, 1rem);
}

.floor-section {
    margin-bottom: clamp(25px, 5vw, 40px);
}

.floor-section h3 {
    font-size: 1.2rem;
    margin-bottom: 5px;
}

.floor-section > p {
    color: var(--text-gray);
    margin-bottom: 20px;
    font-size: clamp(0.9rem, 2vw, 1rem);
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: clamp(10px, 2vw, 20px);
}

.gallery-grid section img {
    width: 100%;
    aspect-ratio: 4 / 3;
    object-fit: cover;
    display: block;
    border-radius: 4px;
}

footer.main-footer {
    width: 100%;
    border-top: 8px solid var(--footer-border);
    padding: clamp(40px, 6vw, 60px) max(20px, calc(50% - 600px)) 20px;
    margin-top: clamp(40px, 8vw, 80px);
}

.footer-top {
    display: flex;
    justify-content: space-between;
    gap: clamp(30px, 6vw, 60px);
    margin-bottom: clamp(30px, 5vw, 40px);
    flex-wrap: wrap;
}

.footer-intro {
    flex: 1 1 300px;
    max-width: 400px;
}

.footer-intro h2 {
    font-size: clamp(2rem, 5vw, 3rem);
    line-height: 1.1;
    font-weight: 800;
    margin-bottom: 10px;
}

.footer-intro em {
    display: block;
    color: var(--teal);
    font-style: italic;
    font-family: 'Brush Script MT', cursive, sans-serif;
    font-size: clamp(1.2rem, 3vw, 1.5rem);
    margin-bottom: 20px;
}

.footer-intro p {
    font-size: 0.85rem;
    color: var(--text-gray);
}

.footer-links {
    display: flex;
    gap: clamp(30px, 6vw, 80px);
    flex: 1 1 300px;
    justify-content: flex-end;
    flex-wrap: wrap;
}

.footer-links ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 15px;
    flex: 1;
    min-width: 150px;
}

.footer-links a {
    color: var(--text-dark);
    text-decoration: none;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 10px;
    border-bottom: 1px solid var(--border-light);
    padding-bottom: 10px;
    width: 100%;
    max-width: 250px;
    justify-content: space-between;
}

.footer-links a span {
    color: var(--border-light);
    font-size: 0.8rem;
}

.footer-contact {
    font-style: normal;
    text-align: right;
    margin-bottom: 40px;
}

.footer-contact a.contact-email {
    color: var(--teal);
    font-weight: bold;
    text-decoration: none;
    font-size: clamp(1rem, 2.5vw, 1.1rem);
    display: inline-block;
    margin-bottom: 5px;
    word-break: break-all;
}

.footer-bottom {
    display: flex;
    justify-content: space-between;
    border-top: 1px solid var(--border-light);
    padding-top: 20px;
    color: var(--text-gray);
    flex-wrap: wrap;
    gap: 10px;
}

.fade-element {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.fade-element.visible {
    opacity: 1;
    transform: translateY(0);
}

@media (max-width: 768px) {
    .hamburger {
        display: block; 
    }

    nav {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: #ffffff;
        flex-direction: column;
        padding: 20px 0;
        box-shadow: 0 10px 15px rgba(0,0,0,0.05);
        opacity: 0;
        transform: translateY(-10px);
        pointer-events: none;
        transition: opacity 0.3s ease, transform 0.3s ease;
        z-index: 99;
    }

    nav.nav-open {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    nav ul {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
        width: 100%;
        padding: 0 max(20px, calc(50% - 600px)); 
    }
    
    nav ul li {
        width: 100%;
    }

    nav a {
        display: block;
        width: 100%;
        padding: 10px 0;
    }

    .icon-arrow {
        display: none;
    }

    .hamburger.open span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 6px);
    }

    .hamburger.open span:nth-child(2) {
        opacity: 0;
    }

    .hamburger.open span:nth-child(3) {
        transform: rotate(-45deg) translate(5px, -6px);
    }

    .SmartLab-o_nas {
        flex-direction: column;
        text-align: center;
    }

    .hero-text p {
        max-width: 100%;
        margin: 0 auto;
    }

    .SmartLab-images {
        justify-content: center;
    }

    .footer-links {
        justify-content: flex-start;
    }

    .footer-contact {
        text-align: left;
    }
}
</style>
<!-- <header>
    <a href="#"> 
        <img src="{{asset('image/logo.png')}}" alt="logo">
    </a>    
    
    <button class="hamburger" aria-label="=">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <nav>
        <ul>
            <li><a href="#" class="nav-link active">O SmartLabe</a></li>
            <li><a href="#" class="nav-link">Aktuality</a></li>
            <li><a href="#" class="nav-link">Projekty</a></li>
            <li><a href="#" class="nav-link">Podujatia</a></li>
            <li><a href="#" class="nav-link">Partneri</a></li>
            <li><a href="#" class="nav-link">Kontakt</a></li>
            <li><a href="#" class="nav-link">Študenti</a></li>
        </ul>
        <span class="icon-arrow">↗</span>
    </nav>
</header> -->

<main>
     <section class="SmartLab-o_nas">
            <section class="hero-text">
                <small>SMARTLAB UCM & TRNAVA / 01</small>
                <h1>O SmartLabe</h1>
                <p>SmartLab vznikol ako spoločná iniciatíva Univerzity sv. Cyrila a Metoda v Trnave a mesta Trnava zameraná na podporu vzdelávania, aplikovaného výskumu a spolupráce medzi akademickou sférou, verejným sektorom a odbornou praxou.</p>
            </section>
            
            <section class="SmartLab-images">
                <img src="{{asset('image/smartlab.png')}}" alt="smartlab">
            </section>
        </section>

        <hr>

      
        <section class="SmartLab-contain">
            <small>01 / SMARTLAB</small>
            <h2>Priestor pre nápady.</h2>
            <p class="intro-text">Jeho vznik zároveň nadväzuje na podporu študijného odboru Informatika, ktorý je Ministerstvom školstva, výskumu, vývoja a mládeže SR zaradený medzi nedostatkové študijné odbory. Cieľom SmartLabu je prispieť k rozvoju digitálnych kompetencií, zvýšeniu záujmu o štúdium informatiky a vytváraniu priestoru pre inovácie a technologický rozvoj.</p>

            <section class="grid">
                <section class="card bg-teal">
                    <h3>Čo je SmartLab?</h3>
                    <p>SmartLab je inovačný ekosystém, ktorý prepája akademickú sféru s praxou a vytvára priestor pre spoluprácu vo výskume, vzdelávaní a implementácii moderných technológií.</p>
                </section>
                
                <section class="card bg-yellow">
                    <h3>Inovácie</h3>
                    <p>Podporujeme kreatívne nápady a inovačné riešenia v oblasti digitálnych technológií.</p>
                </section>

                <section class="card bg-red">
                    <h3>Spolupráca</h3>
                    <p>Združujeme študentov, akademikov, firmy a samosprávu na spoločných projektoch.</p>
                </section>

                <section class="card bg-teal">
                    <h3>Vzdelávanie</h3>
                    <p>Poskytujeme praktické vzdelávanie a workshopy zamerané na reálne potreby trhu.</p>
                </section>

                <section class="card bg-yellow">
                    <h3>Rozvoj</h3>
                    <p>Podporujeme udržateľný rozvoj a digitálnu transformáciu regiónu.</p>
                </section>
            </section>
        </section>
        

        <hr>

        <!-- Sekcia: Naše hodnoty -->
        <section class="content-section">
            <small>02 / SMARTLAB</small>
            <h2>Naše hodnoty</h2>
            <p class="intro-text">SmartLab je postavený na princípoch otvorenosti, partnerstva, kvality a spoločenskej zodpovednosti. Tieto hodnoty určujú spôsob spolupráce, výber tém aj hodnotenie aktivít, ktoré majú dlhodobý prínos pre univerzitu, verejný sektor a regionálne prostredie.</p>

            <section class="grid">
                <section class="card bg-teal">
                    <h3>Otvorenosť</h3>
                    <p>Transparentné a predvídateľné fungovanie, ktoré podporuje medziodborovú výmenu poznatkov a prístupnosť aktivít pre definované cieľové skupiny.</p>
                </section>

                <section class="card bg-yellow">
                    <h3>Partnerstvo</h3>
                    <p>Dlhodobá spolupráca založená na rovnosti, vzájomnom rešpekte a jasne vymedzených úlohách, právach a zodpovednostiach všetkých zapojených strán.</p>
                </section>

                <section class="card bg-red">
                    <h3>Kvalita</h3>
                    <p>Dôraz na odbornú úroveň, vecnú presnosť, metodickú primeranosť a dlhodobý prínos realizovaných aktivít aj ich výsledkov.</p>
                </section>

                <section class="card bg-teal">
                    <h3>Spoločenská zodpovednosť</h3>
                    <p>Orientácia na verejný záujem, regionálne potreby a zodpovedné využívanie digitálnych a technologických riešení v podmienkach spoločenskej transformácie.</p>
                </section>
            </section>
        </section>

        <hr>
        
        <!-- Sekcia: Naše ciele -->
        <section class="content-section">
            <small>03 / SMARTLAB</small>
            <h2>Naše ciele</h2>
            <p class="intro-text">Hlavným cieľom SmartLabu je vytvoriť a dlhodobo udržiavať stabilnú interdisciplinárnu univerzitnú platformu, ktorá prepája vzdelávacie, výskumné a aplikačné aktivity univerzity s potrebami samosprávy, verejných inštitúcií, podnikateľského sektora a občianskej spoločnosti.</p>

            <ol class="numbered-list">
                <li>
                    <section>
                        <h3><span>01</span> Stabilná interdisciplinárna platforma spolupráce</h3>
                        <p>Vytvoriť rámec pre systematickú spoluprácu medzi študijnými programami, pracoviskami univerzity a externými partnermi pri spoločných aktivitách.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3><span>02</span> Prepájanie vzdelávania a výskumu s potrebami mesta a regiónu</h3>
                        <p>Prepájať výučbu a výskum s potrebami mesta Trnava, KIRA, verejného sektora a regionálneho prostredia tak, aby mali akademické poznatky praktický prínos.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3><span>03</span> Praktická aplikácia poznatkov a transfer odborných kapacít</h3>
                        <p>Vytvárať podmienky na uplatnenie poznatkov v praxi prostredníctvom projektov, pilotných iniciatív a spoločných riešení s externými partnermi.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3><span>04</span> Rozvoj odborných, digitálnych a analytických zručností</h3>
                        <p>Rozvíjať odborné, digitálne a analytické zručnosti študentov a účastníkov aktivít vrátane zodpovedného využívania digitálnych technológií a umelej inteligencie.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3><span>05</span> Dlhodobá a udržateľná spolupráca</h3>
                        <p>Budovať dlhodobé partnerstvá založené na spolupráci, dôvere a jasných cieľoch, ktoré podporujú rozvoj univerzity, mesta a regiónu.</p>
                    </section>
                </li>
            </ol>
        </section>

        <hr>

        <!-- Sekcia: Obsah činnosti -->
        <section class="content-section">
            <small>04 / SMARTLAB</small>
            <h2>Obsah činnosti</h2>
            <p class="intro-text">Naše aktivity pokrývajú päť kľúčových oblastí, ktoré tvoria ucelený rámec pôsobenia SmartLabu.</p>

            <ol class="numbered-list">
                <li>
                    <section>
                        <h3><span>01</span> Vzdelávacie aktivity a rozvoj kompetencií</h3>
                        <p>Rozširovanie vzdelávania o interdisciplinárne a projektovo orientované formy práce s dôrazom na odborné, digitálne a analytické kompetencie.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3><span>02</span> Výskumné aktivity</h3>
                        <p>Tvorba a overovanie poznatkov, analytické spracovanie tém a rozvoj metodických prístupov relevantných pre verejné, mestské a regionálne prostredie.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3><span>03</span> Vývoj a rozvoj aplikačných riešení</h3>
                        <p>Návrh, rozpracovanie a overovanie konkrétnych riešení s partnermi verejného sektora a regiónu s dôrazom na projektový prístup a pilotné iniciatívy.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3><span>04</span> Popularizácia vedy, technológií a vzdelávania</h3>
                        <p>Sprostredkovanie odborných poznatkov verejnosti, zvyšovanie povedomia o význame vedy a technológií a podpora digitálnej gramotnosti v regióne.</p>
                    </section>
                </li>
                <li>
                    <section>
                        <h3><span>05</span> Práca s mladými ľuďmi a rozvoj talentov</h3>
                        <p>Podpora záujmu o vedu a technológie u žiakov a študentov, budovanie talentovej základne a dlhodobejšie rozvojové aktivity v spolupráci so školami.</p>
                    </section>
                </li>
            </ol>
        </section>

        <hr>

        <!-- Sekcia: Naše priestory -->
        <section class="content-section">
            <small>05 / NAŠE PRIESTORY</small>
            <h2>Naše priestory</h2>
            <p class="intro-text">Pozri si, kde SmartLab funguje</p>

            <section class="floor-section">
                <h3>1. poschodie / 6 fotiek</h3>
                <p>Učebne a priestory určené pre výučbu, workshopy a skupinové aktivity.</p>
                <section class="gallery-grid">
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+1" alt="Interiér 1. poschodia"></section>
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+2" alt="Interiér 1. poschodia"></section>
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+3" alt="Interiér 1. poschodia"></section>
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+4" alt="Interiér 1. poschodia"></section>
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+5" alt="Interiér 1. poschodia"></section>
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+6" alt="Interiér 1. poschodia"></section>
                </section>
            </section>

            <section class="floor-section">
                <h3>2. poschodie / 5 fotiek</h3>
                <p>Kancelárske a pracovné priestory SmartLabu pre výskum, spoluprácu a projektové aktivity.</p>
                <section class="gallery-grid">
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+1" alt="Interiér 2. poschodia"></section>
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+2" alt="Interiér 2. poschodia"></section>
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+3" alt="Interiér 2. poschodia"></section>
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+4" alt="Interiér 2. poschodia"></section>
                    <section>
                        <img src="https://via.placeholder.com/400x250/cccccc/666666?text=Foto+5" alt="Interiér 2. poschodia"></section>
                </section>
            </section>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="main-footer">
        <section class="footer-top">
            <section class="footer-intro">
                <h2>Podeliť sa<br>o nápad.</h2>
                <em>Spolu vytvárame<br>digitálnu budúcnosť</em>
                <p>SmartLab je spoločný projekt Univerzity sv. Cyrila a Metoda v Trnave a mesta Trnava zameraný na rozvoj digitálnych inovácií a spolupráce medzi akademickým prostredím, samosprávou a praxou.</p>
            </section>

            <nav class="footer-links">
                <ul>
                    <li><a href="#"><span>01</span> O SmartLabe ↗</a></li>
                    <li><a href="#"><span>02</span> Aktuality ↗</a></li>
                    <li><a href="#"><span>03</span> Projekty ↗</a></li>
                    <li><a href="#"><span>04</span> Podujatia ↗</a></li>
                </ul>
                <ul>
                    <li><a href="#"><span>05</span> Partneri ↗</a></li>
                    <li><a href="#"><span>06</span> Kontakt ↗</a></li>
                    <li><a href="#"><span>07</span> Študenti ↗</a></li>
                </ul>
            </nav>
        </section>

        <address class="footer-contact">
            <a href="mailto:patrik.borsos@ucm.sk" class="contact-email">patrik.borsos@ucm.sk ↗</a>
            <p>Hlavná 5, 917 01 Trnava</p>
        </address>

        <section class="footer-bottom">
            <small>© 2026 SmartLab UCM & Trnava. Všetky práva vyhradené.</small>
            <small>UCM + Mesto Trnava</small>
        </section>
    </footer>

    <script >
            document.addEventListener('DOMContentLoaded', () => {
    

    const navLinks = document.querySelectorAll('nav a.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            navLinks.forEach(item => item.classList.remove('active'));
            event.currentTarget.classList.add('active');
        });
    });


    const hamburgerBtn = document.querySelector('.hamburger');
    const navMenu = document.querySelector('nav');

    if (hamburgerBtn && navMenu) {
        hamburgerBtn.addEventListener('click', () => {
            hamburgerBtn.classList.toggle('open'); // Zmení hamburger na krížik
            navMenu.classList.toggle('nav-open'); // Vysunie/zasunie menu
        });
    }

   
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

    const elementsToAnimate = document.querySelectorAll('main > section, main hr, article.card, footer.main-footer');
    
    elementsToAnimate.forEach(el => {
        el.classList.add('fade-element');
        observer.observe(el);
    });
});


    </script>
    
</body>
</html>







</html>