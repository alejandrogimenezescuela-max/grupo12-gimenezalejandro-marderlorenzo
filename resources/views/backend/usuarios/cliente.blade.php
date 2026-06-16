@extends("plantilla")
@section('title', 'Perfil')
@section('content')



<div class="container mt-5 mb-4">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            {{-- CAMBIO 1: Nombre y Apellido en el saludo de bienvenida --}}
            <h1 class="fw-bold text-dark mb-1" style="font-size: 2.5rem;">Bienvenido, {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</h1>
            <p class="text-muted fs-5">Este es tu panel de perfil donde puedes modificar tus datos y gestionar tu cuenta.</p>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-tatami-red">
                Cerrar Sesión
            </button>
        </form>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4">

        <div class="col-md-5">
            <div class="card-custom d-flex flex-column justify-content-between">
                <div>
                    <h3 class="text-tatami-red mb-4">Mis Datos</h3>

                    <div class="d-flex flex-column align-items-center text-center border-bottom pb-4 mb-4">
                        <div class="avatar-circle shadow-sm">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        {{-- CAMBIO 2: Nombre y Apellido sobre el badge de Cliente --}}
                        <h4 class="fw-bold text-dark m-0">{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</h4>
                        <span class="badge bg-secondary mt-2">Cliente Preferencial</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted fw-bold small">Nombre Completo:</label>
                        {{-- CAMBIO 3: Nombre y Apellido en la etiqueta de Nombre Completo --}}
                        <p class="fs-5 text-dark fw-semibold mb-0">{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted fw-bold small">Email:</label>
                        <p class="fs-5 text-dark fw-semibold mb-0">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-muted fw-bold small">Membership ID:</label>
                        <p class="fs-6 text-dark font-monospace mb-0">TH-00{{ auth()->user()->id }}</p>
                    </div>

                    <div class="alert alert-light border text-center py-2 mb-3" style="border-radius: 10px;">
                        <span class="fw-bold text-success"><i class="bi bi-check-circle-fill"></i> Suscripción: Activa</span>
                    </div>
                </div>

                <div class="mt-2">
                    <a href="{{ url('/construccion') }}" class="btn btn-tatami-cart w-100 py-2.5 text-center d-block text-decoration-none">
                        <i class="bi bi-cart-fill me-2"></i> Ver tu carrito
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card-custom">
                <h3 class="text-tatami-red mb-4">Dirección de Envío</h3>

                <div class="bg-light p-3 rounded-3 mb-4 border-start border-4 border-dark">
                    <h5 class="fw-bold text-dark mb-2">Dirección Actual Guardada:</h5>
                    @if(auth()->user()->direccion)
                        <p class="mb-1 text-dark"><strong>Calle y Altura:</strong> {{ auth()->user()->direccion }}</p>
                        <p class="mb-0 text-dark"><strong>Teléfono:</strong> {{ auth()->user()->telefono }}</p>
                    @else
                        <p class="mb-0 text-muted italic">No tenés ninguna dirección registrada todavía.</p>
                    @endif
                </div>

                @if(session('success'))
                    <div class="alert alert-success py-2" style="border-radius: 8px;">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('cliente.guardar_direccion') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Dirección (Calle, Número, Localidad)</label>
                        <input type="text" class="form-control form-control-lg" id="nueva_direccion" name="direccion"
                               value="{{ auth()->user()->direccion }}" placeholder="Ej: Av. Raúl Alfonsín 3525, Corrientes" style="border-radius: 8px;" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">Teléfono de Contacto</label>
                        <input type="text" class="form-control form-control-lg" id="telefono" name="telefono"
                               value="{{ auth()->user()->telefono }}" placeholder="Ej: 3794123456" style="border-radius: 8px;" required>
                    </div>

                    <button type="submit" class="btn btn-tatami-outline-red py-2 fs-5 mb-3">
                        Guardar Dirección
                    </button>
                </form>

                <div class="text-center mt-3">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none text-muted fw-bold small">
                            <i class="bi bi-box-arrow-right"></i> Salir de la Cuenta
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
