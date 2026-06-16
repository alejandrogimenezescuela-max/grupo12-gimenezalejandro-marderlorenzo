@extends("plantilla")
@section('title', 'Suplementos')
@section('content')

<div class="container mt-5">
    <div class="row g-4">
        @foreach($suplementos as $p)
            <div class="col-md-4 col-sm-6">
                <div class="tth-card">
                    <div class="tth-img-wrapper">
                        <img src="{{ $p->imagen ? asset($p->imagen) : asset('img/productos/placeholder.jpg') }}"
                             alt="{{ $p->nombre }}">
                    </div>

                    {{-- Cuerpo del producto con flex-grow para empujar el footer --}}
                    <div class="p-4 flex-grow-1">
                        <h5 class="text-white mb-2" style="font-size: 1.25rem;">{{ $p->nombre }}</h5>

                        <div class="d-flex flex-column gap-1 mb-3">
                            @if($p->talle)
                                <small class="text-muted fw-bold">Presentación: <span class="text-white">{{ $p->talle }}</span></small>
                            @endif
                            @if($p->color)
                                <small class="text-muted fw-bold">Detalle/Sabor: <span class="text-white">{{ $p->color }}</span></small>
                            @endif
                        </div>

                        <div class="mt-2">
                            @if($p->stock > 0)
                                <span class="text-success small fw-bold">● En Stock ({{ $p->stock }})</span>
                            @else
                                <span class="text-danger small fw-bold">● Sin Stock</span>
                            @endif
                        </div>
                    </div>

                    {{-- Footer con espaciado forzado --}}
                    <div class="p-4 pt-0">
                        <div class="d-flex align-items-center justify-content-between" style="gap: 15px;">
                            <span class="text-white fw-bold fs-4">${{ number_format($p->precio, 0, ',', '.') }}</span>

                            @if($p->stock > 0)
                                <a href="{{ route('producto.show', $p->id) }}" class="tth-btn" style="margin-left: auto;">Ver</a>
                            @else
                                <button class="tth-btn" style="margin-left: auto; background:#444;" disabled>Agotado</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
