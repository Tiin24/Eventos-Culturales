function toggleDescription(id, btn) {
    const desc = document.getElementById(`desc-${id}`);
    if (desc.classList.contains('line-clamp-2')) {
        desc.classList.remove('line-clamp-2');
        btn.textContent = 'Leer menos';
    } else {
        desc.classList.add('line-clamp-2');
        btn.textContent = 'Leer más';
    }
}
