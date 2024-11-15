<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table ='sucursals';
    use HasFactory;

    protected $fillable=[
        'nombre',
        'direccion',
        'telefono'

    ];
        public function envios()
    {
        return $this->hasMany(Envio::class);
    }
}
