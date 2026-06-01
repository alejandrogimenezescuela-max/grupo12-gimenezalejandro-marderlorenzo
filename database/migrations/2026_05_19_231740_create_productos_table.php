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
        // Enlace con categorías: Si se borra una categoría, ojo, acá usamos 'restrict' para que no te borre los productos por error
        $table->foreignId('categoria_id')->constrained('categorias')->onDelete('restrict');
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->decimal('precio', 10, 2);
        $table->integer('stock_minimo')->default(5);
        $table->string('imagen')->nullable();
        $table->timestamps();
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
