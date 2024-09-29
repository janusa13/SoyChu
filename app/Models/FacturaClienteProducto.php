<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaClienteProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_cliente_id',
        'product_id',
        'kilos_por_unidad',
        'cantidad_cj',
        'kilos_total',
        'precio',
    ];

    public function facturaCliente()
    {
        return $this->belongsTo(FacturaCliente::class, 'factura_cliente_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
