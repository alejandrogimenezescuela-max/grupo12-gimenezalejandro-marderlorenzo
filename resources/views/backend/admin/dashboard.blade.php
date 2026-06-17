@extends("plantilla")
@section('title', 'Tatamihub - Panel Admin')
@section('content')

<div class="container main-container">

    {{-- Encabezado --}}
    <div class="dashboard-header d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div class="mb-2">
            <h1 class="dashboard-title">Panel de Administración</h1>
            <p class="dashboard-welcome">Bienvenido, {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('admin.consultas') }}"
               class="btn btn-primary fw-bold text-uppercase"
               style="background-color: #0d6efd !important; color: #ffffff !important; border-width: 2px; padding: 10px 20px; border-color: #0d6efd !important;">
               <i class="bi bi-envelope-fill"></i> Consultas
            </a>

            <a href="{{ route('admin.productos') }}" class="btn btn-warning fw-bold text-uppercase" style="border-width: 2px; padding: 10px 20px;">
                <i class="bi bi-box-seam"></i> Productos
            </a>

            <a href="{{ url('/admin/cargar') }}" class="btn btn-outline-danger fw-bold text-uppercase" style="border-width: 2px; padding: 10px 20px;">
                <i class="bi bi-plus-circle-fill"></i> Cargar
            </a>
        </div>
    </div>

    {{-- Cards de estadísticas --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="tatami-card card-users">
                <i class="bi bi-people-fill card-icon"></i>
                <div class="card-content"><h5>Usuarios</h5><h2>{{ $cantUsuarios }}</h2></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tatami-card card-products">
                <i class="bi bi-box-seam-fill card-icon"></i>
                <div class="card-content"><h5>Productos</h5><h2>{{ $cantProductos }}</h2></div>
            </div>
        </div>
        <div class="col-md-4">
            {{-- Botón de Ventas --}}
            <a href="{{ route('admin.ventas') }}" class="text-decoration-none">
                <div class="tatami-card card-orders" style="cursor: pointer;">
                    <i class="bi bi-cart-fill card-icon"></i>
                    <div class="card-content">
                        <h5>Ventas</h5>
                        <h2>{{ $cantVentas }}</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- Tabla de Usuarios --}}
    <div class="tatami-table-container">
        <div class="tatami-table-header"><h4><i class="bi bi-table"></i> Usuarios del Sistema</h4></div>
        <div class="tatami-table-body table-responsive">
            <table class="table-dark-tatami">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th class="text-center">Rol</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td class="fw-bold">{{ $user->nombre }} {{ $user->apellido }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <span class="role-badge {{ $user->rol_id == 1 ? 'badge-admin' : 'badge-client' }}">
                                {{ $user->rol_id == 1 ? 'Admin' : 'Cliente' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.usuarios.editar', $user->id) }}" class="text-white" title="Editar Usuario">
                                <i class="bi bi-pencil-square" style="font-size: 1.2rem;"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
