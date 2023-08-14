<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoVariante extends Model
{
	protected $fillable = [
		'sku','modelo','descripcion','precio','descuento','producto','stock','tipo_envio','peso','largo','ancho','alto','llave','activo','orden',
	];

	public function producto_ori(){
		return $this->belongsTo('App\Producto','id');
	}
}
