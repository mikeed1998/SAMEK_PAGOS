<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaDetalle extends Model
{
    protected $fillable = [
        'id_categoria ','nombre','descripcion','subtitulo','sub_descripcion',
];
}
