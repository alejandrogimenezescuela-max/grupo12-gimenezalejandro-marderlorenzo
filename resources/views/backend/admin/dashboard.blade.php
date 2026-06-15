@extends("plantilla")
@section('title', 'Tatamihub - Panel Admin')
@section('content')

<style>
    /* VARIABLES DE COLOR Y ESTILO DEL TATAMI */
    :root {
        --tatami-red: #e31919; /* El rojo vibrante del logo */
        --tatami-bg-cream: #f4e9d7; /* Tono crema sutil del fondo */
        --tatami-border-brown: #802020; /* Marrón rojizo oscuro de los marcos */
        --tatami-text-black: #1a1a1a;
        --tatami-text-dark-brown: #501010;
        --tatami-card-bg-light: #fef8f0; /* Un crema aún más claro */
    }

    /* ESTILOS DE LA PÁGINA Y EL FONDO */
    body {
        background-color: #fdfdfd; /* Un fondo general muy limpio */
        color: var(--tatami-text-black);
    }

    .main-container {
        padding-top: 50px;
        padding-bottom: 50px;
    }

    /* TÍTULOS Y CABECERA */
    .dashboard-header {
        border-bottom: 3px solid var(--tatami-red);
        margin-bottom: 40px;
        padding-bottom: 15px;
        position: relative;
    }

    /* El sutil borde negro que se ve en el navbar de referencia */
    .dashboard-header::after {
        content: "";
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 100%;
        height: 1px;
        background-color: #000;
        z-index: 1;
    }

    .dashboard-title {
        color: var(--tatami-red); /* Título en el rojo del Tatami */
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0;
    }

    .dashboard-welcome {
        color: var(--tatami-text-dark-brown);
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
    }

    /* ESTILO DE TARJETAS INDICADORAS (¡Inspiradas en el tatami!) */
    .tatami-card {
        background-color: var(--tatami-card-bg-light);
        border: 2px solid var(--tatami-border-brown); /* Marco marrón oscuro */
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(80, 16, 16, 0.1);
        padding: 25px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: start;
        overflow: hidden;
        position: relative;
    }

    .tatami-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(80, 16, 16, 0.15);
    }

    /* La barra lateral de color (Estilo Tatami con bordes) */
    .tatami-card::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 10px;
        background-color: var(--card-color);
        border-right: 2px solid var(--tatami-border-brown);
    }

    .card-icon {
        color: var(--card-color);
        font-size: 3rem;
        margin-right: 25px;
        flex-shrink: 0;
    }

    .card-content h5 {
        color: var(--tatami-text-dark-brown);
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .card-content h2 {
        color: var(--tatami-text-black);
        font-weight: 800;
        font-size: 2.5rem;
        margin: 0;
    }

    /* Colores específicos para cada tarjeta */
    .card-users { --card-color: #2196F3; } /* Un azul para usuarios */
    .card-products { --card-color: #4CAF50; } /* Un verde para productos */
    .card-orders { --card-color: #FF9800; } /* Un naranja para pedidos */

    /* ESTILO DE LA TABLA OSCURA ( backend-inspired) */
    .tatami-table-container {
        background-color: #1a1a1a; /* Fondo oscuro backend */
        border: 3px solid var(--tatami-border-brown); /* Marco marrón oscuro gruesito */
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        margin-top: 40px;
        overflow: hidden;
    }

    .tatami-table-header {
        border-bottom: 2px solid var(--tatami-border-brown);
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .tatami-table-header h4 {
        color: var(--tatami-bg-cream); /* Texto crema para el título */
        font-weight: 700;
        text-transform: uppercase;
        margin: 0;
    }

    .tatami-table-header h4 i {
        color: var(--tatami-red); /* Icono en rojo Tatami */
        margin-right: 10px;
    }

    .tatami-table-body {
        padding: 20px;
    }

    .table-responsive {
        margin: 0;
    }

    .table-dark-tatami {
        width: 100%;
        color: #fff;
        border-collapse: collapse;
        margin: 0;
    }

    .table-dark-tatami th {
        color: #aaaaaa; /* Un gris claro para los encabezados */
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 15px;
        border-bottom: 2px solid #333;
        text-align: left;
    }

    .table-dark-tatami td {
        padding: 15px;
        border-bottom: 1px solid #333;
        vertical-align: middle;
    }

    .table-dark-tatami tbody tr:last-child td {
        border-bottom: none;
    }

    .table-dark-tatami tbody tr:hover {
        background-color: rgba(227, 25, 25, 0.05); /* Sutil hover rojo */
    }

    /* BADGES DE ROL (Refinados e Integrados) */
    .role-badge {
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 6px;
        letter-spacing: 0.5px;
        display: inline-block;
    }

    .badge-admin {
        background-color: var(--tatami-red); /* Badge Admin en rojo Tatami */
        color: #fff;
    }

    .badge-client {
        background-color: #2196F3; /* Badge Cliente en azul */
        color: #fff;
    }

</style>

<div class="container main-container">

    <div class="dashboard-header d-flex justify-content-between align-items-center">
        <div>
            <h1 class="dashboard-title">Panel de Administración</h1>
            <p class="dashboard-welcome">Bienvenido, {{ auth()->user()->nombre }} (Alejandro)</p>
        </div>
        <div>
            </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="tatami-card card-users">
                <i class="bi bi-people-fill card-icon"></i>
                <div class="card-content">
                    <h5>Usuarios Registrados</h5>
                    <h2>{{ $cantUsuarios }}</h2> </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="tatami-card card-products">
                <i class="bi bi-box-seam-fill card-icon"></i>
                <div class="card-content">
                    <h5>Productos</h5>
                    <h2>{{ $cantProductos }}</h2> </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="tatami-card card-orders">
                <i class="bi bi-cart-fill card-icon"></i>
                <div class="card-content">
                    <h5>Pedidos</h5>
                    <h2>{{ $cantPedidos }}</h2> </div>
            </div>
        </div>
    </div>

    <div class="tatami-table-container">
        <div class="tatami-table-header">
            <h4><i class="bi bi-table"></i> Usuarios del Sistema</h4>
            </div>
        <div class="tatami-table-body table-responsive">
            <table class="table-dark-tatami">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th class="text-center">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $user) <tr>
                            <td>{{ $user->id }}</td>
                            <td class="fw-bold">{{ $user->nombre }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                @if($user->rol_id == 1)
                                    <span class="role-badge badge-admin">Admin</span>
                                @else
                                    <span class="role-badge badge-client">Cliente</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

        <div>
            <a href="{{ url('/admin/cargar') }}" class="btn btn-outline-danger fw-bold text-uppercase"
               style="border-width: 2px; padding: 10px 20px;">
                <i class="bi bi-plus-circle-fill"></i> Cargar Producto
            </a>
        </div>
    </div>

@endsection
