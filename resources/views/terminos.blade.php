@extends("plantilla")
@section('title', 'Términos y Usos')
@section('content')

<div class="container my-5 py-5 text-center">
    <div class="row justify-content-center mb-5">
        <div class="col-auto">
            <h1 class="fw-bold text-uppercase" style="color: #ed1c24; letter-spacing: -1px; font-size: 3rem;">
                Términos y Usos
            </h1>
            <div style="background-color: #ed1c24; height: 5px; width: 100px; border-radius: 2px;" class="mx-auto"></div>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <p class="text-dark" style="font-size: 1.1rem; line-height: 1.8;">
                Bienvenido a <span class="fw-bold" style="color: #ed1c24;">TATAMIHUB</span>. Al navegar por nuestro sitio, aceptás los términos y condiciones detallados a continuación para garantizar una experiencia segura y confiable.
            </p>
        </div>
    </div>

    <div class="row justify-content-center g-4 text-start">

        <div class="col-md-5">
            <div class="p-4 h-100 shadow-sm rounded-3 bg-white border" style="border-left: 5px solid #ed1c24 !important;">
                <h3 class="fw-bold text-uppercase mb-3" style="color: #ed1c24; font-size: 1.3rem;">Políticas de Privacidad</h3>
                <p class="text-muted small">Los datos recolectados en nuestros formularios se utilizan exclusivamente para la gestión de pedidos y comunicación directa con el cliente, respetando la confidencialidad absoluta.</p>
            </div>
        </div>

        <div class="col-md-5">
            <div class="p-4 h-100 shadow-sm rounded-3 bg-white border" style="border-left: 5px solid #ed1c24 !important;">
                <h3 class="fw-bold text-uppercase mb-3" style="color: #ed1c24; font-size: 1.3rem;">Garantías y Soporte</h3>
                <p class="text-muted small">Todos nuestros productos cuentan con garantía oficial por defectos de fabricación. Ofrecemos soporte postventa para asegurar la satisfacción total en el uso de tu equipamiento.</p>
            </div>
        </div>

        <div class="col-md-5">
            <div class="p-4 h-100 shadow-sm rounded-3 bg-white border" style="border-left: 5px solid #ed1c24 !important;">
                <h3 class="fw-bold text-uppercase mb-3" style="color: #ed1c24; font-size: 1.3rem;">Condiciones de Venta</h3>
                <p class="text-muted small">Los precios y disponibilidad de stock están sujetos a cambios. El proceso de compra se completa una vez verificado el pago a través de los canales autorizados.</p>
            </div>
        </div>

        <div class="col-md-5">
            <div class="p-4 h-100 shadow-sm rounded-3 bg-white border" style="border-left: 5px solid #ed1c24 !important;">
                <h3 class="fw-bold text-uppercase mb-3" style="color: #ed1c24; font-size: 1.3rem;">Aviso Legal</h3>
                <p class="text-muted small">El uso de este sitio web implica la aceptación de nuestras normas de comportamiento y respeto hacia la propiedad intelectual de los contenidos presentados.</p>
            </div>
        </div>

    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="p-3 border-top">
                <p class="text-muted small">Para más información sobre tiempos de entrega y procedimientos, podés visitar nuestra sección de <a href="{{ url('/comercializacion') }}" style="color: #ed1c24; font-weight: bold; text-decoration: none;">Comercialización</a>.</p>
            </div>
        </div>
    </div>
</div>

@endsection
