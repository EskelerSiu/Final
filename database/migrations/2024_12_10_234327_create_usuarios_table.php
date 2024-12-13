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
            $table->id('usuario_id'); // Clave primaria autoincremental
            $table->string('nombre'); // Nombre del usuario
            $table->string('correo')->unique(); // Correo único
            $table->string('password'); // Contraseña encriptada
            $table->string('rol'); // Rol del usuario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
