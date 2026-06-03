@extends("plantilla")
@section('title', 'Cargar Producto')
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-4 border-0" style="border-radius: 15px;">
                <h2 class="fw-bold mb-4 text-uppercase text-danger">Cargar Nuevo Producto</h2>

                <form action="{{ url('/admin/productos/guardar') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-muted">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej: Kimono Vulkan BJJ" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-muted">Categoría</label>
                            <select name="categoria_id" class="form-select" required>
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
                            <label class="form-label fw-bold text-muted">Stock Mínimo Alerta</label>
                            <input type="number" name="stock_minimo" class="form-control" value="2" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-muted">Imagen Destacada</label>
                            <input type="file" name="imagen" class="form-control" accept="image/*" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="fw-bold text-dark mb-3">Gestión de Variantes de Stock</h4>
                    <p class="text-muted small">Cargá las combinaciones disponibles para este producto.</p>

                    <div id="contenedor-variantes">
                        <div class="row g-2 variante-fila mb-2">
                            <div class="col-md-4">
                                <input type="text" name="talle[]" class="form-control" placeholder="Talle (Ej: A2, M, Único)" required>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="color[]" class="form-control" placeholder="Color (Ej: Azul, Negro)" required>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="stock[]" class="form-control" placeholder="Stock Real" min="0" required>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-danger w-100" onclick="eliminarFila(this)">X</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-dark btn-sm mt-2" id="btn-agregar-variante">
                        + Agregar otra variante
                    </button>

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
    document.getElementById('btn-agregar-variante').addEventListener('click', function() {
        let contenedor = document.getElementById('contenedor-variantes');
        let nuevaFila = document.createElement('div');
        nuevaFila.className = 'row g-2 variante-fila mb-2';
        nuevaFila.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="talle[]" class="form-control" placeholder="Talle" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="color[]" class="form-control" placeholder="Color" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="stock[]" class="form-control" placeholder="Stock Real" min="0" required>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-outline-danger w-100" onclick="eliminarFila(this)">X</button>
            </div>
        `;
        contenedor.appendChild(nuevaFila);
    });

    function eliminarFila(boton) {
        let filas = document.querySelectorAll('.variante-fila');
        if (filas.length > 1) {
            boton.closest('.variante-fila').remove();
        } else {
            alert("El producto debe tener al menos una variante.");
        }
    }
</script>

@endsection