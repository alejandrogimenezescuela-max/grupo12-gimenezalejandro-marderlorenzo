@extends("plantilla")
@section('title', 'Compra Confirmada')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white p-5 shadow border-0">
                <div class="text-center">
                    <h2 class="text-success fw-bold"><i class="bi bi-check-circle-fill"></i> ¡Compra Confirmada!</h2>
                    <p class="mt-3 text-muted">Muchas gracias por tu pedido. Hemos registrado tu compra correctamente.</p>
                </div>

                <div class="mt-4">
                    <h4 class="border-bottom pb-2">Resumen del pedido</h4>
                    <ul class="list-group list-group-flush mt-3">
                        @foreach(session('items', []) as $item)
                            <li class="list-group-item bg-dark text-white d-flex justify-content-between px-0">
                                <span>{{ $item['producto']['nombre'] ?? 'Producto' }} (x{{ $item['cantidad'] }})</span>
                                <span>$ {{ number_format($item['subtotal'] ?? 0, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                        <h4 class="fw-bold">Total pagado:</h4>
                        <h4 class="text-success fw-bold">$ {{ number_format(session('total', 0), 2) }}</h4>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ url('/catalogo') }}"
                       class="btn btn-danger px-5 py-2 fw-bold mb-3"
                       style="background-color: #dc3545 !important;
                              border-color: #dc3545 !important;
                              color: #ffffff !important;
                              transition: none !important;
                              box-shadow: none !important;
                              outline: none !important;
                              display: block;">
                        Volver al catálogo
                    </a>

                    <a href="{{ route('comprobante.generar') }}"
                       class="btn btn-outline-light px-5 py-2 fw-bold"
                       style="background-color: transparent !important;
                              border-color: #ffffff !important;
                              color: #ffffff !important;
                              transition: none !important;
                              box-shadow: none !important;
                              outline: none !important;
                              display: block;
                              width: fit-content;
                              margin: 0 auto;">
                        <i class="bi bi-file-earmark-pdf me-2"></i> Descargar Comprobante PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
