<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GaleriaPhoto extends Model {

	protected $fillable = [
		'imagen','titulo','descripcion','url','activo','orden','galeria',
	];

	protected $hidden = [
		'activo','orden',
	];

	public function seccion(){
		return $this->belongsTo('App\Seccion');
	}
}
