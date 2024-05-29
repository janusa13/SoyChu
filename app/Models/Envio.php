<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'sucursal_id',
        'cantidad',
        'enviado_at',
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

        public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}

