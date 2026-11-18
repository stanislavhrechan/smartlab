<?php

use App\Models\User;

test('public frontend pages render with the shared layout and active navigation', function (string $routeName) {
    $response = $this->get(route($routeName));

    $response->assertOk()
        ->assertSee('site-header')
        ->assertSee('site-footer');

    if ($routeName !== 'contacts') {
        $response->assertSee('aria-current="page"', false);
    }
})->with([
    'home',
    'about',
    'news',
    'projects',
    'events',
    'partners',
    'contacts',
    'students',
    'reservations.create',
]);

test('admin dashboard still renders with its dashboard layout', function () {
    $this->actingAs(User::factory()->create())
        ->get(route('dashboard'))
        ->assertOk();
});

test('projects page uses the news card design and keeps project filters', function () {
    $this->get(route('projects'))
        ->assertOk()
        ->assertSee('<section class="page-hero listing-page-hero">', false)
        ->assertSee('<section class="news projects-page">', false)
        ->assertSee('<div class="news-grid">', false)
        ->assertSee('<article class="news-card project-card"', false)
        ->assertSee('data-filter="iot"', false)
        ->assertSee('<dialog class="article-dialog project-dialog"', false);
});

test('news and projects pages share an aligned listing hero', function () {
    foreach (['news', 'projects'] as $routeName) {
        $this->get(route($routeName))
            ->assertOk()
            ->assertSee('<section class="page-hero listing-page-hero">', false);
    }
});

test('header links to reservations while contact remains in the footer', function () {
    $content = $this->get(route('about'))->assertOk()->getContent();
    $headerEnd = strpos($content, '</header>');
    $footerStart = strpos($content, '<footer class="site-footer">');
    $header = substr($content, 0, $headerEnd);
    $footer = substr($content, $footerStart);

    expect($header)
        ->toContain(route('reservations.create'))
        ->toContain('Rezervácie')
        ->not->toContain('>Kontakt</a>');
    expect($footer)
        ->toContain(route('contacts'))
        ->toContain('Kontakt');
});

test('about value cards use their local value icons', function () {
    $this->get(route('about'))
        ->assertOk()
        ->assertSee('images/icons/door-open.svg')
        ->assertSee('images/icons/handshake.svg')
        ->assertSee('images/icons/badge-check.svg')
        ->assertSee('images/icons/users-round.svg');
});

test('about room showcase keeps both large floor galleries and links to reservations', function () {
    $response = $this->get(route('about'));
    $content = $response->getContent();

    $response->assertOk()
        ->assertSee('1. poschodie')
        ->assertSee('2. poschodie')
        ->assertSee('Učebne a priestory určené pre výučbu, workshopy a skupinové aktivity.')
        ->assertSee('Kancelárske a pracovné priestory SmartLabu pre výskum, spoluprácu a projektové aktivity.')
        ->assertSee(route('reservations.create'), false)
        ->assertSee('Rezervovať miestnosť')
        ->assertDontSee('Počítačová učebňa')
        ->assertDontSee('Vybavenie');

    expect(substr_count($content, 'data-gallery-carousel'))->toBe(2);
    expect(substr_count($content, 'class="btn btn-ink btn-large room-reservation-cta"'))->toBe(2);
    expect(substr_count($content, 'src="' . asset('images/room-second-floor-02.jpg') . '"'))->toBe(1);
    expect(substr_count($content, 'src="' . asset('images/room-second-floor-03.jpg') . '"'))->toBe(1);
});

test('about ideas cards share the responsive grid and background class', function () {
    $response = $this->get(route('about'));

    $response->assertOk()
        ->assertSee('<section class="grid idea-cards">', false)
        ->assertSee('class="card idea-card"', false);

    expect(substr_count($response->getContent(), 'class="card idea-card"'))->toBe(5);
});
