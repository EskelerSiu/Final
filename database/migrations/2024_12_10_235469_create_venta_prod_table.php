<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('venta_prod', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('venta_id')->on('ventas')->onDelete('cascade');
 
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('producto_id')->on('productos')->onDelete('cascade');
            
            $table->integer('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_prod');
    }
};