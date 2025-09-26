document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            if (!confirm('¿Estás seguro de que querés eliminar este evento?')) {
                e.preventDefault();
            }
        });
    });
});
