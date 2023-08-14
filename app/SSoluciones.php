<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SSoluciones extends Model
{
    protected $fillable = [
		'titulo',
        'descripcion',
        'imagen',
        'icono',
        'inicio',
	];
}
