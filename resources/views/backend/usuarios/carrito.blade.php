@extends("plantilla")
@section('title', 'Mi Carrito')
@section('content')

<div class="container py-5">
    {{-- Notificación de Errores --}}
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex align-items-center mb-5">
        <h2 class="fw-bold"><i class="bi bi-cart3 text-danger me-3"></i>Tu Carrito</h2>
        <span class="text-muted ms-3">{{ $items->count() }} productos</span>
    </div>

    @if($items->isEmpty())
        <div class="text-center py-5 border rounded bg-light">
            <i class="bi bi-bag-x" style="font-size: 3rem; color: #ccc;"></i>
            <h4 class="mt-3">Tu carrito está vacío</h4>
            <p class="text-muted">Parece que aún no has agregado nada.</p>
            <a href="{{ url('/catalogo') }}" class="btn btn-primary" style="background-color: #0d6efd !important; border-color: #0d6efd !important; transition: none !important;">
                Volver al catálogo
            </a>
        </div>
    @else
        <div class="row">
            {{-- Tabla de Productos --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th class="text-end pe-4">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td class="ps-4 py-3 fw-bold">{{ $item->producto->nombre }}</td>
                                    <td>$ {{ number_format($item->precio_unitario, 0, ',', '.') }}</td>
                                    <td><span class="badge bg-secondary">{{ $item->cantidad }}</span></td>
                                    <td class="fw-bold text-danger">$ {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                    <td class="text-end pe-4">
                                        <form method="POST" action="{{ route('carrito.eliminar', $item->id) }}">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger p-0">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Resumen y Método de Entrega --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm bg-dark text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Resumen de compra</h5>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal</span>
                            <span>$ {{ number_format($carrito->total, 0, ',', '.') }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="mb-0">Total</h4>
                            <h4 class="mb-0 text-danger">$ {{ number_format($carrito->total, 0, ',', '.') }}</h4>
                        </div>

                        {{-- Formulario condicional para evitar compras de admin --}}
                        @if(auth()->user() && auth()->user()->rol_id != 1)
                            <form method="POST" action="{{ route('carrito.confirmar') }}">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label text-white fw-bold">Método de entrega:</label>
                                    <select name="metodo_entrega" class="form-select bg-dark text-white border-secondary" required style="transition: none;">
                                        <option value="retiro">Retiro en sucursal (Gratis)</option>
                                        @if(auth()->user()->tienePerfilCompleto())
                                            <option value="envio">Envío a domicilio</option>
                                        @else
                                            <option value="envio" disabled>Envío (Completa datos en Perfil)</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger w-100 py-3 fw-bold"
                                        style="background-color: #dc3545 !important; border-color: #dc3545 !important; transition: none !important;">
                                    FINALIZAR COMPRA
                                </button>
                            </form>
                        @else
                            <div class="alert alert-warning text-center">
                                Los administradores no pueden realizar compras.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection
