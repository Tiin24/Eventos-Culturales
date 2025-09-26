<?php
require_once __DIR__ . '/../src/Models/Category.php';
require_once __DIR__ . '/../src/Models/Event.php';

// Crear categorías válidas
$categories = [];
$categories[1] = new Category(1, 'music');
$categories[2] = new Category(2, 'theater');
$categories[3] = new Category(3, 'art');
$categories[4] = new Category(4, 'dance');
$categories[5] = new Category(5, 'literature');
$categories[6] = new Category(6, 'cinema');
$categories[7] = new Category(7, 'workshop');
$categories[8] = new Category(8, 'festival');

// Crear eventos de muestra
$events = [
    new Event(
        'event-jazz-night',
        'Jazz Night',
        'Teatro Colón',

        '2025-10-15',
        '20:00',
        $categories[1],
        'Una noche de jazz con artistas internacionales.',
        'https://images.pexels.com/photos/1105666/pexels-photo-1105666.jpeg?auto=compress&cs=tinysrgb&w=800',
        200,
        1500.00,
        ['jazz', 'música clásica', 'Buenos Aires']
    ),
    new Event(
        'event-hamlet',
        'Obra: Hamlet',
        'Centro Cultural San Martín',

        '2025-11-05',
        '19:30',
        $categories[2],
        'Adaptación moderna del clásico de Shakespeare.',
        'https://images.pexels.com/photos/1183992/pexels-photo-1183992.jpeg?auto=compress&cs=tinysrgb&w=800',
        120,
        1800.00,
        ['jazz', 'música clásica', 'Buenos Aires']
    ),
    new Event(
        'event-arte-contemporaneo',
        'Exposición de Arte Contemporáneo',
        'Museo de Arte Moderno',

        '2025-09-30',
        '10:00',
        $categories[3],
        'Muestra de artistas emergentes de Latinoamérica.',
        'https://images.pexels.com/photos/261763/pexels-photo-261763.jpeg?auto=compress&cs=tinysrgb&w=800',
        300,
        0.00,
        ['jazz', 'música clásica', 'Buenos Aires']
    ),
];

return [
    'events' => $events,
    'categories' => $categories
];
