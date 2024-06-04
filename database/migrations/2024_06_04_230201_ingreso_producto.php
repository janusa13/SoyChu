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
        $table->id();
        $table->string('descripcion');
        $table->string('id_producto'); // HACER LA RELACION ACA!! corrigiendo el tipo de datos y agregandolo al modelo.
        $table->string('id_factura'); //HACER LA RELACION ACA!!! corrigiendo el tipo de datos y agregandolo al modelo.
        $table->decimal('Kilos por unidad', 8, 2);
        $table->integer('Cantidad CJ');
        $table->decimal('Kilos', 8, 2);
        $table->decimal('precio', 8, 2);
        $table->timestamps();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};


//  https://ayuda.xubio.com/wp-content/uploads/2018/08/C%C3%B3mo-ingreso-una-nueva-factura-de-compra-en-Xubio-Argentina-7.gif