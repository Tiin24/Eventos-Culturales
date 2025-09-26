document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('addModal');
  const btnClose = document.getElementById('btnCloseAddModal');
  const btnCloseX = document.getElementById('btnCloseAddModalX');
  const openButtons = document.querySelectorAll('.btnOpenModal');

  const openModal = () => modal.classList.remove('hidden');
  const closeModal = () => modal.classList.add('hidden');

  openButtons.forEach(button => {
    button.addEventListener('click', () => {
      openModal();
    });
  });

  btnClose?.addEventListener('click', closeModal);
  btnCloseX?.addEventListener('click', closeModal);

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });
});
