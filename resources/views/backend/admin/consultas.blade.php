@extends('plantilla')
@section('title', 'Consultas Recibidas')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4 text-dark">Consultas recibidas</h2>

    {{-- Tabla con fondo forzado para evitar herencia de estilos blancos --}}
    <div class="table-responsive" style="background: #1a1a1a; padding: 20px; border-radius: 12px;">
        <table class="table table-dark table-hover mb-0">
            <thead>
                <tr style="color: #ed1c24;"> {{-- Color de marca TatamiHUB --}}
                    <th>Nombre</th>
                    <th>Mensaje</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mensajes as $msg)
                    <tr>
                        <td class="align-middle text-white">{{ $msg->nombre }}</td>
                        <td class="align-middle text-white">{{ $msg->mensaje }}</td>
                        <td class="align-middle">
                            @if(!$msg->leida)
                                <form action="{{ route('admin.consultas.marcar', $msg->id) }}" method="POST" class="m-0">
                                    @csrf @method('PUT')
                                    <button type="submit"
                                            style="background: #ed1c24; border: none; color: white; padding: 5px 15px; border-radius: 5px; font-weight: bold; cursor: pointer;">
                                        Marcar como leída
                                    </button>
                                </form>
                            @else
                                <span class="fw-bold" style="color: #28a745;">✓ Leído</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
