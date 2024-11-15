<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoProducto extends Model
{
    use HasFactory;

    protected $table ='ingresoproducto';


        public function factura()
    {
        return $this->belongsTo(Factura::class, 'facturaID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id');
    }


}
