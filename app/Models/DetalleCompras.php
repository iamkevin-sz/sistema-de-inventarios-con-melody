<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompras extends Model
{
    use HasFactory;

    protected $fillable = [

        'compras_id',
        'producto_id',
        'cantidad',
        'precio',
    ];


    public function compras(){
        return $this->belongsTo(Compras::class, 'compras_id', 'id');//pertenece a una proveedor
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id', 'id');//pertenece a un producto
    }
}
