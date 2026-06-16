@extends("plantilla")
@section('title', 'Gestion de Productos')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-danger fw-bold">LISTA DE PRODUCTOS</h2>
        <a href="{{ url('/admin/cargar') }}" class="btn btn-outline-danger">Nuevo Producto</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>
                        {{-- Asegúrate que el archivo esté en public/img/productos/ --}}
                        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                             style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                    </td>
                    <td class="fw-bold">{{ $producto->nombre }}</td>
                    <td>${{ number_format($producto->precio, 0, ',', '.') }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td class="text-center">
                        {{-- Botón Editar --}}
                        <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-sm btn-warning me-2">
                            <i class="bi bi-pencil-fill"></i>
                        </a>

                        {{-- Botón Eliminar (Negro Sólido) --}}
<form action="{{ route('producto.destroy', $producto->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="btn btn-sm btn-dark text-white"
            style="background-color: #000000 !important; border-color: #000000 !important;"
            onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
        <i class="bi bi-trash-fill"></i>
    </button>
</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
