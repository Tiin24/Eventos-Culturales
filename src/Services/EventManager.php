<?php

namespace Src\Services;

use Event as GlobalEvent;

class EventManager
{
    private array $events = [];

    public function __construct(array $initialEvents = [])
    {
        $this->events = $initialEvents;
    }

    public function getAll(): array
    {
        return $this->events;
    }

    public function add(GlobalEvent $event): void
    {
        $this->events[] = $event;
    }

    public function update(int $index, GlobalEvent $event): void
    {
        if (isset($this->events[$index])) {
            $this->events[$index] = $event;
        }
    }

    public function delete(int $index): void
    {
        if (isset($this->events[$index])) {
            unset($this->events[$index]);
        }
    }

    public function findById(string $id): ?GlobalEvent
    {
        foreach ($this->events as $event) {
            if ($event->getId() === $id) {
                return $event;
            }
        }
        return null;
    }

    public function updateById(string $id, GlobalEvent $updatedEvent): void
    {
        echo "Buscando ID: $id<br>";
        foreach ($this->events as $event) {
            echo "Comparando con: " . $event->getId() . "<br>";
        }

        foreach ($this->events as $index => $event) {
            if ($event->getId() === $id) {
                echo "✅ Coincidencia encontrada. Actualizando evento...<br>";
                $this->events[$index] = $updatedEvent;
                return;
            }
        }

        echo "⚠️ No se encontró ningún evento con ese ID.<br>";
    }
}
