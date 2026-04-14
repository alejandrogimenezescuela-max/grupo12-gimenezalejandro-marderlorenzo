@extends('layouts.app')

@section('title', 'Página de Inicio')

@section('content')
   <div style="text-align: center; padding: 20px;">
        <img src="{{ asset('img/tatamiPortada.jpg') }}" alt="Logo TatamiHub" style="width: 600px; height: auto;">
    </div>
<div id="carouselExampleInterval" class="carousel slide shadow" data-bs-ride="carousel">
  <div class="carousel-inner">

    <div class="carousel-item active" data-bs-interval="10000">
      <img src="{{ asset('img/carrusel1.jpg') }}" class="d-block w-100 banner-img" alt="Hecho por practicantes">
    </div>

    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset('img/carrusel2.jpg') }}" class="d-block w-100 banner-img" alt="Información de envíos">
    </div>

    <div class="carousel-item">
      <img src="{{ asset('img/carrusel3.jpg') }}" class="d-block w-100 banner-img" alt="Calidad TatamiHub">
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
<button class="animated-button">
  <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
    ></path>
  </svg>
  <span class="text">Ver Catálogo</span>
  <span class="circle"></span>
  <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
    ></path>
  </svg>
</button>
</div>

    <div class="text-center mt-5 mb-4">
    <h1 style="color: #ed1c24; font-weight: bold; text-transform: uppercase; margin-bottom: 5px;">
        Productos destacados
    </h1>
    <div style="background-color: #ed1c24; height: 3px; width: 80px; margin: 0 auto; border-radius: 2px;"></div>
</div>

<div id="carouselProductos" class="carousel carousel-dark slide my-5" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 card-producto">
                            <div class="text-center p-3">
                                <img src="{{ asset('img/producto1.png') }}" class="card-img-top" alt="Kimono" style="width: 50%; height: auto;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-dark fw-bold">Kimono Shiai</h5>
                                <p class="text-danger fw-bold">$133.100</p>
                                <a href="#" class="btn btn-dark btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-none d-md-block">
                        <div class="card h-100 shadow-sm border-0 card-producto">
                            <div class="text-center p-3">
                                <img src="{{ asset('img/producto2.png') }}" class="card-img-top" alt="Guantes" style="width: 50%; height: auto;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-dark fw-bold">Guantes Bronx 14/16Oz</h5>
                                <p class="text-danger fw-bold">$45.000</p>
                                <a href="#" class="btn btn-dark btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-none d-md-block">
                        <div class="card h-100 shadow-sm border-0 card-producto">
                            <div class="text-center p-3">
                                <img src="{{ asset('img/producto3.png') }}" class="card-img-top" alt="Suplemento" style="width: 50%; height: auto;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-dark fw-bold">Creatine MONOHYDRATE</h5>
                                <p class="text-danger fw-bold">$62.300</p>
                                <a href="#" class="btn btn-dark btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 bg-light card-producto">
                            <div class="text-center p-3">
                                <img src="{{ asset('img/producto4.png') }}" class="card-img-top" alt="Tibial" style="width: 50%; height: auto;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-dark fw-bold">Tibial Bronx</h5>
                                <p class="text-danger fw-bold">$70.500</p>
                                <a href="#" class="btn btn-dark btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 bg-light card-producto">
                            <div class="text-center p-3">
                                <img src="{{ asset('img/producto5.png') }}" class="card-img-top" alt="Faixa" style="width: 50%; height: auto;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-dark fw-bold">Faixa Brazilian Jiu Jitsu Shiai</h5>
                                <p class="text-danger fw-bold">$25.000</p>
                                <a href="#" class="btn btn-dark btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-none d-md-block">
                        <div class="card h-100 shadow-sm border-0 bg-light card-producto">
                            <div class="text-center p-3">
                                <img src="{{ asset('img/producto6.png') }}" class="card-img-top" alt="Protector Bucal" style="width: 50%; height: auto;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-dark fw-bold">Protector Bucal SMAI</h5>
                                <p class="text-danger fw-bold">$12.000</p>
                                <a href="#" class="btn btn-dark btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

    <div class="text-center mt-5 mb-4">
    <h1 style="color: #ed1c24; font-weight: bold; text-transform: uppercase; margin-bottom: 5px;">
        Nuestras Marcas
    </h1>
    <div style="background-color: #ed1c24; height: 3px; width: 80px; margin: 0 auto; border-radius: 2px;"></div>
</div>


<div style="text-align: center; padding: 20px; margin-bottom: 50px;">
        <img src="{{ asset('img/marcas.png') }}" alt="Marcas" style="width: 800px; height: auto; opacity: 0.9;">
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
