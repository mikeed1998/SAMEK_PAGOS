<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model {

	public $timestamps = false;

	protected $fillable = [
		'seccion','portada','icon','slug',
	];

	public function elementos(){
		return $this->hasMany('App\Elemento','seccion');
	}

}
