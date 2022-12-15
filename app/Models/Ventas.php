<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_venta',
        'impuesto',
        'total',
        'estado',
        'cliente_id',
        'user_id',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function DetalleVentas(){
        return $this->hasMany(DetalleVentas::class);
    }
}
