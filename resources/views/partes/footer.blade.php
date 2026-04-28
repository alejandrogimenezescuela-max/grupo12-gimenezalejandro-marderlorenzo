<footer class="info-banner mt-5 py-4" style="background-color: #808080;">
    <div class="container">
        <div class="row align-items-start justify-content-between">

            <div class="col-md-auto text-start">
                <div class="mb-1"><a href="{{ url('/terminos') }}" class="text-white text-decoration-none small">Términos y Condiciones</a></div>
                <div class="mb-1"><a href="{{ url('/comercializacion') }}" class="text-white text-decoration-none small">Comercialización</a></div>
                <div class="mb-1"><a href="{{ url('/nosotros') }}" class="text-white text-decoration-none small">Acerca de nosotros</a></div>
            </div>

            <div class="col-md-auto text-start text-white">
                <p class="small mb-1"><i class="bi bi-envelope me-2"></i> contacto@tatamihub.com.ar</p>
                <p class="small mb-1"><i class="bi bi-whatsapp me-2"></i> +54 379 4123456</p>
                <p class="small mb-0"><i class="bi bi-geo-alt me-2"></i> Corrientes, Argentina</p>
            </div>

            <div class="col-md-auto text-start">
                <div class="mb-1"><a href="https://www.argentina.gob.ar/economia/industria-y-comercio/defensadelconsumidor" target="_blank" class="text-white text-decoration-none small">Defensa del consumidor</a></div>
                <div class="mb-1"><a href="{{ url('/contacto') }}" class="text-white text-decoration-none small">Contactanos</a></div>
            </div>

            <div class="col-md-auto text-start">
                <p class="text-white small fw-bold mb-2">Catálogo</p>
                <div class="mb-1"><a href="{{ url('/ropa') }}" class="text-white text-decoration-none small">Ropa</a></div>
                <div class="mb-1"><a href="{{ url('/indumentaria') }}" class="text-white text-decoration-none small">Indumentaria</a></div>
                <div class="mb-1"><a href="{{ url('/suplementos') }}" class="text-white text-decoration-none small">Suplementos</a></div>
            </div>

            <div class="col-md-auto text-md-end text-start">
                <p class="text-white small fw-bold mb-2">Seguinos</p>
                <div class="d-flex justify-content-md-end gap-3">
                    <a href="https://www.instagram.com" target="_blank" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.facebook.com" target="_blank" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
                </div>
            </div>

        </div>

        <div class="row border-top border-secondary pt-3 mt-4">
            <div class="col-12 text-center">
                <p class="text-white small mb-0">&copy; {{ date('Y') }} TatamiHUB. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>
