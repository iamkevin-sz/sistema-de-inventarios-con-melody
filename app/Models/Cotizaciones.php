<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_cotizacion',
        'impuesto',
        'total',
        'descripcion',
        'estado',
        'user_id',
        'cliente_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }


    public function DetalleCotizaciones(){
        return $this->hasMany(DetalleCotizaciones::class);
    }
}
