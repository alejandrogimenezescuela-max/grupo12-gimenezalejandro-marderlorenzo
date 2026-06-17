<label class="text-white fw-bold">Método de entrega:</label>
<select name="metodo_entrega" class="form-control" required>
    <option value="retiro">Retiro en sucursal (Gratis)</option>

    @if(auth()->user()->tienePerfilCompleto())
        <option value="envio">Envío a domicilio</option>
    @else
        <option value="envio" disabled>Envío a domicilio (Completa tu perfil en "Mi Cuenta" para habilitar)</option>
    @endif
</select>
