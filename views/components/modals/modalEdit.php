<!-- Modal Editar Evento -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center hidden z-50 backdrop-blur-sm overflow-y-auto">
  <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-lg max-h-[90vh] relative overflow-y-auto">
    <h2 class="text-xl font-bold mb-4">Editar Evento</h2>

    <?php include __DIR__ . '/../forms/formEdit.php'; ?>

    <button id="btnCloseEditModalX" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">&times;</button>
  </div>
</div>