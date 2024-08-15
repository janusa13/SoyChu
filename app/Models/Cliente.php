<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'provincia',
        'localidad',
        'calleYNumero',
        'codigoPostal',
        'cuit',
        'categoriaIVA',
        'correoElectronico',
        'numeroCelular',
        'celularLaboral',
        'nombreFantasia'
    ];
}
