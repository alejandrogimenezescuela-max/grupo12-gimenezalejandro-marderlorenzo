<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Ruta donde guardamos las fotos en el paso 1
        $origen = database_path('seeders/imagenes_prueba');

        // Ruta donde Laravel las necesita para que se vean
        $destino = storage_path('app/public/productos');

        // Si la carpeta de destino no existe, la creamos
        if (!File::exists($destino)) {
            File::makeDirectory($destino, 0755, true);
        }

        // Copiamos todas las imágenes
        File::copyDirectory($origen, $destino);

        $this->command->info('¡Imágenes de productos copiadas con éxito!');
    }
}
