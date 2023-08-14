<?php

namespace App\Http\Controllers;

use App\ProductoRelacion;
use App\Producto;
use Illuminate\Http\Request;

class ProductoRelacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request){

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductoRelacion  $productoRelacion
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoRelacion $productoRelacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductoRelacion  $productoRelacion
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductoRelacion $productoRelacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductoRelacion  $productoRelacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto){

			//  el request esta vacio
			// if (empty($request->relacion)) {
			// 	\Toastr::error('Error al actualizar, intente mas tarde');
			// 	return redirect()->back();
			// }

			$prod = Producto::find($producto);
			// el producto no existe
			if (empty($prod)) {
				\Toastr::error('Error al buscar el producto, intente mas tarde');
				return redirect()->back();
			}

			$prodrel = ProductoRelacion::where('producto',$producto);

			if (!empty($request->relacion)) {
				$prodrel->whereNotIn('otroProducto', $request->relacion)->delete();
			} else {
				$prodrel->delete();
			}


			$prods = ProductoRelacion::where('producto',$prod->id)->get();

			if (!empty($request->relacion)) {
				foreach ($request->relacion as $rel) {
					ProductoRelacion::updateOrCreate(
						['producto' => $producto, 'otroProducto' => $rel],
						['producto' => $producto, 'otroProducto' => $rel]
						)->save();
					}
			}

			\Toastr::success('Guardado');
			return redirect()->back();
			// return $prodrel->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductoRelacion  $productoRelacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoRelacion $productoRelacion)
    {
        //
    }
}
