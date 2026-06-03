<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up()
{
    Schema::table('productos', function (Blueprint $table) {
        // Agregamos lo que falta
        $table->foreignId('categoria_id')->after('id')->constrained('categorias')->onDelete('cascade');
        $table->integer('stock_minimo')->after('precio')->default(2);
        $table->string('imagen')->after('stock_minimo')->nullable(); 
    });
}

public function down()
{
    Schema::table('productos', function (Blueprint $table) {
        // Por si alguna vez querés tirar un rollback
        $table->dropForeign(['categoria_id']);
        $table->dropColumn(['categoria_id', 'stock_minimo', 'imagen']);
    });
}
};
