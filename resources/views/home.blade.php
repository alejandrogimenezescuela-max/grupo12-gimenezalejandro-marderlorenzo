@extends('plantilla')

@section('title', 'Página de Inicio')

@section('content')


   <div style="text-align: center; padding: 20px;">
    <img src="{{ asset('img/home/tatamiPortada.jpg') }}"
         alt="Logo TatamiHub"
         style="max-width: 600px; width: 100%; height: auto;">
</div>

<div id="carouselExampleInterval" class="carousel slide shadow" data-bs-ride="carousel">
  <div class="carousel-inner">

    <div class="carousel-item active" data-bs-interval="10000">
      <img src="{{ asset('img/carrusel/carrusel1.jpg') }}" class="d-block w-100 banner-img" alt="Hecho por practicantes">
    </div>

    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset('img/carrusel/carrusel2.jpg') }}" class="d-block w-100 banner-img" alt="Información de envíos">
    </div>

    <div class="carousel-item">
      <img src="{{ asset('img/carrusel/carrusel3.jpg') }}" class="d-block w-100 banner-img" alt="Calidad TatamiHub">
    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

<div class="d-flex justify-content-center mt-5">
  <a href="{{ url('/catalogo') }}" class="d-inline-block" style="text-decoration: none;">
    <button class="animated-button">
      <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
        <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
      </svg>
      <span class="text">Ver Catálogo</span>
      <span class="circle"></span>
      <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
        <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
      </svg>
    </button>
  </a>
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
                                            <img src="{{ asset('storage/' . $p->imagen) }}" alt="{{ $p->nombre }}">
                                        @else
                                            <img src="{{ asset('img/productos/placeholder.jpg') }}" alt="Sin imagen">
                                        @endif
                                    </div>

                                    <div class="bjj-product-info">
                                        <h5 class="bjj-product-name">{{ $p->nombre }}</h5>

                                        <div class="bjj-size-selector">
                                            <small>Talles Disponibles:</small>
                                            <div class="bjj-size-options">
                                                @foreach($p->variantes as $variante)
                                                    @if($variante->stock > 0)
                                                        <button class="bjj-size-tag">{{ $variante->talle }}</button>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="bjj-purchase-row">
                                            <span class="bjj-price-tag">${{ number_format($p->precio, 0, ',', '.') }}</span>
                                            <button class="bjj-add-to-cart">Añadir</button>
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
                <p class="text-muted">No hay productos destacados disponibles en este momento.</p>
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

    <div class="text-center mt-5 mb-4">
    <h1 style="color: #ed1c24; font-weight: bold; text-transform: uppercase; margin-bottom: 5px;">
        Nuestras Marcas
    </h1>
    <div style="background-color: #ed1c24; height: 3px; width: 80px; margin: 0 auto; border-radius: 2px;"></div>
</div>


<div style="text-align: center; padding: 20px; width: 100%; margin-bottom: 50px;">
    <img src="{{ asset('img/home/marcas.png') }}"
         alt="Marcas"
         style="max-width: 800px; width: 100%; height: auto; opacity: 0.9;">
</div>

<div class="info-banner mt-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
               <i class="bi bi-truck"></i>
                <h5 class="info-title">Envíos a todo el país</h5>
                <p class="info-text">Llegamos a toda la Argentina mediante Andreani y OCA.</p>
            </div>

            <div class="col-md-3 mb-4">
                <i class="bi bi-credit-card-fill"></i>
                <h5 class="info-title">3 y 6 cuotas sin interés</h5>
                <p class="info-text">Con todas las tarjetas bancarias.</p>
            </div>

            <div class="col-md-3 mb-4">
                <i class="bi bi-cash"></i>
                <h5 class="info-title">Descuentos especiales</h5>
                <p class="info-text">10% off pagando por transferencia o en efectivo.</p>
            </div>

            <div class="col-md-3 mb-4">
                <i class="bi bi-whatsapp"></i>
                <h5 class="info-title">Atención personalizada</h5>
                <p class="info-text">Soporte por WhatsApp para resolver todas tus dudas.</p>
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-5 mb-4">
    <h1 style="color: #ed1c24; font-weight: bold; text-transform: uppercase; margin-bottom: 5px;">
        Registrate para recibir novedades y ofertas exclusivas
    </h1>
    <div style="background-color: #ed1c24; height: 3px; width: 80px; margin: 0 auto; border-radius: 2px;"></div>
</div>

<div class="d-flex justify-content-center mt-5">
<a href="{{ url('/register') }}" class="d-inline-block" style="text-decoration: none;">
<button class="animated-button">
  <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
    ></path>
  </svg>
  <span class="text">Registrarse</span>
  <span class="circle"></span>
  <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
    ></path>
  </svg>
</button>
</a>
</div>

<div class="text-center mt-5 mb-4">
    <h1 style="color: #ed1c24; font-weight: bold; text-transform: uppercase; margin-bottom: 5px;">
        Seguinos en nuestras redes
    </h1>
    <div style="background-color: #ed1c24; height: 3px; width: 80px; margin: 0 auto; border-radius: 2px;"></div>
</div>

<div class="instagram-section text-center my-5">
    <a href="https://www.instagram.com/alejandrozzz04/" target="_blank" style="text-decoration: none; color: black;">
        <div class="d-flex justify-content-center align-items-center mb-2">
            <i class="bi bi-instagram" style="font-size: 2rem; margin-right: 10px;"></i>
            <h2 class="fw-bold m-0" style="font-size: 2.5rem;">tataami.hub</h2>
        </div>
    </a>

</div>
@endsection
