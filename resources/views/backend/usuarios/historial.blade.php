@extends("plantilla")
@section('title', 'Mis Compras')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4 text-tatami-red">Mi Historial de Compras</h2>

    <div class="accordion" id="accordionVentas">
        @forelse($ventas as $index => $venta)
        <div class="accordion-item mb-3 shadow-sm">
            <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}">
                    <div class="d-flex w-100 justify-content-between me-3">
                        <span><strong>Compra #{{ $venta->id }}</strong> - {{ $venta->created_at->format('d/m/Y') }}</span>
                        <span class="badge bg-dark">${{ number_format($venta->total, 2) }}</span>
                    </div>
                </button>
            </h2>
            <div id="collapse{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#accordionVentas">
                <div class="accordion-body">
                    <p><strong>Estado:</strong> {{ ucfirst($venta->estado) }} | <strong>Entrega:</strong> {{ $venta->metodo_entrega }}</p>
                    <table class="table table-sm">
                        <thead>
                            <tr><th>Producto</th><th>Cantidad</th><th>Precio</th></tr>
                        </thead>
                        <tbody>
                            @foreach($venta->detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->producto->nombre ?? 'Producto no disponible' }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @empty
            <p class="text-muted">Aún no tienes compras realizadas.</p>
        @endforelse
    </div>
</div>

@endsection
