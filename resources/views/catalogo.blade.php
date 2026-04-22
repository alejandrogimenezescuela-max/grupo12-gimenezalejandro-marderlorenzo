@extends("plantilla")
@section('title', 'Catálogo')
@section('content')

<div class="container mt-5">
    <div class="row text-center" id="category-container">
        <div class="col-md-4 category-card" style="opacity: 0;">
            <a href="/ropa" class="text-decoration-none">
                <div class="card bg-dark text-white border-danger shadow-lg">
                    <img src="img/pilchas.png" class="card-img" alt="Kimonos">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center">
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 category-card" style="opacity: 0; transform: translateY(30px);">
            <a href="/indumentaria" class="text-decoration-none">
                <div class="card bg-dark text-white border-danger shadow-lg">
                    <img src="{{ asset('img/indumentaria.png') }}" class="card-img" alt="Indumentaria">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center bg-overlay">
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 category-card" style="opacity: 0; transform: translateY(30px);">
            <a href="{{ url('/categorias/suplementos') }}" class="text-decoration-none">
                <div class="card bg-dark text-white border-danger shadow-lg">
                    <img src="{{ asset('img/suplementos.png') }}" class="card-img" alt="Suplementos">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center bg-overlay">
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


        <script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.category-card');
        
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.transition = "all 0.8s ease-out";
                card.style.opacity = "1";
                card.style.transform = "translateY(0)";
            }, 200 * index); // Las imágenes aparecen una tras otra
        });
    });
</script>

@endsection 