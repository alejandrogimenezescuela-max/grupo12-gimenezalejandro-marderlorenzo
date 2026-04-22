@extends("plantilla")
@section('title', 'Suplementos')
@section('content')

@php
    // Array de productos de ejemplo para la categoría "Suplementos" simula una base de datos
    $productos = [
        [
            'nombre' => 'Creatina 1kg StarNutrition',
            'precio' => 70000,
            'imagen' => 'producto7.jpg',
            'talles' => ['Neutro', 'Frutos Rojos']
        ],
        [
            'nombre' => 'Whey Protein 2lb StarNutrition',
            'precio' => 45000,
            'imagen' => 'producto8.jpg',
            'talles' => ['Chocolate', 'Vainilla', 'Cookies', 'Frutilla']
        ],
        [
            'nombre' => 'Omega 3 Fish Oil StarNutrition',
            'precio' => 33000,
            'imagen' => 'producto9.jpg',
            'talles' => ['60 cápsulas']
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