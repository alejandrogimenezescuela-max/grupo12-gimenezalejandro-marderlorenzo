@extends("plantilla")
@section('title', 'Editar Producto')
@section('content')
<div class="container py-5">
    <h2 class="text-danger fw-bold mb-4">Editar Producto: {{ $producto->nombre }}</h2>

    <div class="card p-4 bg-light">
        <form action="{{ route('producto.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Precio</label>
                    <input type="number" name="precio" value="{{ $producto->precio }}" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Stock</label>
                    <input type="number" name="stock" value="{{ $producto->stock }}" class="form-control" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">Guardar Cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
