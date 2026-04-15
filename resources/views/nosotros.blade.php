@extends("layouts.app")
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

@endsection
