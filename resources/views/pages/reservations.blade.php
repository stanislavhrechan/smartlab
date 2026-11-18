@extends('layouts.app')

@section('title', 'Rezervácie')
@section('body-class', 'page-site')

@section('content')
<section class="page-hero">
    <div class="page-hero-inner container">
        <div>
            <p class="eyebrow">SmartLab UCM &amp; Trnava</p>
            <h1>Rezervácie</h1>
            <p class="lead">Pošlite nám žiadosť o rezerváciu priestorov SmartLabu.</p>
        </div>
        <span class="page-hero-art" aria-hidden="true"></span>
    </div>
</section>

<div class="reservation-page" data-reservation-page data-availability-url="{{ route('reservations.availability') }}">
    <section class="reservation-catalog-section" aria-labelledby="room-catalog-title">
        <div class="container">
            <div class="reservation-catalog-heading">
                <div>
                    <p class="eyebrow">PRIESTORY SMARTLABU</p>
                    <h2 id="room-catalog-title">Vyberte si miestnosť</h2>
                    <p>Prezrite si priestory podľa poschodia a vyberte miestnosť pre svoju aktivitu.</p>
                </div>
                <div class="room-floor-filters" role="group" aria-label="Filtrovať miestnosti podľa poschodia">
                    <button type="button" class="room-floor-filter is-active" data-room-floor-filter="all" aria-pressed="true">Všetky</button>
                    @foreach ($roomFloors as $floorKey => $floor)
                        <button type="button" class="room-floor-filter" data-room-floor-filter="{{ $floorKey }}" aria-pressed="false">{{ $floor['label'] }}</button>
                    @endforeach
                </div>
            </div>

            <div class="reservation-room-grid">
                @foreach ($roomFloors as $floorKey => $floor)
                    @foreach ($floor['rooms'] as $roomKey => $room)
                        <article class="reservation-room-card" data-room-card data-room-key="{{ $roomKey }}" data-room-floor="{{ $floorKey }}">
                            <img class="reservation-room-image" src="{{ asset($room['image']) }}" alt="Priestor: {{ $room['name'] }}" loading="lazy">
                            <div class="reservation-room-content">
                                <span class="reservation-room-floor">{{ $floor['label'] }}</span>
                                <h3>{{ $room['name'] }}</h3>
                                <p class="reservation-room-description">{{ $room['description'] }}</p>
                                <p class="reservation-room-capacity">
                                    <span aria-hidden="true">◎</span>
                                    Kapacita: {{ $room['capacity'] ? $room['capacity'] . ' osôb' : 'neuvedená' }}
                                </p>
                                <div class="reservation-room-equipment">
                                    <h4>Vybavenie</h4>
                                    @if (count($room['equipment']))
                                        <ul>
                                            @foreach ($room['equipment'] as $equipment)
                                                <li>{{ $equipment }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>Vybavenie nie je uvedené.</p>
                                    @endif
                                </div>
                                <button class="btn btn-ink reservation-room-select" type="button" data-select-room="{{ $roomKey }}" aria-pressed="false">
                                    Vybrať miestnosť
                                </button>
                            </div>
                        </article>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <section class="reservation-section" id="reservation-form">
        <div class="container">
            @if (session('status'))
                <p class="reservation-alert" role="status">{{ session('status') }}</p>
            @endif

            <div class="reservation-layout">
                <section class="reservation-form-card" aria-labelledby="reservation-form-title">
                    <p class="eyebrow">ŽIADOSŤ O REZERVÁCIU</p>
                    <h2 id="reservation-form-title">Vyberte termín</h2>
                    <p class="reservation-intro">Odoslanie formulára vytvorí žiadosť, ktorú musí tím SmartLab ešte potvrdiť.</p>

                    <form action="{{ route('reservations.store') }}" method="POST" class="reservation-form" data-reservation-form>
                        @csrf

                        <div class="field">
                            <label for="room">Miestnosť</label>
                            <select id="room" name="room" required @if ($errors->has('room')) aria-invalid="true" @endif>
                                @php($selectedRoom = old('room', request()->query('room', 'computer-lab')))
                                @foreach ($roomFloors as $floor)
                                    <optgroup label="{{ $floor['label'] }}">
                                        @foreach ($floor['rooms'] as $roomKey => $room)
                                            <option value="{{ $roomKey }}" @selected($selectedRoom === $roomKey)>
                                                {{ $room['name'] }}{{ $room['capacity'] ? ' · kapacita ' . $room['capacity'] : '' }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('room')
                                <p class="field-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="reservation-fields-grid">
                            <div class="field">
                                <label for="date">Dátum</label>
                                <input id="date" name="date" type="date" min="{{ today()->toDateString() }}" value="{{ old('date', request()->query('date', today()->toDateString())) }}" required @if ($errors->has('date')) aria-invalid="true" @endif>
                                @error('date')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="attendees">Počet osôb</label>
                                <input id="attendees" name="attendees" type="number" min="1" max="100" value="{{ old('attendees', 1) }}" required @if ($errors->has('attendees')) aria-invalid="true" @endif>
                                @error('attendees')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="start_time">Začiatok</label>
                                <input id="start_time" name="start_time" type="time" value="{{ old('start_time') }}" required @if ($errors->has('start_time')) aria-invalid="true" @endif>
                                @error('start_time')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="end_time">Koniec</label>
                                <input id="end_time" name="end_time" type="time" value="{{ old('end_time') }}" required @if ($errors->has('end_time')) aria-invalid="true" @endif>
                                @error('end_time')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="reservation-fields-grid">
                            <div class="field">
                                <label for="name">Meno a priezvisko</label>
                                <input id="name" name="name" type="text" autocomplete="name" maxlength="120" value="{{ old('name') }}" required @if ($errors->has('name')) aria-invalid="true" @endif>
                                @error('name')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="email">E-mail</label>
                                <input id="email" name="email" type="email" autocomplete="email" maxlength="255" value="{{ old('email') }}" required @if ($errors->has('email')) aria-invalid="true" @endif>
                                @error('email')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="phone">Telefón <span>(nepovinné)</span></label>
                                <input id="phone" name="phone" type="tel" autocomplete="tel" maxlength="40" value="{{ old('phone') }}" @if ($errors->has('phone')) aria-invalid="true" @endif>
                                @error('phone')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="organization">Organizácia <span>(nepovinné)</span></label>
                                <input id="organization" name="organization" type="text" autocomplete="organization" maxlength="160" value="{{ old('organization') }}" @if ($errors->has('organization')) aria-invalid="true" @endif>
                                @error('organization')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="purpose">Účel rezervácie <span>(nepovinné)</span></label>
                            <textarea id="purpose" name="purpose" rows="4" maxlength="5000" @if ($errors->has('purpose')) aria-invalid="true" @endif>{{ old('purpose') }}</textarea>
                            @error('purpose')
                                <p class="field-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <p class="reservation-privacy">Kontaktné údaje použijeme len na vybavenie tejto žiadosti o rezerváciu.</p>
                        <button class="btn btn-ink btn-large" type="submit">Odoslať žiadosť</button>
                    </form>
                </section>

                <aside class="reservation-aside" aria-labelledby="availability-title">
                    <section class="availability-panel" aria-labelledby="availability-title">
                        <p class="eyebrow">DOSTUPNOSŤ</p>
                        <h2 id="availability-title">Voľné a obsadené časy</h2>
                        <p class="availability-demo-note">Ukážkový rozvrh na zobrazenie dostupnosti; termín potvrdí tím SmartLab.</p>
                        <div class="availability-legend" aria-label="Legenda">
                            <span><i class="is-free" aria-hidden="true"></i> Voľné</span>
                            <span><i class="is-occupied" aria-hidden="true"></i> Obsadené</span>
                        </div>
                        <p class="availability-status" data-availability-status role="status" aria-live="polite">Načítava sa dostupnosť…</p>
                        <div class="availability-grid" data-availability-grid aria-label="Časové intervaly"></div>
                    </section>

                    <div class="reservation-process">
                        <p class="eyebrow">AKO TO FUNGUJE</p>
                        <h2>Rezervácia v troch krokoch</h2>
                        <ol class="reservation-steps">
                            <li><span>1</span><div><h3>Vyberte priestor</h3><p>Zvoľte miestnosť, dátum a voľný čas.</p></div></li>
                            <li><span>2</span><div><h3>Odošlite žiadosť</h3><p>Tím SmartLab preverí dostupnosť a uvedené údaje.</p></div></li>
                            <li><span>3</span><div><h3>Počkajte na potvrdenie</h3><p>Termín je rezervovaný až po potvrdení tímom SmartLab.</p></div></li>
                        </ol>
                        <a class="text-link" href="{{ route('about') }}#rooms">Späť na prehľad miestností <span aria-hidden="true">↗</span></a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</div>
@endsection
