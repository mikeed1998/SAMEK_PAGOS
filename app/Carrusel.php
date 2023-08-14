<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrusel extends Model
{
	public $timestamps = false;

	protected $fillable = [
			'titulo','subtitulo','image','url','video','descripcion','orden',
	];
}
