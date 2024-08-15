<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'descripcion'
    ];

    public function envios()
    {
        return $this->hasMany(Envio::class);
    }

    public function ingresoProductos()
    {
        return $this->hasMany(IngresoProducto::class, 'product_id');
    }
}
