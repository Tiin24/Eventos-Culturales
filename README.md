# 🎭 Gestor de Eventos Culturales en PHP

Aplicación web desarrollada para gestionar eventos culturales, como parte de un desafío técnico para desarrolladores PHP con proyección a Drupal.

---

## 🚀 Características principales

- ✅ Listado de eventos con filtros por búsqueda, categoría, fecha y próximos eventos
- ✅ Alta, edición y eliminación de eventos
- ✅ Validación de campos obligatorios y valores negativos
- ✅ Paginación con navegación
- ✅ Mensajes visuales tipo toast para acciones exitosas o errores
- ✅ Separación clara entre lógica y presentación
- ✅ Código modular y escalable, orientado a objetos

---

## 📦 Estructura del proyecto
``` bash
├── config/ 
│   └── bootstrap.php 
├── data/ 
│   └── sampleEvents.php 
├── public/ │ 
├── css/ 
│ │ └── index.css 
│ └── js/ 
│   └── alert.js 
├── src/ 
│ ├── Models/ 
│ │ ├── Event.php 
│ │ └── Category.php 
│ └── Services/ 
│   └── EventManager.php 
│ └── Modules/ 
│   └── EventsModule.php 
├── views/ 
│ ├── components/ 
│ │ ├── header.php 
│ │ ├── footer.php 
│ │ ├── social.php 
│ │ └── forms/ 
│ │ └── form.php 
│ └── list.php 
└── index.php
```

---

## 🧪 Cómo ejecutar la aplicación

1. Cloná o descargá el repositorio
2. Asegurate de tener PHP 7.4 o superior instalado
3. Abrí una terminal en la raíz del proyecto
4. Ejecutá el servidor embebido de PHP:

```bash
php -S localhost:8000
```
---

## 🎁 Extras implementados
✅ Filtro de eventos futuros (getUpcoming)

✅ Validación de campos obligatorios y precios negativos

✅ Toasts visuales con Tailwind CSS y JavaScript

✅ Simulación de módulo instalable (EventsModule)

✅ Código comentado y organizado para integración futura

---

## 📅 Eventos de ejemplo precargados
- **Festival de Jazz**

- **Obra "La Casa de Bernarda Alba"**

- **Exposición de arte contemporáneo**

---

## 🧪 Pruebas
Archivo testEventsModule.php funcional

Integración del módulo en index.php

Botón de desinstalación probado

## 🛠️ Requisitos técnicos
- **PHP 7.4 o superior**

- **No requiere base de datos ni frameworks externos**

- **Compatible con entornos locales (XAMPP, MAMP, PHP embebido)**

## 📄 Licencia

Este proyecto está bajo la licencia MIT.

## ✍️ Autor

Desarrollado por [Isaias Agustin Romero](https://www.linkedin.com/in/isaias-romero//)