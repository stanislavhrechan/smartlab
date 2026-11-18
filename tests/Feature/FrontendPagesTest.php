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
