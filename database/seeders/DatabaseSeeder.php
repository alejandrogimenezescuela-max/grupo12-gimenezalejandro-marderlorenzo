<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamamos al seeder que creaste para cargar los roles
        $this->call([
            RolesSeeder::class,
        ]);
    }
}