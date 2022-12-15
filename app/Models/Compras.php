<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_id',
        'user_id',
        'fecha_compra',
        'impuesto',
        'total',
        'estado',
        'foto',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'id');
    }
    public function DetalleCompras(){
        return $this->hasMany(DetalleCompras::class);
    }
}
