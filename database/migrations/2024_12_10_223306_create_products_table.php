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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('producto_id'); // Clave primaria autoincremental
            $table->string('nombre'); // Nombre del producto
            $table->decimal('precio', 10, 2); // Precio del producto
            $table->integer('stock'); // Cantidad en stock
            $table->string('url')->nullable(); // URL de imagen o información
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
