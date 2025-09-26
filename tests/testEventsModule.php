<?php

require_once __DIR__ . '/../src/Models/Category.php';
require_once __DIR__ . '/../src/Models/Event.php';
require_once __DIR__ . '/../src/Services/EventManager.php';
require_once __DIR__ . '/../src/Modules/EventModule.php';

use Src\Modules\EventsModule;

// Instanciar el módulo
$module = new EventsModule();

// Instalar datos
$module->install();

echo "<h2>✅ Eventos cargados:</h2>";
foreach ($module->getEventManager()->getAll() as $event) {
    echo "<p><strong>{$event->getTitle()}</strong> - {$event->getPlace()} ({$event->getDate()})</p>";
}

echo "<h2>📂 Categorías disponibles:</h2>";
foreach ($module->getCategories() as $cat) {
    echo "<p>{$cat->getId()} - {$cat->getName()}</p>";
}

// Desinstalar el módulo
$module->uninstall();

// Verificar que se vació
echo "<hr><h2>🧹 Después de uninstall():</h2>";

$remainingEvents = $module->getEventManager()->getAll();
$remainingCategories = $module->getCategories();

echo "<p>Eventos restantes: " . count($remainingEvents) . "</p>";
echo "<p>Categorías restantes: " . count($remainingCategories) . "</p>";

if (empty($remainingEvents) && empty($remainingCategories)) {
    echo "<p style='color:green;'>✅ El módulo fue desinstalado correctamente.</p>";
} else {
    echo "<p style='color:red;'>⚠️ El módulo no se vació completamente.</p>";
}
