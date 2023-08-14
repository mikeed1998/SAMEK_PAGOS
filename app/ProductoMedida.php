<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoMedida extends Model {
  public $timestamps = false;
  
  protected $fillable = [
    'nombre','mx','my','mz','precio','producto','activo','orden',
	];

	public function producto(){
		return $this->belongsTo('App\Producto','id');
	}
}
