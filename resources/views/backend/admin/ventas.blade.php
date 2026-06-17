@extends("plantilla")
@section('title', 'Tatamihub - Ventas')
@section('content')

<div class="container main-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-white">Gestión de Ventas</h1>
        <a href="{{ route('admin.dashboard') }}" style="background-color: #6c757d; color: white; padding: 8px 16px; text-decoration: none; border: none;">
            Volver al Dashboard
        </a>
    </div>

    {{-- Filtros con botones estáticos --}}
    <div class="tatami-table-container p-4 mb-4">
        <form action="{{ route('admin.ventas') }}" method="GET" class="row g-3">
            <div class="col-md-3">
                <label class="text-white fw-bold">Estado</label>
                <select name="estado" class="form-control bg-dark text-white border-secondary">
                    <option value="">Todos los estados</option>
                    <option value="confirmado" {{ request('estado') == 'confirmado' ? 'selected' : '' }}>Confirmado</option>
                    <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="text-white fw-bold">Desde</label>
                <input type="date" name="fecha_inicio" class="form-control bg-dark text-white border-secondary" value="{{ request('fecha_inicio') }}">
            </div>
            <div class="col-md-3">
                <label class="text-white fw-bold">Hasta</label>
                <input type="date" name="fecha_fin" class="form-control bg-dark text-white border-secondary" value="{{ request('fecha_fin') }}">
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                {{-- Botones estáticos sin efectos --}}
                <button type="submit" style="background-color: #0d6efd; color: white; border: none; padding: 8px 16px; width: 100%; cursor: default;">
                    Filtrar
                </button>
                <a href="{{ route('admin.ventas') }}" style="background-color: transparent; color: white; border: 1px solid white; padding: 8px 16px; width: 100%; text-decoration: none; text-align: center; cursor: default;">
                    Limpiar
                </a>
            </div>
        </form>
    </div>

    {{-- Tabla --}}
    <div class="tatami-table-container">
        <div class="tatami-table-header p-3">
            <h4 class="text-white m-0">Registro de Ventas</h4>
        </div>
        <div class="tatami-table-body table-responsive">
            <table class="table-dark-tatami w-100">
                <thead>
                    <tr class="text-secondary">
                        <th>ID Venta</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ventas as $venta)
                    <tr>
                        <td class="py-3">{{ $venta->id }}</td>
                        <td class="py-3">{{ $venta->user->nombre ?? 'N/A' }} {{ $venta->user->apellido ?? '' }}</td>
                        <td class="py-3 fw-bold text-info">$ {{ number_format($venta->total, 2) }}</td>
                        <td class="py-3">
                            <span class="badge {{ $venta->estado == 'confirmado' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($venta->estado) }}
                            </span>
                        </td>
                        <td class="py-3">{{ $venta->fecha_venta ? \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y H:i') : 'N/A' }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4 text-white">No hay ventas registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
