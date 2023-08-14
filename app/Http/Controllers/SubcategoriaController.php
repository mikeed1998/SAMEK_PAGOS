<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SSubCategoria;

class SubcategoriaController extends Controller
{
    public function getSubcategorias($categoriaId)
    {
        $subcategorias = SSubCategoria::where('categoria_id', $categoriaId)->get();
        return response()->json($subcategorias);
    }
}
