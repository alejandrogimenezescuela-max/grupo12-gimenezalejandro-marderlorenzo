<!DOCTYPE html>
<html lang="es">
<head>

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    @include('partes.header')

    <title>TatamiHUB - @yield('title')</title>
</head>
<body>
    <div id="loader">
    <img src="{{ asset('img/preloader.png') }}" alt="Cargando..." class="pulsate">
</div>
    <header>
        @include('partes.navbar')
    </header>

    <main>
        @yield('content')
    </main>

    @include('partes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
    window.addEventListener('load', function() {
        const loader = document.getElementById('loader');
        // Le damos un pequeño delay de medio segundo para que se note el efecto
        setTimeout(() => {
            loader.style.display = 'none';
        }, 500);
    });
</script>
</body>
</html>
