<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuxProducto extends Model
{
    protected $fillable = [
        'categoria',
        'subcategoria',
        'nombre',
    ];
}
