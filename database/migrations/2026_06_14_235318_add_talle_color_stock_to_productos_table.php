<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $columna) {
            $columna->string('talle', 50)->nullable()->after('precio');
            $columna->string('color', 50)->nullable()->after('talle');
            $columna->integer('stock')->default(0)->after('color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $columna) {
            $columna->dropColumn(['talle', 'color', 'stock']);
        });
    }
};
