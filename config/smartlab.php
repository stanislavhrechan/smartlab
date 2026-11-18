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
                    'equipment' => ['Počítačová stanica', 'Výškovo nastaviteľný stôl'],
                    'image' => 'images/room-first-floor-02.jpg',
                ],
                'meeting-room-first' => [
                    'name' => 'Zasadačka na 1. poschodí',
                    'capacity' => 12,
                    'description' => 'Zasadacia miestnosť pre tímové stretnutia a spoluprácu.',
                    'equipment' => ['Rokovací stôl'],
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
                'ucpcsi-2c' => [
                    'name' => 'UCPCSI 2c',
                    'capacity' => 21,
                    'description' => '',
                    'equipment' => [],
                    'image' => 'images/room-second-floor-01.jpg',
                ],
                'labsl-vr' => [
                    'name' => 'LABSL - Laboratórium virtuálnej reality',
                    'capacity' => 1,
                    'description' => '',
                    'equipment' => ['HTC Vive Pro', 'Valve Index Base Station', 'PC'],
                    'image' => 'images/room-second-floor-03.jpg',
                ],
                'small-meeting-room' => [
                    'name' => 'Malá zasadačia miestnosť',
                    'capacity' => 7,
                    'description' => '',
                    'equipment' => [],
                    'image' => 'images/room-second-floor-02.jpg',
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
        'ucpcsi-2c' => [
            1 => [['start' => '09:00', 'end' => '10:00']],
            3 => [['start' => '13:00', 'end' => '15:00']],
        ],
        'labsl-vr' => [
            2 => [['start' => '10:00', 'end' => '11:00']],
            4 => [['start' => '14:00', 'end' => '15:00']],
        ],
        'small-meeting-room' => [
            1 => [['start' => '11:00', 'end' => '12:00']],
            5 => [['start' => '09:00', 'end' => '10:00']],
        ],
    ],
];
