<?php

use App\Models\User;

test('public frontend pages render with the shared layout and active navigation', function (string $routeName) {
    $response = $this->get(route($routeName));

    $response->assertOk()
        ->assertSee('site-header')
        ->assertSee('site-footer')
        ->assertSee('aria-current="page"', false);
})->with([
    'home',
    'about',
    'news',
    'projects',
    'events',
    'partners',
    'contacts',
    'students',
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

test('about value cards use their local value icons', function () {
    $this->get(route('about'))
        ->assertOk()
        ->assertSee('images/icons/door-open.svg')
        ->assertSee('images/icons/handshake.svg')
        ->assertSee('images/icons/badge-check.svg')
        ->assertSee('images/icons/users-round.svg');
});

test('about ideas cards share the responsive grid and background class', function () {
    $response = $this->get(route('about'));

    $response->assertOk()
        ->assertSee('<section class="grid idea-cards">', false)
        ->assertSee('class="card idea-card"', false);

    expect(substr_count($response->getContent(), 'class="card idea-card"'))->toBe(5);
});
