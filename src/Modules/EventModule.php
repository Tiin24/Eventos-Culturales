<?php

namespace Src\Modules;

class EventsModule
{
    public function install(): void
    {
        echo "Módulo de eventos instalado.<br>";
    }

    public function uninstall(): void
    {
        echo "Módulo de eventos desinstalado.<br>";
    }
}
