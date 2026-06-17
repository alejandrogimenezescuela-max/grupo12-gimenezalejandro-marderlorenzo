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
    Schema::create('ventas_cabecera', function (Blueprint $table) {
        $table->id();

        // 1. Primero creamos la columna (debe coincidir con el tipo de la tabla 'usuarios')
        $table->foreignId('user_id')->unsigned();

        // 2. Ahora sí, le decimos que esa columna es una llave foránea
        $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');

        $table->string('estado')->default('carrito');
        $table->decimal('total', 10, 2)->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_cabecera');
    }
};
