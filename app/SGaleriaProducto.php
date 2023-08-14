<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SGaleriaProducto extends Model
{
    protected $fillable = [
		    'producto',
        'imagen',
	];
}
