<?php

namespace Src\Modules;

use Src\Services\EventManager;

/**
 * Clase EventsModule
 * Simula un módulo instalable que gestiona eventos culturales.
 * Contiene métodos ficticios de instalación y desinstalación, y encapsula el EventManager.
 */
class EventsModule
{
    /**
     * @var EventManager Instancia del gestor de eventos
     */
    private EventManager $eventManager;

    /**
     * @var array Lista de categorías disponibles
     */
    private array $categories = [];

    /**
     * Constructor del módulo
     * Inicializa el EventManager vacío
     */
    public function __construct()
    {
        $this->eventManager = new EventManager();
    }

    /**
     * Método ficticio de instalación del módulo
     * Carga eventos y categorías de ejemplo desde un archivo externo
     */
    public function install(): void
    {
        // Carga datos de ejemplo (eventos y categorías)
        $data = require __DIR__ . '/../../data/sampleEvents.php';

        // Guarda las categorías en el módulo
        $this->categories = $data['categories'];

        // Agrega los eventos al EventManager
        foreach ($data['events'] as $event) {
            $this->eventManager->add($event);
        }
    }

    /**
     * Método ficticio de desinstalación del módulo
     * Limpia los datos cargados
     */
    public function uninstall(): void
    {
        // Elimina todos los eventos
        $this->eventManager->clear();

        // Vacía las categorías
        $this->categories = [];
    }

    /**
     * Devuelve el gestor de eventos
     *
     * @return EventManager
     */
    public function getEventManager(): EventManager
    {
        return $this->eventManager;
    }

    /**
     * Devuelve las categorías disponibles
     *
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
}
