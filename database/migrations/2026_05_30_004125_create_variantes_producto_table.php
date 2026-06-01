<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('variantes_producto', function (Blueprint $table) {
        $table->id();
        // Si se borra un producto, se eliminan automáticamente sus variantes
        $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
        $table->string('talle', 10)->nullable();  // A1, A2, 14oz, M, L...
        $table->string('color', 30)->nullable();  // Blanco, Negro, Azul...
        $table->integer('stock')->default(0);     // El stock físico real
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variantes_producto');
    }
};
