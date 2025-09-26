<?php

namespace Src\Services;

use Event as GlobalEvent;

/**
 * Clase EventManager
 * Encapsula la lógica de gestión de eventos en memoria.
 */
class EventManager
{
    /**
     * @var array Lista de eventos almacenados
     */
    private array $events = [];

    /**
     * Constructor opcional con eventos iniciales
     *
     * @param array $initialEvents Lista de eventos precargados
     */
    public function __construct(array $initialEvents = [])
    {
        $this->events = $initialEvents;
    }

    /**
     * Devuelve todos los eventos almacenados
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->events;
    }

    /**
     * Agrega un nuevo evento al listado
     *
     * @param GlobalEvent $event
     * @throws \InvalidArgumentException si faltan campos obligatorios o el precio es negativo
     */
    public function add(GlobalEvent $event): void
    {
        // Validar campos obligatorios
        if (
            empty($event->getTitle()) ||
            empty($event->getPlace()) ||
            empty($event->getDate()) ||
            empty($event->getTime()) ||
            empty($event->getCategory()) ||
            empty($event->getDescription()) ||
            empty($event->getImageUrl()) ||
            empty($event->getTags()) ||
            $event->getCapacity() === null ||
            $event->getPrice() === null
        ) {
            throw new \InvalidArgumentException("Todos los campos son obligatorios.");
        }

        // Validar longitud de descripción
        if (strlen($event->getDescription()) > 200) {
            throw new \InvalidArgumentException("La descripción no puede superar los 200 caracteres.");
        }

        // Validar precio
        if ($event->getPrice() <= 0) {
            throw new \InvalidArgumentException("El precio no puede ser negativo.");
        }

        // Validar capacidad
        if ($event->getCapacity() <= 0) {
            throw new \InvalidArgumentException("La capacidad debe ser mayor a cero.");
        }

        $this->events[] = $event;
    }


    /**
     * Actualiza un evento por índice (posición en el array)
     *
     * @param int $index
     * @param GlobalEvent $event
     */
    public function update(int $index, GlobalEvent $event): void
    {
        if (isset($this->events[$index])) {
            $this->events[$index] = $event;
        }
    }

    /**
     * Elimina un evento por índice
     *
     * @param int $index
     */
    public function delete(int $index): void
    {
        if (isset($this->events[$index])) {
            unset($this->events[$index]);
        }
    }

    /**
     * Busca un evento por su ID único
     *
     * @param string $id
     * @return GlobalEvent|null
     */
    public function findById(string $id): ?GlobalEvent
    {
        foreach ($this->events as $event) {
            if ($event->getId() === $id) {
                return $event;
            }
        }
        return null;
    }

    /**
     * Actualiza un evento por su ID
     *
     * @param string $id
     * @param GlobalEvent $updatedEvent
     */
    public function updateById(string $id, GlobalEvent $updatedEvent): void
    {
        // Validar campos obligatorios
        if (
            empty($updatedEvent->getTitle()) ||
            empty($updatedEvent->getPlace()) ||
            empty($updatedEvent->getDate()) ||
            empty($updatedEvent->getTime()) ||
            empty($updatedEvent->getCategory()) ||
            empty($updatedEvent->getDescription()) ||
            empty($updatedEvent->getImageUrl()) ||
            empty($updatedEvent->getTags()) ||
            $updatedEvent->getCapacity() === null ||
            $updatedEvent->getPrice() === null
        ) {
            throw new \InvalidArgumentException("Todos los campos son obligatorios.");
        }

        // Validar longitud de descripción
        if (strlen($updatedEvent->getDescription()) > 200) {
            throw new \InvalidArgumentException("La descripción no puede superar los 200 caracteres.");
        }

        // Validar precio
        if ($updatedEvent->getPrice() < 0) {
            throw new \InvalidArgumentException("El precio no puede ser negativo.");
        }

        // Validar capacidad
        if ($updatedEvent->getCapacity() <= 0) {
            throw new \InvalidArgumentException("La capacidad debe ser mayor a cero.");
        }

        // Buscar y actualizar el evento
        foreach ($this->events as $index => $event) {
            if ($event->getId() === $id) {
                $this->events[$index] = $updatedEvent;
                return;
            }
        }

        throw new \RuntimeException("Evento con ID {$id} no encontrado.");
    }


    /**
     * Elimina todos los eventos almacenados
     */
    public function clear(): void
    {
        $this->events = [];
    }

    /**
     * Elimina un evento por su ID
     *
     * @param string $id
     * @return bool true si se eliminó, false si no se encontró
     */
    public function deleteById(string $id): bool
    {
        foreach ($this->events as $index => $event) {
            if ($event->getId() === $id) {
                unset($this->events[$index]);
                return true;
            }
        }
        return false;
    }

    /**
     * Devuelve solo los eventos cuya fecha es igual o posterior a hoy
     *
     * @return array
     */
    public function getUpcoming(): array
    {
        $today = date('Y-m-d');
        return array_filter($this->events, fn($event) => $event->getDate() >= $today);
    }
}
