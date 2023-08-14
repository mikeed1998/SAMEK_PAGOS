<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cupon extends Model
{
	use SoftDeletes;
	protected $fillable = [
			'codigo','description','porcentaje','cantidad','vigencia','usos','activo','orden'
	];

}
