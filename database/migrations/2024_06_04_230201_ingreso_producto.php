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
        Schema::create('IngresoProducto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productID')->constrained('products')->onDelete('cascade'); // Clave foránea
            $table->foreignId('facturaID')->constrained('factura')->onDelete('cascade'); // Clave foránea
            $table->decimal('KilosPorUnidad', 8, 2);
            $table->integer('CantidadCJ');
            $table->decimal('Kilos', 8, 2);
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingreso_producto');
    }
};
