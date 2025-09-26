document.addEventListener('DOMContentLoaded', () => {
  const editModal = document.getElementById('editModal');
  const btnCloseEdit = document.getElementById('btnCloseEditModal');
  const btnCloseEditX = document.getElementById('btnCloseEditModalX');
  const editButtons = document.querySelectorAll('.btnOpenEditModal');

  const openEditModal = () => {
    if (editModal) editModal.classList.remove('hidden');
  };

  const closeEditModal = () => {
    if (editModal) editModal.classList.add('hidden');
  };

  editButtons.forEach(button => {
    button.addEventListener('click', () => {
      const form = editModal.querySelector('form');
      if (!form) return;

      form.querySelector('[name="id"]').value = button.dataset.id || '';
      form.querySelector('[name="title"]').value = button.dataset.title || '';
      form.querySelector('[name="description"]').value = button.dataset.description || '';
      form.querySelector('[name="date"]').value = button.dataset.date || '';
      form.querySelector('[name="time"]').value = button.dataset.time || '';
      form.querySelector('[name="place"]').value = button.dataset.place || '';
      form.querySelector('[name="category"]').value = button.dataset.category || '';
      form.querySelector('[name="price"]').value = button.dataset.price || '';
      form.querySelector('[name="capacity"]').value = button.dataset.capacity || '';
      form.querySelector('[name="tags"]').value = button.dataset.tags || '';
      form.querySelector('[name="imageUrl"]').value = button.dataset.imageurl || '';

      openEditModal();
    });
  });

  btnCloseEdit?.addEventListener('click', closeEditModal);
  btnCloseEditX?.addEventListener('click', closeEditModal);

  if (editModal) {
    editModal.addEventListener('click', (e) => {
      if (e.target === editModal) closeEditModal();
    });
  }
});
