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

            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    @if(auth()->user()->rol_id == 1)
                        <li class="nav-item">
                            <a class="nav-link fw-bold me-2" href="{{ url('/admin/dashboard') }}" style="color: #e31919 !important; transition: color 0.2s ease;">
                                <i class="bi bi-speedometer2 me-1"></i> Panel Admin
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <span class="navbar-text me-3 text-white" style="cursor: default; user-select: none; display: inline-block; vertical-align: middle;">
                            Hola, {{ explode(' ', auth()->user()->nombre)[0] }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/cliente') }}" title="Mi Perfil">
                            <i class="bi bi-person" style="font-size: 1.2rem;"></i>
                        </a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}" title="Iniciar Sesión">
                            <i class="bi bi-person" style="font-size: 1.2rem;"></i>
                        </a>
                    </li>
                @endguest

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/construccion') }}" title="Carrito">
                        <i class="bi bi-cart" style="font-size: 1.2rem;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
