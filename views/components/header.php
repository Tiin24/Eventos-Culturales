<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestor de Eventos</title>
    <script async src="https://basicons.xyz/embed.js"> </script>
    <script src="public/js/modal.js" defer></script>
    <script src="public/js/modalEdit.js" defer></script>
    <script src="public/js/alert.js"></script>
    <link rel="stylesheet" href="public/css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://turismo.buenosaires.gob.ar/sites/turismo/files/favicon_0.ico">
</head>

<body>
    <?php if (isset($_SESSION['success']) || isset($_SESSION['error'])): ?>
        <div id="toast-container"
            data-message="<?= htmlspecialchars($_SESSION['success'] ?? $_SESSION['error']) ?>"
            data-type="<?= isset($_SESSION['success']) ? 'success' : 'error' ?>"
            class="fixed top-4 right-4 z-50"></div>
        <?php unset($_SESSION['success'], $_SESSION['error']); ?>
    <?php endif; ?>


    <header class="flex border-t-25 border-yellow-400 p-4 justify-between items-center">

        <nav class="flex gap-4 w-screen justify-between items-center p-4 bg-white shadow">
            <img src="https://turismo.buenosaires.gob.ar/sites/turismo/files/arrobaturismo-bac-300x150-negro.png?asd" alt="Logo" class="h-12">

            <button
                class="btnOpenModal font-bold cursor-pointer transition">
                + Agregar Evento
            </button>
            <button id="uninstall-module" class="font-bold cursor-pointer transition px-4 py-2 bg-white rounded hover:bg-red-700">
                🧹 Eliminar Eventos
            </button>
        </nav>
        <hr>
    </header>