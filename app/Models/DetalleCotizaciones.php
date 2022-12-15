<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCotizaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'detalle',
        'cantidad',
        'precio',
        'descuento',
        'cotizaciones_id',
        'producto_id',
    ];

    public function cotizaciones(){
        return $this->belongsTo(Cotizaciones::class, 'cotizaciones_id', 'id');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
}
