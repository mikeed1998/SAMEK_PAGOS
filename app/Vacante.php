<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = [
        'portada','titulo','subtitulo','oferta','requisitos','vacantesdisp','salario','inicio','activo','orden',
];
}
