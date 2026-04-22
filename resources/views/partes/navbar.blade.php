<nav class="navbar navbar-expand-lg nav-de-tatamihub">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">TatamiHUB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/catalogo') }}">Catálogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/comercializacion') }}">Comercialización</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/nosotros') }}">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contacto') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/terminos') }}">Términos y Usos</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/perfil') }}" title="Perfil">
                        <i class="bi bi-person" style="font-size: 1.2rem;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/construccion') }}" title="Carrito">
                        <i class="bi bi-cart" style="font-size: 1.2rem;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
