<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategTamano extends Model{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'sizeName','orden','slug',
	];

	function tallas(){
		return $this->hasMany('App\Size','catSize');
	}
}
