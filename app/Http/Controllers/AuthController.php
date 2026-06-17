<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User; // <-- CAMBIAMOS ESTO: Usamos el modelo User que corregimos antes
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Importamos el Hash por seguridad
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // 1. Muestra la vista de login (Controlando si ya está logueado)
    public function formularioLogin() {
        if (auth()->check()) {
            /** @var \App\Models\User $usuario */
            $usuario = auth()->user();

            if ($usuario->rol_id == 1) {
                return redirect('/admin/dashboard');
            }
            return redirect('/cliente');
        }

        return view('backend.usuarios.login');
    }

    // 2. Muestra la vista de registro (Controlando si ya está logueado)
    public function formularioRegistro() {
        if (auth()->check()) {
            /** @var \App\Models\User $usuario */
            $usuario = auth()->user();

            if ($usuario->rol_id == 1) {
                return redirect('/admin/dashboard');
            }
            return redirect('/cliente');
        }

        return view('backend.usuarios.registro');
    }

    // 3. Procesa el formulario de registro público (Crea Clientes)
    public function registrar(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email',
            'password' => [
                'required',
                'string',
                'confirmed', // <-- Esta regla exige que coincida con password_confirmation
                \Illuminate\Validation\Rules\Password::min(8)->mixedCase()
            ],
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'lastname.required' => 'El campo apellido es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'Por favor, ingresá un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado en TatamiHUB.',
            'password.required' => 'La contraseña es obligatoria.',

            //  CLAVE: Separamos los mensajes para que Laravel sepa cuál mostrar según el error
            'password.confirmed' => 'Las contraseñas no coinciden. Por favor, verificalas.',
            'password' => 'La contraseña debe tener al menos 8 caracteres y contener una letra mayúscula.',
        ]);

        $rolCliente = Rol::where('nombre', 'cliente')->first();
        $rolId = $rolCliente ? $rolCliente->id : 2;

        $usuario = new User();
        $usuario->nombre = $request->name;
        $usuario->apellido = $request->lastname;
        $usuario->email = $request->email;
        $usuario->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $usuario->rol_id = $rolId;
        $usuario->save();

        return redirect('/login')->with('success', 'Usuario registrado con éxito.');
    }

    // 4. Procesa el inicio de sesión
    public function autenticar(Request $request) {
        $credenciales = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credenciales)) {
            $request->session()->regenerate();

            /** @var \App\Models\User $usuario */
            $usuario = auth()->user();

            if ($usuario->rol_id == 1) {
                return redirect('/admin/dashboard');
            }

            return redirect('/catalogo');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    // 5. Cierra la sesión de forma segura
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión cerrada correctamente.');
    }

    // Muestra el panel del cliente con sus datos
    public function panelCliente() {
        if (!auth()->check()) {
            return redirect('/login');
        }

        return view('backend.usuarios.cliente');
    }

    // Guarda o actualiza la dirección del cliente
    public function guardarDireccion(Request $request) {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
        ]);

        /** @var \App\Models\User $usuario */
        $usuario = auth()->user();

        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->save();

        return back()->with('success', 'Dirección actualizada correctamente.');
    }

    // Muestra la vista para ingresar el correo
    public function mostrarOlvide() {
        // Ahora apunta correctamente a 'recuperar.blade.php'
        return view('backend.usuarios.recuperar');
    }

    // Procesa el formulario y verifica si existe en la base de datos
    public function enviarDatosLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresá un formato de email válido.',
        ]);

        // Buscamos el email en tu tabla 'usuarios' (o 'users') utilizando el modelo User
        $usuarioExiste = \App\Models\User::where('email', $request->email)->exists();

        if ($usuarioExiste) {
            // Si existe, devuelve el mensaje de éxito que me pediste
            return back()->with('success', 'Se mandaron tus datos de inicio de sesión a tu correo electrónico.');
        }

        // Si no existe, notifica el error de forma directa
        return back()->withErrors(['email' => 'Este correo electrónico no se encuentra registrado en nuestro sistema.']);
    }

    public function verHistorial()
{
    // Buscamos las ventas del usuario actual, ordenadas de la más nueva a la más vieja
    $ventas = \App\Models\VentaCabecera::where('user_id', auth()->id())
              ->orderBy('created_at', 'desc')
              ->get();

    return view('backend.usuarios.historial', compact('ventas'));
}

public function verDetalle($id)
{
    // Buscamos la venta y cargamos sus detalles (asumiendo que el modelo tiene la relación 'detalles')
    $venta = \App\Models\VentaCabecera::where('id', $id)
             ->where('user_id', auth()->id()) // Seguridad: que solo vea lo suyo
             ->firstOrFail();

    return view('backend.usuarios.historial', compact('venta'));
}

public function updatePerfil(Request $request)
{
    $user = auth()->user();

    // Validamos: correo único (excepto el propio) y contraseña opcional
    $request->validate([
        'email' => 'required|email|unique:usuarios,email,' . $user->id,
        'password' => 'nullable|min:8|confirmed',
    ], [
        'email.unique' => 'Ese correo ya está siendo utilizado por otro usuario.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
    ]);

    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return back()->with('success', 'Perfil actualizado con éxito.');
}

    }
