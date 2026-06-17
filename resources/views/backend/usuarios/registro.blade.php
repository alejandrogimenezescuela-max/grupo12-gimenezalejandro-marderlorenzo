@extends("plantilla")
@section('title', 'Registro - TatamiHUB')
@section('content')

<div class="container my-5">
    <div class="row align-items-center">

        {{-- Columna Izquierda: Mensaje de Bienvenida --}}
        <div class="col-md-6 text-dark pe-md-5 mb-5 mb-md-0">
            <img src="{{ asset('img/miscalenea/preloader.png') }}" alt="TatamiHUB" class="img-fluid mb-4" style="max-width: 320px; height: auto;">
            <h1 class="display-4 fw-bold mb-3" style="color: #111;">¡Sumate a la comunidad!</h1>
            <p class="lead text-muted mb-4">
                Entrená tu mente, potenciá tu cuerpo.<br>
                Creá tu cuenta en TatamiHUB para ver tus pedidos y suplementos favoritos.
            </p>
        </div>

        {{-- Columna Derecha: Tarjeta del Formulario --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 20px; background-color: #fff;">

                <h2 class="text-center fw-bold mb-4" style="letter-spacing: -1px; color: #111;">CREAR CUENTA</h2>


                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 10px; color: #721c24; background-color: #f8d7da;">
                        <b style="display: block; margin-bottom: 5px;">Por favor, corregí los siguientes errores:</b>
                        <ul class="mb-0 px-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Dirección simple hacia el controlador que procese el registro --}}
                <form method="POST" action="/register">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark small">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-person text-muted"></i>
                            </span>
                            <input type="text" name="name" class="form-control border-start-0" placeholder="Ingrese su Nombre" required value="{{ old('name') }}" style="border-radius: 0 10px 10px 0; padding: 10px;">
                        </div>
                    </div>

                    {{-- Apellido --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark small">Apellido</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-person text-muted"></i>
                            </span>
                            <input type="text" name="lastname" class="form-control border-start-0" placeholder="Ingrese su Apellido" required value="{{ old('lastname') }}" style="border-radius: 0 10px 10px 0; padding: 10px;">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark small">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-envelope text-muted"></i>
                            </span>
                            <input type="email" name="email" class="form-control border-start-0" placeholder="Ingrese su Email" required value="{{ old('email') }}" style="border-radius: 0 10px 10px 0; padding: 10px;">
                        </div>
                    </div>

                    {{-- Contraseña --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark small">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-lock text-muted"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0" placeholder="Ingrese su Contraseña" required style="border-radius: 0 10px 10px 0; padding: 10px;">
                        </div>
                    </div>

                    {{-- Confirmar Contraseña --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark small">Confirmar contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-lock-fill text-muted"></i>
                            </span>
                            <input type="password" name="password_confirmation" class="form-control border-start-0" placeholder="Repita su Contraseña" required style="border-radius: 0 10px 10px 0; padding: 10px;">
                        </div>
                    </div>

                    {{-- Botón --}}
                    <button type="submit" class="btn w-100 text-white fw-bold py-2 mb-4" style="background-color: #e51b24; border-radius: 10px; font-size: 16px;">
                        Sign In
                    </button>

                    {{-- Enlace para volver al Login --}}
                    <div class="text-center small text-muted">
                        ¿Ya tenés una cuenta? <a href="/login" class="fw-bold text-danger text-decoration-none">Iniciar sesión</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection
