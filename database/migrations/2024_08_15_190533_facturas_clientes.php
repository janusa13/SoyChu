<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        
        Schema::create('facturas_clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->string('numero');
            $table->string('condicion_pago');
            $table->date('fecha');
            $table->date('fecha_vencimiento');
            $table->float('facturaTotal');
            $table->timestamps();
        });

        
        Schema::create('factura_cliente_productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_cliente_id')->constrained('facturas_clientes')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('kilos_por_unidad');
            $table->integer('cantidad_cj');
            $table->integer('kilos_total');
            $table->decimal('precio', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

