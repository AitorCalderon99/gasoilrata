<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repostaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'combustible',
        'fecha',
        'gasolinera',
        'litros',
        'precio_litro',
        'id_vehiculo',
    ];
}
