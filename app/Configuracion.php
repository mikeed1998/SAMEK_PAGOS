<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'description',
		'prodspag',
		'sliderhmin',
		'sliderhmax',
		'sliderproporcion',
		'slideranim',
		'slidertextos',
		'paypalemail',
		'stripe_pk',
		'stripe_sk',
		'destinatario',
		'destinatario2',
		'remitente',
		'remitentepass',
		'remitentehost',
		'remitenteport',
		'remitenteseguridad',
		'telefono',
		'whatsapp',
		'whatsapp2',
		'facebook',
		'instagram',
		'youtube',
		'linkedin',
		'envio',
		'envioglobal',
		'iva',
		'incremento',
		'banco',
		'mapa',
		'direccion',

	];
}
