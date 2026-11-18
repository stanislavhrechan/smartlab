<?php

test('reservation page uses the shared layout and preselects the requested room', function () {
    $this->get(route('reservations.create', ['room' => 'meeting-room-first']))
        ->assertOk()
        ->assertSee('site-header')
        ->assertSee('site-footer')
        ->assertSee('name="room"', false)
        ->assertSee('Zasadačka na 1. poschodí')
        ->assertSee('selected', false)
        ->assertSee(route('reservations.store'), false)
        ->assertSee('data-room-card', false)
        ->assertSee('data-select-room="meeting-room-first"', false)
        ->assertSee('data-availability-grid', false)
        ->assertSee('Ukážkový rozvrh');
});

test('reservation catalogue lists the six reference rooms with floor, capacity labels, and equipment details', function () {
    $response = $this->get(route('reservations.create'));
    $content = $response->getContent();

    $response->assertOk()
        ->assertSee('Počítačová učebňa')
        ->assertSee('Zasadačka na 1. poschodí')
        ->assertSee('Seminárna miestnosť')
        ->assertSee('UCPCSI 2c')
        ->assertSee('LABSL - Laboratórium virtuálnej reality')
        ->assertSee('Malá zasadačia miestnosť')
        ->assertSee('Počítačová stanica')
        ->assertSee('Výškovo nastaviteľný stôl')
        ->assertSee('Rokovací stôl')
        ->assertSee('HTC Vive Pro')
        ->assertSee('Valve Index Base Station')
        ->assertSee('Vybavenie zatiaľ nie je uvedené.');

    expect(substr_count($content, 'data-room-card'))->toBe(6);
    expect(substr_count($content, 'Kapacita: neuvedená'))->toBe(6);
    expect(substr_count($content, 'data-room-floor="first"'))->toBe(3);
    expect(substr_count($content, 'data-room-floor="second"'))->toBe(3);
    expect(strpos($content, 'data-room-key="labsl-vr"'))->toBeLessThan(strpos($content, 'images/room-second-floor-03.jpg'));
    expect(strpos($content, 'data-room-key="small-meeting-room"'))->toBeLessThan(strpos($content, 'images/room-second-floor-02.jpg'));
});

test('availability endpoint returns free and occupied intervals for the requested room and date', function () {
    $date = now()->startOfWeek()->addWeek()->addDays(2)->toDateString();

    $this->getJson(route('reservations.availability', [
        'room' => 'computer-lab',
        'date' => $date,
    ]))
        ->assertOk()
        ->assertJsonPath('room', 'computer-lab')
        ->assertJsonPath('date', $date)
        ->assertJsonPath('demo', true)
        ->assertJsonPath('slots.0.start', '09:00')
        ->assertJsonPath('slots.0.status', 'free')
        ->assertJsonPath('slots.1.start', '10:00')
        ->assertJsonPath('slots.1.status', 'occupied');
});

test('availability endpoint uses the selected second-floor room schedule', function () {
    $date = now()->startOfWeek()->addWeek()->toDateString();

    $this->getJson(route('reservations.availability', [
        'room' => 'ucpcsi-2c',
        'date' => $date,
    ]))
        ->assertOk()
        ->assertJsonPath('room', 'ucpcsi-2c')
        ->assertJsonPath('slots.0.start', '09:00')
        ->assertJsonPath('slots.0.status', 'occupied');
});

test('availability endpoint rejects unknown rooms and past dates', function () {
    $this->getJson(route('reservations.availability', [
        'room' => 'unknown-room',
        'date' => now()->toDateString(),
    ]))->assertUnprocessable();

    $this->getJson(route('reservations.availability', [
        'room' => 'computer-lab',
        'date' => now()->subDay()->toDateString(),
    ]))->assertUnprocessable();
});

test('reservation requests are stored pending team confirmation', function () {
    $response = $this->post(route('reservations.store'), [
        'room' => 'computer-lab',
        'date' => now()->addDay()->toDateString(),
        'start_time' => '10:00',
        'end_time' => '11:30',
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '+421900000000',
        'organization' => 'Test organization',
        'attendees' => 16,
        'purpose' => 'Workshop',
    ]);

    $response->assertRedirect(route('reservations.create'))
        ->assertSessionHas('status');

    $this->assertDatabaseHas('room_reservation_requests', [
        'room_key' => 'computer-lab',
        'room_name' => 'Počítačová učebňa',
        'name' => 'Test User',
        'attendees' => 16,
        'status' => 'pending',
    ]);
});

test('reservation request rejects a group larger than the room capacity', function () {
    $response = $this->from(route('reservations.create'))->post(route('reservations.store'), [
        'room' => 'computer-lab',
        'date' => now()->addDay()->toDateString(),
        'start_time' => '10:00',
        'end_time' => '11:30',
        'name' => 'Test User',
        'email' => 'test@example.com',
        'attendees' => 17,
    ]);

    $response->assertRedirect(route('reservations.create'))
        ->assertSessionHasErrors('attendees');

    $this->assertDatabaseCount('room_reservation_requests', 0);
});

test('legacy room reservation URL redirects to the new reservation page', function () {
    $this->get('/rezervation/rooms')
        ->assertRedirect(route('reservations.create'));
});
