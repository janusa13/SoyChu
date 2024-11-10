<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'descripcion',
        'rubro',
        'cantidad'
    ];

public function facturaClienteProductos()
{
    return $this->hasMany(FacturaClienteProducto::class, 'product_id');
}

public function ingresoproductos()
{
    return $this->hasMany(IngresoProducto::class, 'productID');
}

public function envios()
{
    return $this->hasMany(Envio::class, 'product_id');
}
}
