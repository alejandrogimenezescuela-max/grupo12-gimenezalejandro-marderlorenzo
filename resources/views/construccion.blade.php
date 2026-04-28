@extends("plantilla")
@section('title', ':(')
@section('content')

<div class="container my-5 py-5 text-center">
    <div class="row justify-content-center mb-5">
        <div class="col-auto">
            <h1 class="fw-bold text-uppercase" style="color: #ed1c24; letter-spacing: -1px; font-size: 3rem;">
                Pagina en construcción
            </h1>
            <div style="background-color: #ed1c24; height: 5px; width: 100px; border-radius: 2px;" class="mx-auto"></div>
        </div>
    </div>

     <div style="text-align: center; padding: 20px;">
        <img src="{{ asset('img/miscalenea/construccion.png') }}" alt="Página en construcción" style="width: 600px; height: auto;">
    </div>

 <div class= "container my-1 py-3 text center">
        <div class = "row justify-content-center mb-5">
            <class text-dark style = font-size: 1.1rem; line-height: 1.8;>
                <h1> Ups..... :( Parece que a nuestro maestro lo durmieron en el entrenamiento. Volve más adelante mientras limpiamos el tatami
                </h1>
            </div>
        </div>


@endsection
