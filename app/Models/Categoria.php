<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function productos(){
        return $this->hasMany(Producto::class); //una categoria tiene muchos productos
    }

    // 1 categoria tiene muchos productos
    // 1 producto tiene muchas categorias, un producto no puede tener mchoas productos por eso es de uno a muchos
}
