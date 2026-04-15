<!DOCTYPE html>
<html lang="es">
<head>
    <title>TatamiHub - @yield('title')</title>
</head>
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body>
    <nav class="navbar navbar-expand-lg nav-de-tatamihub">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TatamiHUB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Catalogo</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/comercializacion') }}">Comercialización</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/nosotros">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/terminos') }}">Términos y Usos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <header>
        <nav>
            </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} TatamiHub - Equipamiento para Artes Marciales todos los derechos reservados</p>
    </footer>
</body>
</html>
