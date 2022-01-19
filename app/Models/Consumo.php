<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'kilometros',
        'litros',
        'coste_litro',
        'origen',
        'destino',
        'carburante',
        'id_vehiculo',
    ];
}
