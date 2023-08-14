<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SProducto extends Model
{
    protected $fillable = [
	  	'categoria',  
        'subcategoria',
        'nombre',
        'precio',
        'cantidad',
        'descripcion',
        'imagen',
        'inicio',
	];
}
