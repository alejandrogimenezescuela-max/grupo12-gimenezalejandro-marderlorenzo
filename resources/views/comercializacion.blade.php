@extends("plantilla")
@section('title', 'Comercialización')
@section('content')

<div class="container my-5 py-5 text-center">
    <div class="row justify-content-center mb-5">
        <div class="col-auto">
            <h1 class="fw-bold text-uppercase" style="color: #ed1c24; letter-spacing: -1px; font-size: 3rem;">
                Comercialización
            </h1>
            <div style="background-color: #ed1c24; height: 5px; width: 100px; border-radius: 2px;" class="mx-auto"></div>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <p class="text-dark" style="font-size: 1.1rem; line-height: 1.8;">
                <span class="fw-bold" style="color: #ed1c24;">TATAMIHUB</span> garantiza un proceso de compra transparente y seguro. Detallamos a continuación nuestras políticas de comercialización para envíos y pagos.
            </p>
        </div>
    </div>

    <div class="row justify-content-center gap-4">
    <div class="col-md-5 p-4 shadow-sm rounded-3 bg-white border">
        <h2 class="fw-bold text-uppercase mb-3" style="color: #ed1c24; font-size: 1.5rem;">Envíos y Entregas</h2>
        <div style="background-color: #ed1c24; height: 3px; width: 50px; border-radius: 2px;" class="mx-auto mb-3"></div>
        <p class="text-muted">Realizamos envíos a todo el país mediante logística certificada. Contamos con entrega a domicilio y puntos de retiro estratégicos.</p>
    </div>

    <div class="col-md-5 p-4 shadow-sm rounded-3 bg-white border">
        <h2 class="fw-bold text-uppercase mb-3" style="color: #ed1c24; font-size: 1.5rem;">Información Útil</h2>
        <div style="background-color: #ed1c24; height: 3px; width: 50px; border-radius: 2px;" class="mx-auto mb-3"></div>
        <p class="text-muted small">Los pedidos se procesan en un máximo de 48hs hábiles. El tiempo final depende de la ubicación del cliente.</p>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div class="p-4 rounded-4 shadow-sm" style="background-color: #f8f9fa; border-top: 5px solid #ed1c24;">
            <h3 class="fw-bold text-uppercase" style="color: #ed1c24; font-size: 1.8rem;">Formas de Pago</h3>
            <p class="mt-3 mb-0">Aceptamos todas las tarjetas de crédito, débito y transferencias bancarias para asegurar tu comodidad en cada compra.</p>

            </p>

            <div class="py-3 px-2 rounded-3" style="background-color: #ed1c24;">
                <img src="{{ asset('img/pagos-envios.png') }}"
                     alt="Medios de pago y envío"
                     class="img-fluid"
                     style="max-height: 50px; filter: brightness(1.1);">
            </div>

            <p class="mt-3 small text-muted italic">
                Operamos con las plataformas de pago más seguras del país.
            </p>

        </div>
    </div>
</div>


@endsection
