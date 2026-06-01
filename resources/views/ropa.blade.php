@extends("plantilla")
@section('title', 'Ropa')
@section('content')

<div class="container mt-5">
    <div class="row g-4">
        @foreach($ropa as $p)
            <div class="col-md-4">
                <div class="tatami-card">
                    <div class="tatami-img-container">
                        @if($p->imagen)
                            <img src="{{ asset('storage/' . $p->imagen) }}" alt="{{ $p->nombre }}">
                        @else
                            <img src="{{ asset('img/productos/placeholder.jpg') }}" alt="Sin imagen">
                        @endif
                    </div>

                    <div class="tatami-body">
                        <h5 class="tatami-title">{{ $p->nombre }}</h5>

                        <div class="tatami-sizes">
                            <small>Talles:</small>
                            <div class="size-buttons">
                                @foreach($p->variantes as $variante)
                                    @if($variante->stock > 0)
                                        <button class="btn-size">{{ $variante->talle }}</button>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="tatami-footer">
                            <span class="tatami-price">${{ number_format($p->precio, 0, ',', '.') }}</span>
                            <button class="btn-tatami-cart">Añadir</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
