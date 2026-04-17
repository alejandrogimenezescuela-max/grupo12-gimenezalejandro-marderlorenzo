<footer>
    <div class="info-banner mt-5 py-4" style="background-color: #808080;">
        <div class="container">
            <div class="row align-items-start">

                <div class="col-md-4 text-start ps-md-5">
                    <div class="mb-1">
                        <a href="{{ url('/terminos') }}" class="text-white text-decoration-none small">Términos y Condiciones</a>
                    </div>
                    <div class="mb-1">
                        <a href="{{ url('/comercializacion') }}" class="text-white text-decoration-none small">Comercialización</a>
                    </div>
                    <div class="mb-1">
                        <a href="{{ url('/nosotros') }}" class="text-white text-decoration-none small">Acerca de nosotros</a>
                    </div>
                </div>

                <div class="col-md-4 text-start text-white">
                    <div class="mb-1">
                        <p class="small mb-1"><i class="bi bi-envelope me-2"></i> contacto@tatamihub.com.ar</p>
                    </div>
                    <div class="mb-1">
                        <p class="small mb-1"><i class="bi bi-whatsapp me-2"></i> +54 379 4123456</p>
                    </div>
                    <div class="mb-1">
                        <p class="small mb-0"><i class="bi bi-geo-alt me-2"></i> Corrientes, Argentina</p>
                    </div>
                </div>

                <div class="col-md-4 d-flex flex-column align-items-md-center align-items-start mt-md-0 mt-3">
                    <p class="text-white small fw-bold mb-2">Seguinos</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
                    </div>
                </div>

            </div>


            <div class="row border-top border-secondary pt-3 mt-4">
                <div class="col-12 text-center">
                    <p class="text-white small mb-0">&copy; {{ date('Y') }} TatamiHUB. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
