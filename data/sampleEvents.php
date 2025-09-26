<?php

require_once __DIR__ . '/../src/Models/Category.php';
require_once __DIR__ . '/../src/Models/Event.php';

return [
    'categories' => [
        1 => new Category(1, 'Música'),
        2 => new Category(2, 'Teatro'),
        3 => new Category(3, 'Arte'),
        4 => new Category(4, 'Danza'),
        5 => new Category(5, 'Literatura'),
        6 => new Category(6, 'Cine'),
        7 => new Category(7, 'Talleres'),
        8 => new Category(8, 'Festival'),
    ],
    'events' => [
        new Event(
            id: uniqid(),
            title: 'Festival de Jazz',
            place: 'Centro Cultural Borges',
            date: '2025-10-15',
            time: '20:00',
            category: new Category(1, 'Música'),
            description: 'Una noche de jazz con artistas nacionales e internacionales.',
            imageUrl: 'https://images.pexels.com/photos/1105666/pexels-photo-1105666.jpeg?auto=compress&cs=tinysrgb&w=800',
            capacity: 150,
            price: 1200,
            tags: ['jazz', 'música', 'festival']
        ),
        new Event(
            id: uniqid(),
            title: 'Obra "La Casa de Bernarda Alba"',
            place: 'Teatro San Martín',
            date: '2025-09-30',
            time: '21:00',
            category: new Category(2, 'Teatro'),
            description: 'Clásico de Federico García Lorca interpretado por elenco local.',
            imageUrl: 'https://images.pexels.com/photos/261763/pexels-photo-261763.jpeg?auto=compress&cs=tinysrgb&w=800',
            capacity: 200,
            price: 1500,
            tags: ['teatro', 'drama', 'lorca']
        ),
        new Event(
            id: uniqid(),
            title: 'Exposición de arte contemporáneo',
            place: 'Museo de Arte Moderno',
            date: '2025-11-05',
            time: '18:00',
            category: new Category(3, 'Arte'),
            description: 'Muestra colectiva de artistas emergentes con instalaciones interactivas.',
            imageUrl: 'https://images.pexels.com/photos/1183992/pexels-photo-1183992.jpeg?auto=compress&cs=tinysrgb&w=800',
            capacity: 100,
            price: 800,
            tags: ['arte', 'contemporáneo', 'exposición']
        ),
    ],
];
