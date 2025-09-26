<?php

// Carga archivos base y modelos necesarios
require_once __DIR__ . '/config/bootstrap.php';
require_once __DIR__ . '/src/Models/Category.php';
require_once __DIR__ . '/src/Models/Event.php';
require_once __DIR__ . '/src/Modules/EventModule.php';
// Inicia la sesión para mantener el estado entre peticiones
session_start();
// session_destroy();
// session_start();

use Src\Modules\EventsModule;

// Si no hay datos en sesión, carga los eventos y categorías de ejemplo
if (!isset($_SESSION['eventManager']) || !isset($_SESSION['categories'])) {
    $module = new EventsModule();
    $module->install();

    $_SESSION['eventManager'] = $module->getEventManager();
    $_SESSION['categories'] = $module->getCategories();
}

if (isset($_GET['action']) && $_GET['action'] === 'uninstall') {
    $module = new EventsModule();
    $module->uninstall();
    $_SESSION['eventManager'] = $module->getEventManager();
    $_SESSION['categories'] = $module->getCategories();
    $_SESSION['success'] = '🧹 Módulo desinstalado correctamente.';
    header('Location: index.php');
    exit;
}

// Recupera el gestor de eventos y las categorías desde la sesión
$eventManager = $_SESSION['eventManager'];
$categories = $_SESSION['categories'];

// Determina la acción actual (listado, agregar, editar, etc.)
$action = $_GET['action'] ?? 'list';

// Carga el encabezado HTML
include __DIR__ . '/views/components/header.php';

// Captura filtros desde la URL
$search = strtolower($_GET['search'] ?? '');
$categoryFilter = $_GET['category'] ?? '';
$order = $_GET['order'] ?? 'asc';
$showUpcoming = isset($_GET['upcoming']) && $_GET['upcoming'] === '1';

// Aplica filtro de eventos futuros si corresponde
$baseEvents = $showUpcoming
    ? $eventManager->getUpcoming()
    : $eventManager->getAll();

// Filtra eventos por búsqueda y categoría
$filteredEvents = array_filter($baseEvents, function ($event) use ($search, $categoryFilter) {
    $matchSearch = $search === '' || str_contains(strtolower($event->getTitle() . ' ' . $event->getDescription()), $search);
    $matchCategory = $categoryFilter === '' || $event->getCategory()->getId() == $categoryFilter;
    return $matchSearch && $matchCategory;
});

// Ordena los eventos por fecha (ascendente o descendente)
usort($filteredEvents, function ($a, $b) use ($order) {
    $dateA = strtotime($a->getDate());
    $dateB = strtotime($b->getDate());
    return $order === 'asc' ? $dateA - $dateB : $dateB - $dateA;
});

// Configura paginación
$eventsPerPage = 6;
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$totalEvents = count($filteredEvents);
$totalPages = ceil($totalEvents / $eventsPerPage);
$startIndex = ($page - 1) * $eventsPerPage;
$events = array_slice($filteredEvents, $startIndex, $eventsPerPage);

// Enrutamiento según la acción solicitada
switch ($action) {
    case 'add':
        // Muestra el formulario para agregar un nuevo evento
        include __DIR__ . '/views/components/forms/form.php';
        break;

    case 'store':
        // Procesa el formulario de creación de evento
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryId = (int) $_POST['category'];
            $category = $categories[$categoryId] ?? new Category($categoryId, 'Categoría genérica');

            // Crea el nuevo evento con los datos del formulario
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

            // Agrega el evento al gestor y actualiza la sesión
            $eventManager->add($event);
            $_SESSION['eventManager'] = $eventManager;
            $_SESSION['success'] = '✅ Evento creado correctamente.';
            // Redirige al listado
            header('Location: index.php');
            exit;
        }
        break;

    case 'update':
        // Procesa el formulario de edición de evento
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $categoryId = (int) $_POST['category'];
            $category = $categories[$categoryId] ?? new Category($categoryId, 'Categoría genérica');

            // Crea el evento actualizado
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

            // Actualiza el evento en el gestor
            $eventManager->updateById($id, $updatedEvent);
            $_SESSION['eventManager'] = $eventManager;
            $_SESSION['success'] = '✅ Evento actualizado correctamente.';

            // Redirige al listado
            header('Location: index.php');
            exit;
        }
        break;

    case 'delete':
        // Procesa la eliminación de un evento
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $events = $eventManager->getAll();

            // Busca el evento por ID y lo elimina
            foreach ($events as $index => $event) {
                if ($event->getId() === $id) {
                    $eventManager->delete($index);
                    $_SESSION['eventManager'] = $eventManager;
                    $_SESSION['success'] = '🗑️ Evento eliminado correctamente.';
                    break;
                }
            }

            // Redirige al listado
            header('Location: index.php');
            exit;
        }
        break;

    default:
        // Muestra el listado de eventos
        include __DIR__ . '/views/list.php';
        break;
}

// Carga componentes adicionales
include __DIR__ . '/views/components/social.php';
include __DIR__ . '/views/components/footer.php';
