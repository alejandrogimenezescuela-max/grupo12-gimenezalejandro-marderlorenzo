<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstalarProyectoSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Desactivar llaves foráneas un segundo para poder vaciar las tablas sin errores
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Limpiamos las tablas por si quedó data a medias
        DB::table('usuarios')->truncate();
        DB::table('roles')->truncate();
        DB::table('categorias')->truncate();
        
        // Volver a activar las llaves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Insertar Roles de forma limpia
        DB::table('roles')->insert([
            ['id' => 1, 'nombre' => 'admin', 'descripcion' => 'Admin Total', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nombre' => 'cliente', 'descripcion' => 'Cliente Tienda', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Insertar Categorías
        DB::table('categorias')->insert([
            ['id' => 1, 'nombre' => 'ropa', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nombre' => 'indumentaria', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nombre' => 'suplementos', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 3. Crear tu usuario administrador con tus datos reales
        DB::table('usuarios')->insert([
            'nombre' => 'Lorenzo',
            'apellido' => 'Marder',
            'email' => 'marder123lorenzo@gmail.com',
            'password' => Hash::make('lolo123'),
            'rol_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}