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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // PK [cite: 19, 103]
            $table->string('nombre'); //[cite: 20, 104]
            $table->string('email')->unique(); // unique() evita correos duplicados [cite: 21, 105]
            $table->string('password'); // Siempre se guarda hasheada [cite: 22, 106, 113]
            
            // Relación con la tabla Roles
            $table->foreignId('rol_id')
                  ->constrained('roles') // FK hacia tabla roles [cite: 23, 107, 108, 114]
                  ->onDelete('restrict'); // impide borrar un rol con usuarios [cite: 109, 115]
                  
            $table->rememberToken(); // token para "Recordarme" [cite: 110, 116]
            $table->timestamps(); // created_at y updated_at [cite: 24, 25, 111]
            $table->softDeletes(); // borrado lógico (deleted_at) [cite: 26, 112]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios'); //[cite: 80, 102]
    }
};