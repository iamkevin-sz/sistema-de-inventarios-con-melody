<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = [
        // 'code',         //el codigo se generara en el controlador
        'nombre',
        'stock',
        'imagen',
        'precio_venta',
        'estado',
        'categoria_id',
        'proveedor_id',
    ];
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id'); //pertenece a una categoria
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'id');//pertenece a una proveedor
    }

    public function detallecompras(){
        return $this->hasMany(DetalleCompras::class); //una proveedor da muchos productos
    }
}


