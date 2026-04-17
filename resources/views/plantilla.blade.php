<!DOCTYPE html>
<html lang="es">
<head>
    @include('partes.header')

    <title>TatamiHUB - @yield('title')</title>
</head>
<body>

    <header>
        @include('partes.navbar')
    </header>

    <main>
        @yield('content')
    </main>

    @include('partes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
