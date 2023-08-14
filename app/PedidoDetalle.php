<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{

	protected $fillable = [
		'cantidad','precio','importe','pedido','producto'
	];

	public function pedido(){
		return $this->belongsTo('App\Pedido');
	}
	public function producto(){
		return $this->belongsTo('App\Producto');
	}
}
