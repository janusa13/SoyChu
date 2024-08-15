<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
        protected $table ='factura';

        protected $fillable = [
        'proveedor',
        'condicion_pago',
        'numero',
        'fecha',
        'fecha_vencimiento'
    ];

        public function ingresoProductos()
    {
        return $this->hasMany(IngresoProducto::class, 'facturaID');
    }

        public function productos()
    {
        return $this->hasMany(Producto::class);
    }

        public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
