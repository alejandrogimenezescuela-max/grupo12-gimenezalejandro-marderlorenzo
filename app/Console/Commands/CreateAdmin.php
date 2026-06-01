<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Usuario; // <--- Súper importante: Usar tu modelo real 'Usuario'
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    protected $signature = 'make:admin';
    protected $description = 'Crea el usuario administrador por defecto en la base de datos';

    public function handle()
    {
        $email = 'admin@tatamihub.com';

        // Verificamos si ya existe usando tu modelo Usuario
        if (Usuario::where('email', $email)->exists()) {
            $this->error('El usuario administrador ya existe.');
            return Command::FAILURE;
        }

        // Creamos usando exactamente los campos de tu $fillable
        Usuario::create([
            'nombre'   => 'Alejandro',
            'apellido' => 'Gimenez', // <--- Agregamos el apellido que pide tu modelo
            'email'    => $email,
            'password' => Hash::make('admin123'),
            'rol_id'   => 1
        ]);

        $this->info('¡Usuario Administrador creado con éxito desde la terminal usando el modelo Usuario!');
        return Command::SUCCESS;
    }
}
