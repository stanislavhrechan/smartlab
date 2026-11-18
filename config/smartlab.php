<?php

return [
    'room_floors' => [
        'first' => [
            'label' => '1. poschodie',
            'photo_count' => 6,
            'description' => 'Učebne a priestory určené pre výučbu, workshopy a skupinové aktivity.',
            'rooms' => [
                'computer-lab' => [
                    'name' => 'Počítačová učebňa',
                    'capacity' => 16,
                    'description' => 'Priestor na výučbu a praktickú prácu s počítačmi.',
                    'equipment' => ['Počítačové pracoviská'],
                    'image' => 'images/room-first-floor-02.jpg',
                ],
                'meeting-room-first' => [
                    'name' => 'Zasadacia miestnosť na 1. poschodí',
                    'capacity' => 12,
                    'description' => 'Zasadacia miestnosť pre tímové stretnutia a spoluprácu.',
                    'equipment' => ['Projektor', 'Wi-Fi pripojenie', 'Workshop vybavenie'],
                    'image' => 'images/room-first-floor-01.jpg',
                ],
                'seminar-room' => [
                    'name' => 'Seminárna miestnosť',
                    'capacity' => null,
                    'description' => 'Priestor vhodný na semináre, workshopy a skupinové aktivity.',
                    'equipment' => [],
                    'image' => 'images/room-first-floor-03.jpg',
                ],
            ],
        ],
        'second' => [
            'label' => '2. poschodie',
            'photo_count' => 5,
            'description' => 'Kancelárske a pracovné priestory SmartLabu pre výskum, spoluprácu a projektové aktivity.',
            'rooms' => [
                'workspaces-second-floor' => [
                    'name' => 'Kancelárske a pracovné priestory',
                    'capacity' => null,
                    'description' => 'Priestor pre výskum, spoluprácu a projektové aktivity.',
                    'equipment' => [],
                    'image' => 'images/room-second-floor-01.jpg',
                ],
            ],
        ],
    ],
    'availability_demo' => [
        'computer-lab' => [
            1 => [['start' => '09:00', 'end' => '10:00'], ['start' => '13:00', 'end' => '14:00']],
            3 => [['start' => '10:00', 'end' => '11:00'], ['start' => '14:00', 'end' => '15:00']],
            5 => [['start' => '09:00', 'end' => '10:00']],
        ],
        'meeting-room-first' => [
            2 => [['start' => '11:00', 'end' => '12:00']],
            3 => [['start' => '09:00', 'end' => '10:00']],
            4 => [['start' => '14:00', 'end' => '16:00']],
        ],
        'seminar-room' => [
            1 => [['start' => '13:00', 'end' => '14:00']],
            3 => [['start' => '09:00', 'end' => '10:00'], ['start' => '15:00', 'end' => '16:00']],
        ],
        'workspaces-second-floor' => [
            2 => [['start' => '09:00', 'end' => '10:00']],
            4 => [['start' => '11:00', 'end' => '12:00'], ['start' => '15:00', 'end' => '16:00']],
        ],
    ],
];
