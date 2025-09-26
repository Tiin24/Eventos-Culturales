<form method="POST" action="index.php?action=store">
    <div class="flex flex-col mb-4">
        <label for="title" class="mb-1 font-semibold">
            Titulo del evento
        </label>
        <input type="text" name="title" placeholder="Título" required>
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Descripción</label>
        <textarea class="" name="description" placeholder="Descripción" required></textarea>
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
        <input type="text" name="place" placeholder="Lugar" required>
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Categoría</label>
        <select name="category" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category->getId()) ?>">
                    <?= htmlspecialchars($category->getName()) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Precio</label>
        <input type="number" step="0.01" min="0" name="price" placeholder="Precio" required>
    </div>


    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Capacidad</label>
        <input type="number" name="capacity" placeholder="Capacidad" required>
    </div>

    <div class="flex flex-col mb-4">
        <label class="mb-1 font-semibold">Etiquetas (separadas por comas)</label>
        <input type="text" name="tags" placeholder="Tags separados por coma" required>
    </div>


    <div>
        <label class="mb-1 font-semibold">URL imagen</label>
        <input type="url" name="imageUrl" placeholder="URL de imagen" required>
    </div>
    <div class="flex justify-end gap-2">
        <button type="button" id="btnCloseAddModal" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar</button>
    </div>
</form>