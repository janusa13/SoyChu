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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->float('cantidad')->default(0);
            $table->enum('rubro', ['pollos', 'lacteos','rebosados','otros']);
            $table->timestamps();
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


/**
 *
 *  Corregir los numeros de montos y dinero a la derecha
 *  Agregar rubros de productos.
 *  Busqueda de producto por descripcion
 *  Filtrar productos por rubros
 */