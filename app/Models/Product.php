<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    use HasFactory;

    protected $fillable = [
        'descripcion'
    ];

        public function envios()
    {
        return $this->hasMany(Envio::class);
    }

        public function ingresoProductos()
    {
        return $this->hasMany(IngresoProducto::class, 'productID');
    }
}
