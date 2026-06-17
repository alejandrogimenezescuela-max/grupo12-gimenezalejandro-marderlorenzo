<?php

namespace App\Http\Controllers;

use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CarritoController extends Controller
{
    // Helper privado: Busca el carrito activo o crea uno nuevo
    private function obtenerCarrito()
    {
        return VentaCabecera::firstOrCreate(
            ['user_id' => Auth::id(), 'estado' => 'carrito'],
            ['total' => 0]
        );
    }

    // Helper privado: Recalcula el total de la compra
    private function recalcularTotal(VentaCabecera $carrito)
    {
        $total = $carrito->detalles()->sum('subtotal');
        $carrito->update(['total' => $total]);
    }

    public function index()
    {
        $carrito = $this->obtenerCarrito();
        $items = $carrito->detalles()->with('producto')->get();
        return view('backend.usuarios.carrito', compact('carrito', 'items'));
    }

    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        if ($producto->stock < $request->cantidad) {
            return back()->with('error', 'No hay suficiente stock');
        }

        $carrito = $this->obtenerCarrito();
        $item = $carrito->detalles()->where('producto_id', $producto->id)->first();

        if ($item) {
            $item->cantidad += $request->cantidad;
            $item->subtotal = $item->cantidad * $item->precio_unitario;
            $item->save();
        } else {
            $carrito->detalles()->create([
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'precio_unitario' => $producto->precio,
                'subtotal' => $producto->precio * $request->cantidad,
            ]);
        }

        $this->recalcularTotal($carrito);
        return back()->with('success', 'Producto agregado');
    }

    public function eliminar($id)
    {
        $carrito = $this->obtenerCarrito();
        $carrito->detalles()->where('id', $id)->delete();
        $this->recalcularTotal($carrito);
        return back()->with('success', 'Producto eliminado');
    }

    public function confirmar()
{
    // 1. Usamos una transacción para asegurar integridad
    return DB::transaction(function () {
        $carrito = $this->obtenerCarrito();

        if ($carrito->detalles()->count() === 0) {
            return back()->with('error', 'Tu carrito está vacío');
        }

        $items = $carrito->detalles()->with('producto')->get();

        // 2. Recorremos los productos para restar el stock
        foreach ($items as $item) {
            $producto = $item->producto;

            // Verificamos si hay stock suficiente antes de restar
            if ($producto->stock < $item->cantidad) {
                return back()->with('error', 'El producto ' . $producto->nombre . ' ya no tiene stock suficiente.');
            }

            // Restamos el stock usando decremento directo en la base de datos
            $producto->decrement('stock', $item->cantidad);
        }

        // 3. Confirmamos la venta
        $total = $carrito->total;
        $carrito->update([
            'estado' => 'confirmado',
            'fecha_venta' => now(),
        ]);

        return redirect()->route('compra.confirmada')
                   ->with('items', $items)
                   ->with('total', $total);
    });
}

    public function generarComprobante()
    {
        $items = session('items');
        $total = session('total');

        if (!$items) {
            $venta = VentaCabecera::where('user_id', auth()->id())
                                  ->where('estado', 'confirmado')
                                  ->latest()
                                  ->first();

            if ($venta) {
                $items = $venta->detalles()->with('producto')->get();
                $total = $venta->total;
            } else {
                return redirect()->route('catalogo')->with('error', 'No se encontró la compra.');
            }
        }

        $pdf = Pdf::loadView('pdf.comprobante', compact('items', 'total'));
        return $pdf->download('comprobante_compra.pdf');
    }

    public function procesarPago(Request $request)
{
    $user = auth()->user();

    if ($request->metodo_entrega == 'envio') {
        // Validamos de nuevo por seguridad
        if (empty($user->direccion) || empty($user->telefono)) {
            return back()->withErrors(['error' => 'No puedes elegir envío a domicilio sin datos de contacto.']);
        }
    }

    // ... aquí continúas con tu lógica para guardar la VentaCabecera ...
    // Asegúrate de guardar el 'metodo_entrega' en la tabla ventas_cabecera
}

public function confirmarCompra(Request $request)
{
    // Usamos la Fachada Auth de forma consistente
    $usuario = \Illuminate\Support\Facades\Auth::user();

    // 0. Bloqueo para Administradores
    if ($usuario && $usuario->rol_id == 1) {
        return back()->withErrors(['error' => 'Los administradores no pueden realizar compras.']);
    }

    // 1. Validamos que el método sea uno de los permitidos
    $request->validate([
        'metodo_entrega' => 'required|in:retiro,envio',
    ]);

    // 2. Si eligió envío, verificamos sus datos de perfil
    if ($request->metodo_entrega == 'envio') {
        // Usamos la variable $usuario que definimos arriba
        if (!$usuario || !$usuario->tienePerfilCompleto()) {
            return back()->withErrors(['metodo_entrega' => 'Para el envío a domicilio, primero debes completar tu teléfono y dirección en tu perfil.']);
        }
    }

    // 3. Guardamos la venta
    $venta = new VentaCabecera();
    $venta->user_id = $usuario->id; // Usamos el ID del usuario ya cargado
    $venta->metodo_entrega = $request->metodo_entrega;
    $venta->estado = 'confirmado';

    $venta->save();

    // 4. Redirección final
    return redirect()->route('compra.confirmada')->with('success', 'Compra confirmada con éxito.');
}
}
