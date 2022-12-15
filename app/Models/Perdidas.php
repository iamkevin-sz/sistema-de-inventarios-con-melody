<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perdidas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'total',
        'estado',
        'usuarios_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function DetallePerdidas(){
        return $this->hasMany(DetallePerdidas::class);
    }
}
