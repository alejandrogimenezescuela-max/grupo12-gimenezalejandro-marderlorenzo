@extends('plantilla')
@section('title', 'Recuperar Contraseña - TatamiHUB')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 20px; background-color: #fff; max-width: 500px; w-100: 100%;">
        
        <h2 class="text-center fw-bold mb-4" style="letter-spacing: -1px; color: #111; text-transform: uppercase;">Recuperar Cuenta</h2>
        <p class="text-muted text-center small mb-4">Ingresá tu correo electrónico para enviarte tus datos de inicio de sesión.</p>

        {{-- Alerta de Éxito --}}
        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 10px; color: #155724; background-color: #d4edda; padding: 12px; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Alerta de Error --}}
        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 10px; color: #721c24; background-color: #f8d7da; padding: 12px; font-size: 14px;">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/olvidaste-contrasena">
            @csrf

            {{-- Input Email --}}
            <div class="mb-4">
                <label class="form-label fw-semibold text-dark small">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;">
                        <i class="bi bi-envelope text-muted"></i>
                    </span>
                    <input type="email" name="email" class="form-control border-start-0" placeholder="Ingrese su Email" required value="{{ old('email') }}" style="border-radius: 0 10px 10px 0; padding: 10px;">
                </div>
            </div>

            {{-- Botón --}}
            <button type="submit" class="btn w-100 text-white fw-bold py-2 mb-4" style="background-color: #e51b24; border-radius: 10px; font-size: 16px;">
                Enviar Datos
            </button>

            {{-- Volver --}}
            <div class="text-center small">
                <a href="/login" class="fw-bold text-danger text-decoration-none">Volver al Iniciar Sesión</a>
            </div>
        </form>
    </div>
</div>
@endsection