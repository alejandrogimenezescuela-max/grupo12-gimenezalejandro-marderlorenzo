@extends("plantilla")
@section('title', 'Catálogo')
@section('content')

<div class="container mt-5">
    <div class="row text-center" id="category-container">
        <div class="col-md-4 category-card" style="opacity: 0;">
            <a href="/ropa" class="text-decoration-none">
                <div class="card bg-dark text-white border-danger shadow-lg">
                    <img src="{{ asset('img/catalogo/pilchas.png') }}" class="card-img" alt="Ropa">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center"></div>
                </div>
            </a>
        </div>

        <div class="col-md-4 category-card" style="opacity: 0; transform: translateY(30px);">
            <a href="/indumentaria" class="text-decoration-none">
                <div class="card bg-dark text-white border-danger shadow-lg">
                    <img src="{{ asset('img/catalogo/indumentaria.png') }}" class="card-img" alt="Indumentaria">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center bg-overlay"></div>
                </div>
            </a>
        </div>

        <div class="col-md-4 category-card" style="opacity: 0; transform: translateY(30px);">
            <a href="/suplementos" class="text-decoration-none">
                <div class="card bg-dark text-white border-danger shadow-lg">
                    <img src="{{ asset('img/catalogo/suplementos.png') }}" class="card-img" alt="Suplementos">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center bg-overlay"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="text-center mt-5 mb-4">
    <h1 style="color: #ed1c24; font-weight: bold; text-transform: uppercase; margin-bottom: 5px;">
        Productos destacados
    </h1>
    <div style="background-color: #ed1c24; height: 3px; width: 80px; margin: 0 auto; border-radius: 2px;"></div>
</div>

<div id="carouselProductos" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        @forelse($productos->chunk(3) as $chunk)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="container">
                    <div class="row g-4 justify-content-center">

                        @foreach($chunk as $p)
                            <div class="col-md-4">
                                <div class="bjj-product-card">
                                    <div class="bjj-product-display">
                                        @if($p->imagen)
                                            <img src="{{ asset($p->imagen) }}" alt="{{ $p->nombre }}">
                                        @else
                                            <img src="{{ asset('img/productos/placeholder.jpg') }}" alt="Sin imagen">
                                        @endif
                                    </div>

                                    <div class="bjj-product-info">
                                        <h5 class="bjj-product-name">{{ $p->nombre }}</h5>

                                        <div class="bjj-size-selector">
                                            @if($p->talle)
                                                <small class="fw-bold text-muted">Talle: <span class="text-white">{{ $p->talle }}</span></small>
                                            @endif

                                            @if($p->color)
                                                <br>
                                                <small class="fw-bold text-muted">Color: <span class="text-white">{{ $p->color }}</span></small>
                                            @endif

                                            <div class="bjj-size-options mt-2">
                                                @if($p->stock > 0)
                                                    <span class="badge bg-success">En Stock ({{ $p->stock }})</span>
                                                @else
                                                    <span class="badge bg-danger">Sin Stock</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="bjj-purchase-row mt-3">
                                            <span class="bjj-price-tag">${{ number_format($p->precio, 0, ',', '.') }}</span>

                                            @if($p->stock > 0)
                                            <a href="{{ route('producto.show', $p->id) }}" class="tth-btn" style="margin-left: auto;">Ver</a>
                                            @else
                                                <button class="bjj-add-to-cart btn-secondary" disabled>Agotado</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <p class="text-muted">No hay productos destacados cargados en este momento.</p>
            </div>
        @endforelse

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.category-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.transition = "all 0.8s ease-out";
                card.style.opacity = "1";
                card.style.transform = "translateY(0)";
            }, 200 * index);
        });
    });
</script>

@endsection
