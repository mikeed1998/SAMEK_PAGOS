<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{

	use SoftDeletes;

	protected $fillable = [
		'uid','estatus','guia','linkguia','domicilio','factura','cantidad','importe','iva','total','envio','comprobante','cupon','usuario', 'data', 'envia_resp'
	];

	public function pedidosDetalle(){
		return $this->hasMany('App\PedidoDetalle','pedido');
	}

	public function usuario(){
		return $this->belongsTo('App\User','usuario');
	}
}
