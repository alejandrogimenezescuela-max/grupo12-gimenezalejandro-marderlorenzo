<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // PK autoincremental [cite: 87]
            $table->string('nombre')->unique(); // Evita duplicados [cite: 88, 90]
            $table->string('descripcion')->nullable(); // Campo opcional [cite: 91]
            $table->timestamps(); // created_at y updated_at [cite: 92]
            $table->softDeletes(); // Borrado lógico [cite: 93]
        });
    }

   public function down(): void
{
    Schema::dropIfExists('roles');
}
};
