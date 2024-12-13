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
        Schema::create('materia_primas', function (Blueprint $table) {
            $table->id('materia_prima_id'); // Clave primaria
            $table->string('nombre');
            $table->text('descripcion')->nullable(); // Campo opcional
            $table->string('proveedor')->nullable(); // Campo opcional
            $table->decimal('cantidad', 10, 2);
            $table->string('unidad');
            $table->decimal('precio', 10, 2);
            $table->string('url')->nullable(); // Campo opcional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_primas');
    }
};
