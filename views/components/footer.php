<footer>
    <!-- Top con imagen de fondo -->
    <div
        class="text-white py-10 bg-cover bg-center"
        style="background-image: url('https://turismo.buenosaires.gob.ar/profiles/standard/themes/custom/turismo/images/footer/footer2.png');">
    </div>

    <!-- Bottom oscuro -->
    <div class="bg-[#171717] text-white py-10">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">

            <!-- Columna 1: Logo + contacto + Prestadores -->
            <div class="space-y-6">
                <!-- Logo + contacto -->
                <div class="flex flex-col gap-7">
                    <div>

                        <img
                            src="https://turismo.buenosaires.gob.ar/sites/turismo/files/logo-isologo-arrobaturismo-blancox200.png?asd"
                            alt="Logo Turismo BA"
                            class="mb-4 w-50">
                    </div>
                    <div class="flex flex-col gap-3">
                        <a href="">

                            <p class="text-lg">Contacta con nosotros</p>
                        </a>
                        <a href="">

                            <p class="text-lg">Suscribite al newsletter</p>
                        </a>
                    </div>
                </div>

                <!-- Prestadores -->
                <div class="flex flex-col gap-2">
                    <h2 class="text-xl font-bold mb-2">Prestadores</h2>
                    <a href="https://turismo.buenosaires.gob.ar/es/alquileres-temporarios">

                        <p class="text-lg">Alquileres temporarios turísticos</p>
                    </a>
                    <a href="https://turismo.buenosaires.gob.ar/es/article/alojamientos-tur%C3%ADsticos">

                        <p class="text-lg">Alojamientos turísticos</p>
                    </a>
                </div>
            </div>

            <!-- Columna 2: Profesionales -->
            <div class="flex flex-col gap-2">
                <h2 class="text-xl font-bold mb-2">Profesionales</h2>
                <a href="https://turismo.buenosaires.gob.ar/es/observatorio">

                    <p class="text-lg">Observatorio Turístico</p>
                </a>
                <a href="https://turismo.buenosaires.gob.ar/es/agrupador-noticias/turismo-de-reuniones">

                    <p class="text-lg">Turismo de reuniones</p>
                </a>
                <a href="https://turismo.buenosaires.gob.ar/es/article/prensa">

                    <p class="text-lg">Prensa: material y contacto</p>
                </a>
                <a href="https://turismo.buenosaires.gob.ar/es/city-news">

                    <p class="text-lg">Noticias del Ente de Turismo</p>
                </a>
            </div>

            <!-- Columna 3: Lo más visitado -->
            <div class="flex flex-col gap-2">
                <h2 class="text-xl font-bold mb-2">Lo más visitado</h2>
                <a href="https://turismo.buenosaires.gob.ar/es/recorrido/imperdibles">
                    <p class="text-lg">Imperdibles</p>
                </a>
                <a href="https://turismo.buenosaires.gob.ar/es/article/que-hacer-esta-semana">
                    <p class="text-lg">Qué hacer esta semana</p>
                </a>
                <a href="https://turismo.buenosaires.gob.ar/es/que-hacer-en-la-ciudad">
                    <p class="text-lg">Visitas y experiencias</p>
                </a>
                <a href="https://turismo.buenosaires.gob.ar/es/agrupador-noticias/visitas-guiadas">
                    <p class="text-lg">Visitas guiadas</p>
                </a>
                <a href="https://turismo.buenosaires.gob.ar/es/article/bus-turistico">
                    <p class="text-lg">Bus turístico</p>
                </a>
            </div>

        </div>
    </div>
    <div class="bg-[#171717]">

        <hr class="border-gray-300">
        <div class="container mx-auto px-4 py-6 flex flex-col md:flex-row items-center justify-center text-sm text-gray-400 gap-4">
            <img src="https://turismo.buenosaires.gob.ar/profiles/standard/themes/custom/turismo/images/rediseno/logo-ciudad-footer.png" alt="">
            <div class="hidden md:block h-12 w-px bg-gray-500"></div>
            <a href="">

                <p class="text-lg ">Contacta con nosotros</p>
            </a>
        </div>
    </div>
</footer>

<!-- Modales -->
<?php include 'views/components/modals/modal.php'; ?>
<?php include 'views/components/modals/modalEdit.php'; ?>

<!-- Scripts -->
<script src="/public/js/modalEdit.js"></script>
<script src="/public/js/modal.js"></script>
</body>

</html>