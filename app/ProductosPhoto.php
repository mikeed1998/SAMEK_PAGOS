<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosPhoto extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'producto','titulo','image','orden',
	];

	public function producto() {
		return $this->belongsTo('App\Producto');
	}
}
