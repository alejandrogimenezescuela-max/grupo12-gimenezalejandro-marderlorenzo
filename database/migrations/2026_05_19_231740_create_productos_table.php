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
    Schema::create('productos', function (Blueprint $table) {
        $table->id();

        // 1. Creamos la clave foránea que te estaba faltando
        $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');

        $table->string('nombre');
        $table->text('descripcion');
        $table->decimal('precio', 8, 2);
        $table->integer('stock_minimo')->default(2); // Para las alertas de stock bajo
        $table->string('imagen'); // Para guardar la ruta de la foto (.png, .jpg)
        $table->timestamps();
        $table->softDeletes(); // Si usás borrado lógico, si no quitalo
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
