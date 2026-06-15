@extends("plantilla")
@section('title', 'Cargar Producto')
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-4 border-0" style="border-radius: 15px;">
                <h2 class="fw-bold mb-4 text-uppercase text-danger">Cargar Nuevo Producto</h2>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show fw-bold mb-4" role="alert">
                        ¡Misión cumplida! {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('backend.admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-muted">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej: Kimono Vulkan BJJ - Azul A2" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-muted">Categoría</label>
                            <select name="categoria_id" id="categoria_id" class="form-select" required>
                                <option value="" disabled selected>Seleccione una categoría</option>
                                @foreach($categorias as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold text-muted">Descripción del Artículo</label>
                            <textarea name="descripcion" class="form-control" rows="3" placeholder="Detalles del material, tejido, etc." required></textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-muted">Precio ($)</label>
                            <input type="number" name="precio" step="0.01" class="form-control" placeholder="0.00" required>
                        </div>

                        <div class="col-md-4">
                            <label id="label-talle" class="form-label fw-bold text-muted">Talle</label>
                            <input type="text" name="talle" id="talle" class="form-control" placeholder="Ej: A2, M, Único">
                        </div>

                        <div class="col-md-4">
                            <label id="label-color" class="form-label fw-bold text-muted">Color</label>
                            <input type="text" name="color" id="color" class="form-control" placeholder="Ej: Azul, Negro">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-muted">Stock Real</label>
                            <input type="number" name="stock" class="form-control" placeholder="Cantidad" min="0" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-muted">Stock Mínimo Alerta</label>
                            <input type="number" name="stock_minimo" class="form-control" value="2" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-muted">Imagen Destacada</label>
                            <input type="file" name="imagen" class="form-control" accept="image/*" required>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-danger btn-lg w-100">
                            Publicar Producto en Catálogo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('categoria_id').addEventListener('change', function() {
    // Conseguimos el texto de la categoría elegida
    let categoriaTexto = this.options[this.selectedIndex].text.trim().toLowerCase();

    // Agarramos las etiquetas por su ID
    let labelTalle = document.getElementById('label-talle');
    let labelColor = document.getElementById('label-color');

    // Agarramos los inputs por su ID
    let inputTalle = document.getElementById('talle');
    let inputColor = document.getElementById('color');

    if (categoriaTexto === 'suplementos') {
        // Si eligen Suplementos, mutamos el diseño a kilos y sabores
        labelTalle.innerText = "Presentación (Peso / Caps)";
        labelColor.innerText = "Sabor / Detalle";
        inputTalle.placeholder = "Ej: 1kg, 90 caps, 300g";
        inputColor.placeholder = "Ej: Frutilla, Chocolate, Sin Sabor";
    } else {
        // Si eligen Ropa o Indumentaria, vuelve a lo normal
        labelTalle.innerText = "Talle";
        labelColor.innerText = "Color";
        inputTalle.placeholder = "Ej: A2, M, Único";
        inputColor.placeholder = "Ej: Azul, Negro";
    }
});
</script>

@endsection
