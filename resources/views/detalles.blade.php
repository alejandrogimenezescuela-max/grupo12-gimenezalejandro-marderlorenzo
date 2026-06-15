@extends("plantilla")
@section('title', $producto->nombre)
@section('content')
<div class="container my-5">
    <div class="mb-4">
        <a href="javascript:history.back()" class="text-decoration-none text-muted fw-bold">
            VOLVER AL CATÁLOGO
        </a>
    </div>

    <div class="row g-5">
        <div class="col-md-6">
            <div class="p-3 bg-dark border border-secondary" style="border-radius: 20px; text-align: center;">
                @if($producto->imagen)
                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid" style="max-height: 500px; object-fit: contain; border-radius: 10px;">
                @else
                    <img src="{{ asset('img/productos/placeholder.jpg') }}" alt="Sin imagen" class="img-fluid">
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="ps-md-4">
                <span class="badge bg-danger mb-2 text-uppercase px-3 py-2">
                    {{ $producto->categoria->nombre }}
                </span>

                <h1 class="display-5 fw-bold mb-2" style="color: #111111;">{{ $producto->nombre }}</h1>

                <div class="d-flex align-items-center mb-4">
                    <h2 class="text-danger fw-bold m-0" style="font-size: 3rem;">
                        ${{ number_format($producto->precio, 0, ',', '.') }}
                    </h2>
                </div>

                <hr class="border-secondary mb-4">

                <div class="mb-4">
                    <h5 class="text-muted fw-bold text-uppercase small">Descripción</h5>
                    <p class="text-secondary lead">
                        {{ $producto->descripcion ?? 'Sin descripción detallada disponible.' }}
                    </p>
                </div>

                <div class="row g-3 mb-4">
                    @php $esSuplemento = strtolower($producto->categoria->nombre) === 'suplementos'; @endphp
                    <div class="col-6">
                        <div class="p-3 border border-secondary rounded bg-dark">
                            <small class="text-muted d-block fw-bold text-uppercase">{{ $esSuplemento ? 'Presentación' : 'Talle' }}</small>
                            <span class="text-white fs-5 fw-bold">{{ $producto->talle ?? 'Único' }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border border-secondary rounded bg-dark">
                            <small class="text-muted d-block fw-bold text-uppercase">{{ $esSuplemento ? 'Sabor / Detalle' : 'Color' }}</small>
                            <span class="text-white fs-5 fw-bold">{{ $producto->color ?? 'Único' }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    @if($producto->stock > 0)
                        <div class="mb-3 text-success fw-bold">DISPONIBLE ({{ $producto->stock }} unidades)</div>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="number" value="1" min="1" max="{{ $producto->stock }}" class="form-control form-control-lg bg-dark text-white border-secondary text-center" style="height: 56px;">
                            </div>
                            <div class="col-md-8">
      <button type="button" class="btn btn-danger btn-lg w-100 fw-bold shadow-sm"
    style="padding: 18px 0;
           font-size: 1.25rem;
           text-transform: uppercase;
           letter-spacing: 1.5px;
           border-radius: 8px;
           background-color: #dc3545 !important;
           border-color: #dc3545 !important;">
    Añadir al Carrito
</button>
                            </div>
                        </div>
                    @else
                        <div class="mb-3 text-danger fw-bold">AGOTADO MOMENTÁNEAMENTE</div>
                        <button class="btn btn-secondary btn-lg w-100 fw-bold py-3 text-uppercase" disabled>
                            Producto Agotado
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
