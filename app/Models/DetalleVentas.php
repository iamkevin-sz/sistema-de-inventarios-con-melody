<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVentas extends Model
{
    use HasFactory;

    protected $fillable = [

        'cantidad',
        'precio',
        'descuento',
        'ventas_id',
        'producto_id',
    ];

    public function ventas(){
        return $this->belongsTo(Ventas::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
