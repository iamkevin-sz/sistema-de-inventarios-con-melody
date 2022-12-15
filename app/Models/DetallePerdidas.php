<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePerdidas extends Model
{
    use HasFactory;
    protected $fillable = [
        'detalle',
        'cantidad',
        'precio',
        'perdida_id',
        'producto_id',
    ];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }


    public function perdidas(){
        return $this->belongsTo(Perdidas::class);
    }
}
