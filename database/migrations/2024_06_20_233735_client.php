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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('provincia');
            $table->string('localidad');
            $table->string('calleYNumero');
            $table->string('codigoPostal');
            $table->string('cuit');
            $table->string('categoriaIVA');
            $table->string('correoElectronico');
            $table->string('numeroCelular');
            $table->string('celularLaboral');
            $table->string('nombreFantasia');
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