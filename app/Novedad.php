<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{

		protected $fillable = [
				'titulo','portada','descripcion','pdfname','pdf','inicio','activo','orden'
		];


}
