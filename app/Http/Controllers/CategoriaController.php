<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$cats = Categoria::where('parent',0)->get();
			// foreach ($cats as $cat) {
			// 	$cat->sub = Categoria::where('parent',$cat->id)->count();
			// 	$cat->prods = Producto::where('categoria',$cat->id)->count();
			// }
			return view('admin.categorias.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$cat = new Categoria;

			$slug = $request->nombre ;

			$cat->nombre = $request->nombre;
			$cat->slug = Str::slug($slug);
			$cat->save();

			\Toastr::success('Guardado');
			return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($categoria)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
			if (empty($request->categoria)) {
				\Toastr::error('No se encontro la categoria, intente mas tarde');
				return redirect()->back();
			}

			$cat = Categoria::find($request->categoria);

			if (Producto::where('categoria',$cat->id)->count()) {
				\Toastr::error('No se puede eliminar una categoria con productos');
				return redirect()->back();
			}

			$cat->delete();

			\Toastr::success('Eliminado exitosamente');
			return redirect()->back();
    }
}
