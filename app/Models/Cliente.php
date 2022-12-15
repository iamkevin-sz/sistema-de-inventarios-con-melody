<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ci',
        // 'ruc',
        'direccion',
        'telefono',
        'correo',
    ];

    public function ventas(){
        return $this->hasMany(Ventas::class);
    }

    public function cotizaciones(){
        return $this->hasMany(Cotizaciones::class);
    }
}
