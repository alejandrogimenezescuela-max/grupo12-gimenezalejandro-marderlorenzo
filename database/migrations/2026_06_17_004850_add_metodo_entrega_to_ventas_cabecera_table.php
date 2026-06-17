<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Asegúrate de que el nombre de la tabla sea exactamente igual al que ves en DBeaver
        Schema::table('ventas_cabecera', function (Blueprint $table) {
            $table->string('metodo_entrega')->default('retiro');
        });
    }

    public function down()
    {
        Schema::table('ventas_cabecera', function (Blueprint $table) {
            $table->dropColumn('metodo_entrega');
        });
    }
};
