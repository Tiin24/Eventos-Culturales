<form method="POST" action="index.php?action=update">
    <input type="hidden" name="id">

    <div class="flex flex-col mb-4">
        <label for="title" class="mb-1 font-semibold">Título del evento</label>
        <input type="text" name="title" required>
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Descripción</label>
        <textarea name="description" required></textarea>
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Fecha</label>
        <input type="date" name="date" required>
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Hora</label>
        <input type="time" name="time" required>
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Ubicación</label>
        <input type="text" name="place" required>
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Categoría</label>
        <select name="category" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->getId() ?>">
                    <?= htmlspecialchars($category->getName()) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Precio</label>
        <input type="number" step="0.01" name="price">
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Capacidad</label>
        <input type="number" name="capacity">
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Etiquetas</label>
        <input type="text" name="tags">
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">URL imagen</label>
        <input type="url" name="imageUrl">
    </div>

    <div class="flex justify-end gap-2">
        <button type="button" id="btnCloseEditModal" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Actualizar</button>
    </div>
</form>