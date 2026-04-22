@extends("plantilla")
@section('title', 'Indumentaria')
@section('content')

@php
    // Array de productos de ejemplo para la categoría "Indumentaria" simula una base de datos
    $productos = [
        [
            'nombre' => 'Cabezal Boxeo TatamiHUB',
            'precio' => 300000,
            'imagen' => 'producto4.jpg',
            'talles' => ['M', 'L', 'XL']
        ],
        [
            'nombre' => 'Guantes Boxeo TatamiHUB',
            'precio' => 100000,
            'imagen' => 'producto5.jpg',
            'talles' => ['6oz', '8oz']
        ],
        [
            'nombre' => 'Protector Bucal TatamiHUB',
            'precio' => 35000,
            'imagen' => 'producto6.jpg',
            'talles' => ['Azul', 'Rojo']
        ],
    ];
@endphp

<div class="container mt-5">
    <div class="row g-4">
        @foreach($productos as $p)
            <div class="col-md-4">
                <div class="tatami-card">
                    <div class="tatami-img-container">
                        <img src="{{ asset('img/productos/' . $p['imagen']) }}" alt="{{ $p['nombre'] }}">
                    </div>
                    
                    <div class="tatami-body">
                        <h5 class="tatami-title">{{ $p['nombre'] }}</h5>
                        
                        <div class="tatami-sizes">
                            <small>Talles:</small>
                            <div class="size-buttons">
                                @foreach($p['talles'] as $talle)
                                    <button class="btn-size">{{ $talle }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div class="tatami-footer">
                            <span class="tatami-price">${{ number_format($p['precio'], 0, ',', '.') }}</span>
                            <button class="btn-tatami-cart">Añadir</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection