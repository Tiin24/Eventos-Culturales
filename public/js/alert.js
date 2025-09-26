document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('toast-container');
    if (container) {
        const message = container.dataset.message;
        const type = container.dataset.type;

        const toast = document.createElement('div');
        toast.className = `
            flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg text-white
            ${type === 'success' ? 'bg-green-600' : 'bg-red-600'}
            animate-slide-in
        `;
        toast.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="${type === 'success' ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12'}" />
            </svg>
            <span>${message}</span>
        `;

        container.appendChild(toast);

        // Eliminar el toast después de 4 segundos
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-[-10px]');
            setTimeout(() => toast.remove(), 500);
        }, 4000);
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const uninstallBtn = document.getElementById('uninstall-module');
    if (uninstallBtn) {
        uninstallBtn.addEventListener('click', function () {
            if (confirm('¿Estás seguro de que querés eliminar todos los eventos?')) {
                window.location.href = 'index.php?action=uninstall';
            }
        });
    }
});
