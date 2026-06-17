@extends("plantilla")
@section('title', 'Perfil')
@section('content')

<div class="container mt-5 mb-4">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <h1 class="fw-bold text-dark mb-1" style="font-size: 2.5rem;">Bienvenido, {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</h1>
            <p class="text-muted fs-5">Panel de gestión de cuenta y datos personales.</p>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-tatami-red">Cerrar Sesión</button>
        </form>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4">
        {{-- COLUMNA IZQUIERDA: DATOS --}}
        <div class="col-md-5">
            <div class="card-custom">
                <h3 class="text-tatami-red mb-4">Mis Datos</h3>
                <div class="d-flex flex-column align-items-center text-center border-bottom pb-4 mb-4">
                    <div class="avatar-circle shadow-sm"><i class="bi bi-person-fill"></i></div>
                    <h4 class="fw-bold text-dark m-0">{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</h4>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted fw-bold small">Email:</label>
                    <p class="fs-5 text-dark fw-semibold">{{ auth()->user()->email }}</p>
                </div>
                <a href="{{ route('cliente.carrito') }}" class="btn btn-tatami-cart w-100 mb-2">Ver carrito</a>
                <a href="{{ route('cliente.historial') }}" class="btn btn-outline-dark w-100">Ver Historial</a>
            </div>
        </div>

        {{-- COLUMNA DERECHA: CONFIGURACIÓN --}}
        <div class="col-md-7">
            <div class="card-custom">
                {{-- Dirección --}}
                <h3 class="text-tatami-red mb-4">Dirección de Envío</h3>
                <form action="{{ route('cliente.guardar_direccion') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control mb-2" name="direccion" value="{{ auth()->user()->direccion }}" placeholder="Dirección" required>
                    <input type="text" class="form-control mb-3" name="telefono" value="{{ auth()->user()->telefono }}" placeholder="Teléfono" required>
                    <button type="submit" class="btn btn-tatami-outline-red w-100">Guardar Dirección</button>
                </form>

                <hr class="my-5">

                {{-- Seguridad / Cambiar Email y Contraseña --}}
                <h3 class="text-tatami-red mb-4">Seguridad de la Cuenta</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </div>
                @endif
                <form action="{{ route('cliente.updatePerfil') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nuevo Email</label>
                        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nueva Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Dejar vacío si no desea cambiarla">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Confirmar Nueva Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                   <button type="submit" class="btn btn-estatico w-100 py-2">
    Actualizar Credenciales
</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
