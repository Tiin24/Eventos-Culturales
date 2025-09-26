<footer>
    <!-- Top con imagen de fondo -->
    <div
        class="text-white py-10 bg-cover bg-center"
        style="background-image: url('https://turismo.buenosaires.gob.ar/profiles/standard/themes/custom/turismo/images/footer/footer2.png');">
    </div>

    <!-- Bottom oscuro -->
    <div class="bg-gray-900 text-white py-10">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">

            <!-- Columna 1: Logo + contacto + Prestadores -->
            <div class="space-y-6">
                <!-- Logo + contacto -->
                <div class="text-center">
                    <img
                        src="https://turismo.buenosaires.gob.ar/sites/turismo/files/logo-isologo-arrobaturismo-blancox200.png?asd"
                        alt="Logo Turismo BA"
                        class="mx-auto mb-4 w-32">
                    <p>Contacta con nosotros</p>
                    <p>Suscribite al newsletter</p>
                </div>

                <!-- Prestadores -->
                <div>
                    <h2 class="text-lg font-semibold mb-2">Prestadores</h2>
                    <p>Alquileres temporarios turísticos</p>
                    <p>Alojamientos turísticos</p>
                </div>
            </div>

            <!-- Columna 2: Profesionales -->
            <div>
                <h2 class="text-lg font-semibold mb-2">Profesionales</h2>
                <p>Observatorio Turístico</p>
                <p>Turismo de reuniones</p>
                <p>Prensa: material y contacto</p>
                <p>Noticias del Ente de Turismo</p>
            </div>

            <!-- Columna 3: Lo más visitado -->
            <div>
                <h2 class="text-lg font-semibold mb-2">Lo más visitado</h2>
                <p>Qué hacer esta semana</p>
                <p>Visitas y experiencias</p>
                <p>Visitas guiadas</p>
                <p>Bus turístico</p>
            </div>

        </div>
    </div>

    </div>


</footer>

<!-- Modal agregado justo antes del cierre de body -->
<!-- Modales -->
<?php include 'views/components/modals/modal.php'; ?>
<?php include 'views/components/modals/modalEdit.php'; ?>

<!-- Scripts -->
<script src="/public/js/modalEdit.js"></script>
<script src="/public/js/modal.js"></script>
</body>

</html>