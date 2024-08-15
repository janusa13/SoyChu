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
        Schema::create('ingresoProducto', function (Blueprint $table){
        $table->id();
        $table->foreignId('productID')->constrained('products')->onDelete('cascade'); // HACER LA RELACION ACA!! corrigiendo el tipo de datos y agregandolo al modelo.
        $table->foreignId('facturaID')->constrained('factura')->onDelete('cascade'); //HACER LA RELACION ACA!!! corrigiendo el tipo de datos y agregandolo al modelo.
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


//  https://ayuda.xubio.com/wp-content/uploads/2018/08/C%C3%B3mo-ingreso-una-nueva-factura-de-compra-en-Xubio-Argentina-7.gif