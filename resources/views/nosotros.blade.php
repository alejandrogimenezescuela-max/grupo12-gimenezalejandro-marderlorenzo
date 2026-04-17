@extends("plantilla")
@section('title', 'Nosotros')
@section('content');


<div class="container my-5 py-5">
    <div class="row align-items-center">

        <div class="col-md-5 mb-4 mb-md-0 text-center text-md-start">
            <img src="{{ asset('img/chimpance-peleando.png') }}"
                 alt="Guerrero TatamiHub"
                 class="img-fluid"
                 style="max-width: 450px;">
        </div>

        <div class="col-md-7 ps-md-5">
            <div class="mb-4">
                <h1 class="fw-bold text-uppercase" style="color: #ed1c24; letter-spacing: -1px;">
                    ¿Quienes somos?
                </h1>
                <div style="background-color: #ed1c24; height: 4px; width: 80px; border-radius: 2px;"></div>
            </div>

            <p class="text-dark" style="font-size: 1.1rem; line-height: 1.8;">
                <span class="fw-bold" style="color: #ed1c24;">TATAMIHUB</span> es una empresa dedicada a proporcionar equipamiento de alta calidad para artes marciales. Fue fundada por un grupo de entusiastas y emprendedores apasionados por distintas disciplinas marciales.
            </p>

            <p class="text-muted" style="font-size: 1.05rem; line-height: 1.8;">
                Nuestro objetivo es brindar a la mayor cantidad de practicantes acceso a productos confiables y duraderos que mejoren su experiencia y habilidades, manteniendo siempre la mejor relación costo-calidad del mercado.
            </p>
        </div>

    </div>
</div>

<div class="container my-5 py-5 text-center">
    <div class="row justify-content-center mb-5">
        <div class="col-auto">
            <h1 class="fw-bold text-uppercase" style="color: #ed1c24; letter-spacing: -1px; font-size: 3rem;">
                Nuestro equipo
            </h1>
            <div style="background-color: #ed1c24; height: 5px; width: 100px; border-radius: 2px;" class="mx-auto"></div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center gap-4">

        <div class="col-md-5 d-flex justify-content-center">
            <img src="{{ asset('img/carnet1.png') }}"
                 alt="Carnet Lorenzo"
                 class="img-fluid carnet-hover"
                 style="max-width: 450px; height: auto; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));">
        </div>

        <div class="col-md-5 d-flex justify-content-center">
            <img src="{{ asset('img/carnet2.png') }}"
                 alt="Carnet Alejandro"
                 class="img-fluid carnet-hover"
                 style="max-width: 450px; height: auto; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));">
        </div>

    </div>
</div>

<div class = "container my-5 text-center">
    <div class = "row">


<div class="container my-1 py-5 text-center">
    <div class="row justify-content-center mb-5">
        <div class="col-auto">
            <h1 class="fw-bold text-uppercase" style="color: #ed1c24; letter-spacing: -1px; font-size: 3rem;">
                Nuestra filosofía
            </h1>
            <div style="background-color: #ed1c24; height: 5px; width: 100px; border-radius: 2px;" class="mx-auto"></div>
        </div>
    </div>
       <div class= "container my-1 py-3 text center">
        <div class = "row justify-content-center mb-5">
            <class text-dark style = font-size: 1.1rem; line-height: 1.8;>
                <h1> En <span class="fw-bold" style="color: #ed1c24;">TATAMIHUB</span>  entendemos que el tatami es un lugar sagrado donde se forja el carácter. Nuestra filosofía no se basa solo en vender productos, sino en acompañar el proceso de cada practicante, desde el cinturón blanco hasta el maestro.
                </h1>
            </div>
        </div>

        <div class="container my-1 py-5 text-center">
    <div class="row justify-content-center mb-5">
        <div class="col-auto">
            <h1 class="fw-bold text-uppercase" style="color: #ed1c24; letter-spacing: -1px; font-size: 3rem;">
                Preguntas frecuentes
            </h1>
            <div style="background-color: #ed1c24; height: 5px; width: 100px; border-radius: 2px;" class="mx-auto"></div>
        </div>

         <div class= "container my-1 py-3 text center">
        <div class = "row justify-content-center mb-5">
            <class text-dark style = font-size: 1.1rem; line-height: 1.8;>
                <h2>  <span class="fw-bold" style="color: #ed1c24;">¿Hacen envios al todo el país?</span></h2>
                <p class= "lead text-dark" style="line-height: 2;
                    ">Si, hacemos envios a todo el pais, mediante empresas lideres como <strong>OCA</strong> o <strong>Andreani</strong></p>
                     <h2>  <span class="fw-bold" style="color: #ed1c24;">¿Los kimonos vienen con cinturón incluido?</span></h2>
                     <p class= "lead text-dark" style="line-height: 2;
                    ">Por lo general los Kimonos de BJJ y Judo se venden por separado del cinturon, a no ser que el kit especifique lo contrario</p>
                        <h2>  <span class="fw-bold" style="color: #ed1c24;">¿Tienen tienda física?</span></h2>
                        <p class= "lead text-dark" style="line-height: 2;
                        ">Sí, nos encontramos en Av.Centenario 3535 (Centenario Shopping) Local 15 Corrientes podes tener más info de nuestra ubicación en el boton de abajo"</p>

            </div>
        </div>

        <div class="d-flex justify-content-center mt-0">
            <a href="{{ url('/contacto') }}" style="text-decoration: none;">
<button class="animated-button">
  <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
    ></path>
  </svg>
  <span class="text">Contactanos</span>
  <span class="circle"></span>
  <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
    ></path>
  </svg>
</button>
</a>
</div>

@endsection
