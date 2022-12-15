<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ciudad',
        'nit',
        'correo',
        'direccion',
        'telefono',
    ];

    public function producto(){
        return $this->hasMany(Producto::Class); //una proveedor da muchos productos
    }

    public function compras(){
        return $this->hasMany(Compras::class); //una proveedor da muchos productos
    }
}
