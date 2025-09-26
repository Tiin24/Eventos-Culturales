<form method="GET" action="index.php" class="flex flex-wrap gap-4 items-center justify-center mb-8">
    <input type="hidden" name="action" value="list">

    <!-- Búsqueda -->
    <input
        type="text"
        name="search"
        placeholder="Buscar eventos..."
        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
        class="px-4 py-2 border rounded w-64 cursor-text">

    <!-- Categoría -->
    <select name="category" class="px-4 py-2 border rounded cursor-pointer">
        <option value="">Todas las categorías</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat->getId() ?>" <?= ($_GET['category'] ?? '') == $cat->getId() ? 'selected' : '' ?>>
                <?= ucfirst($cat->getName()) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Orden por fecha -->
    <select name="order" class="px-4 py-2 border rounded cursor-pointer">
        <option value="asc" <?= ($_GET['order'] ?? '') === 'asc' ? 'selected' : '' ?>>Fecha ascendente</option>
        <option value="desc" <?= ($_GET['order'] ?? '') === 'desc' ? 'selected' : '' ?>>Fecha descendente</option>
    </select>

    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" name="upcoming" value="1" <?= isset($_GET['upcoming']) ? 'checked' : '' ?>>
        <span>Solo próximos eventos</span>
    </label>

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 cursor-pointer">
        Filtrar
    </button>
</form>