<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaCliente extends Model
{
    use HasFactory;

    protected $table = 'facturas_clientes';

    protected $fillable = [
        'cliente_id',
        'numero',
        'condicion_pago',
        'fecha',
        'fecha_vencimiento',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function facturaClienteProductos()
    {
        return $this->hasMany(FacturaClienteProducto::class, 'factura_cliente_id');
    }
}
