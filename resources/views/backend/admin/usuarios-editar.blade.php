@extends("plantilla")
@section('title', 'Editar Usuario - Tatamihub')
@section('content')

<div class="container main-container">
    <div class="dashboard-header mb-4">
        <h1 class="text-white">Editar Usuario: {{ $usuario->nombre }} {{ $usuario->apellido }}</h1>
    </div>

    <div class="tatami-table-container p-4" style="background-color: #212529; border: 1px solid #444;">
        <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-white fw-bold">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-white fw-bold">Apellido</label>
                    <input type="text" name="apellido" class="form-control" value="{{ $usuario->apellido }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="text-white fw-bold">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{ $usuario->direccion }}">
            </div>

            <div class="mb-3">
                <label class="text-white fw-bold">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $usuario->telefono }}">
            </div>

            <div class="mb-3">
                <label class="text-white fw-bold">Nueva Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="********">
                <small class="text-muted">Dejar vacío si no desea cambiarla</small>
            </div>

            <div class="d-flex justify-content-between mt-4">
    <a href="{{ route('admin.usuarios') }}"
       style="background-color: #6c757d; color: white; padding: 10px 25px; text-decoration: none; border: none; cursor: pointer; display: inline-block;">
       Cancelar
    </a>

    <button type="submit"
            style="background-color: #198754; color: white; padding: 10px 25px; border: none; cursor: pointer; font-size: 16px;">
            Guardar Cambios
    </button>
</div>
        </form>

        <hr class="my-4 border-light">

        @if($usuario->rol_id != 1)
        <div class="text-center">
            <form action="{{ route('admin.eliminarUsuario', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar permanentemente a este usuario?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger w-100">
                    <i class="bi bi-trash"></i> Eliminar Usuario Permanentemente
                </button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection
