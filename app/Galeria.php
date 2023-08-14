<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model {

	public $timestamps = false;

	protected $fillable = [
		'nombre','descripcion','visible','orden',
	];

	protected $hidden = [
		'visible','orden',
	];

	public function fotos(){
		return $this->hasMany('App\GaleriaPhoto','seccion');
	}
}
