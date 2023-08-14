<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoRelacion extends Model {
	public $timestamps = false;

	protected $fillable = [
		'producto','otroProducto',
	];

	public function producto(){
		return $this->belongsTo('App\Producto');
	}
}
