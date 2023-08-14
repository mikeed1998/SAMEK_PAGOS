<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model {

	public $timestamps = false;

	protected $fillable = [
		'elemento','texto','imagen','url','activo','orden','seccion',
	];

	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [
		'activo','orden',
	];

	public function seccion(){
		return $this->belongsTo('App\Seccion','seccion');
	}
}
