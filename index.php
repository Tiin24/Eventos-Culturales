<?php

require_once __DIR__ . '/config/bootstrap.php';
require_once __DIR__ . '/src/Models/Category.php';
require_once __DIR__ . '/src/Models/Event.php';

// Agregá esto al principio del archivo
session_start();
// session_destroy();
// session_start();

use Src\Services\EventManager;

if (!isset($_SESSION['eventManager']) || !isset($_SESSION['categories'])) {
    $data = require __DIR__ . '/data/sampleEvents.php';
    $_SESSION['eventManager'] = new EventManager($data['events']);
    $_SESSION['categories'] = $data['categories'];
}


$eventManager = $_SESSION['eventManager'];
$categories = $_SESSION['categories'];

// Acción actual
$action = $_GET['action'] ?? 'list';

// Header
include __DIR__ . '/views/components/header.php';

$search = strtolower($_GET['search'] ?? '');
$categoryFilter = $_GET['category'] ?? '';
$order = $_GET['order'] ?? 'asc';

$filteredEvents = array_filter($eventManager->getAll(), function ($event) use ($search, $categoryFilter) {
    $matchSearch = $search === '' || str_contains(strtolower($event->getTitle() . ' ' . $event->getDescription()), $search);
    $matchCategory = $categoryFilter === '' || $event->getCategory()->getId() == $categoryFilter;
    return $matchSearch && $matchCategory;
});

// Ordenar por fecha
usort($filteredEvents, function ($a, $b) use ($order) {
    $dateA = strtotime($a->getDate());
    $dateB = strtotime($b->getDate());
    return $order === 'asc' ? $dateA - $dateB : $dateB - $dateA;
});

$eventsPerPage = 6; // o el número que prefieras
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$allEvents = $filteredEvents;
$totalEvents = count($allEvents);
$totalPages = ceil($totalEvents / $eventsPerPage);

$startIndex = ($page - 1) * $eventsPerPage;
$events = array_slice($allEvents, $startIndex, $eventsPerPage);

// Routing
switch ($action) {
    case 'add':
        // Mostrar formulario (puede estar en modal o en página)
        include __DIR__ . '/views/components/forms/form.php';
        break;

    case 'store':
        // Procesar formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryId = (int) $_POST['category'];
            $category = $categories[$categoryId] ?? new Category($categoryId, 'Categoría genérica');


            $event = new Event(
                id: uniqid(),
                title: $_POST['title'],
                place: $_POST['place'],
                date: $_POST['date'],
                time: $_POST['time'],
                category: $category,
                description: $_POST['description'],
                imageUrl: $_POST['imageUrl'],
                capacity: $_POST['capacity'],
                price: $_POST['price'],
                tags: explode(',', $_POST['tags'])
            );

            $eventManager->add($event);
            $_SESSION['eventManager'] = $eventManager;
            header('Location: index.php');
            exit;
        }
        break;


    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $categoryId = (int) $_POST['category'];
            $category = $categories[$categoryId] ?? new Category($categoryId, 'Categoría genérica');

            $updatedEvent = new Event(
                id: $id,
                title: $_POST['title'],
                place: $_POST['place'],
                date: $_POST['date'],
                time: $_POST['time'],
                category: $category,
                description: $_POST['description'],
                imageUrl: $_POST['imageUrl'],
                capacity: $_POST['capacity'],
                price: $_POST['price'],
                tags: explode(',', $_POST['tags'])
            );

            $eventManager->updateById($id, $updatedEvent);
            $_SESSION['eventManager'] = $eventManager;
            $_SESSION['success'] = '✅ Evento actualizado correctamente.';

            header('Location: index.php');
            exit;
        }
        break;



    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $index = $_POST['index'];
            $eventManager->delete($index);
            $_SESSION['eventManager'] = $eventManager;
            header('Location: index.php');
            exit;
        }
        break;

    default:
        include __DIR__ . '/views/list.php';
        break;
}

// Social
include __DIR__ . '/views/components/social.php';
// Footer
include __DIR__ . '/views/components/footer.php';
