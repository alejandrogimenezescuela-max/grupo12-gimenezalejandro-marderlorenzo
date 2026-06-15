@extends("plantilla")
@section('title', 'Suplementos')
@section('content')

<div class="container mt-5">
    <div class="row g-4">
        @foreach($suplementos as $p)
            <div class="col-md-4">
                <div class="tatami-card">
                    <div class="tatami-img-container">
                        @if($p->imagen)
                            <img src="{{ asset($p->imagen) }}" alt="{{ $p->nombre }}">
                        @else
                            <img src="{{ asset('img/productos/placeholder.jpg') }}" alt="Sin imagen">
                        @endif
                    </div>

                    <div class="tatami-body">
                        <h5 class="tatami-title">{{ $p->nombre }}</h5>

                        <div class="tatami-sizes">
                            @if($p->talle)
                                <small class="fw-bold text-muted">Presentación: <span class="text-white">{{ $p->talle }}</span></small>
                            @endif

                            @if($p->color)
                                <br>
                                <small class="fw-bold text-muted">Detalle/Sabor: <span class="text-white">{{ $p->color }}</span></small>
                            @endif

                            <div class="size-buttons mt-2">
                                @if($p->stock > 0)
                                    <span class="badge bg-success">En Stock ({{ $p->stock }})</span>
                                @else
                                    <span class="badge bg-danger">Sin Stock</span>
                                @endif
                            </div>
                        </div>

                        <div class="tatami-footer mt-3 d-flex align-items-center justify-content-between" style="width: 100%;">
                            <span class="tatami-price m-0" style="font-size: 1.25rem; font-weight: bold; color: #fff;">
                                ${{ number_format($p->precio, 0, ',', '.') }}
                            </span>

                            @if($p->stock > 0)
                                <a href="{{ route('producto.show', $p->id) }}"
                                   class="btn-tatami-cart text-decoration-none d-inline-flex align-items-center justify-content-center"
                                   style="padding: 6px 15px; min-width: 75px; height: 35px; margin: 0; font-size: 0.9rem; font-weight: bold; text-transform: uppercase; text-align: center;">
                                    Ver
                                </a>
                            @else
                                <button class="btn-tatami-cart btn-secondary d-inline-flex align-items-center justify-content-center"
                                        disabled
                                        style="padding: 6px 15px; min-width: 75px; height: 35px; margin: 0; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; opacity: 0.6;">
                                    Agotado
                                </button>
                            @endif
                        </div>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
