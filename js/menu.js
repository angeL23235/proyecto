    document.addEventListener('DOMContentLoaded', function() {
        // Seleccionar el botón de hamburguesa
        const sidebarToggle = document.getElementById('sidebarToggle');
        // Seleccionar el contenedor del menú
        const layoutSidenav = document.getElementById('layoutSidenav');

        // Agregar evento de click al botón de hamburguesa
        sidebarToggle.addEventListener('click', function() {
            // Alternar la visibilidad del menú
            if (layoutSidenav.style.display !== 'none') {
                layoutSidenav.style.display = 'none';
            } else {
                layoutSidenav.style.display = 'block';
            }
        });
    });
