<?php

namespace App\Http\Controllers;

use App\ProductoMedida;
use Illuminate\Http\Request;

class ProductoMedidaController extends Controller
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
    public function store(Request $request) {
      if (empty($request->producto)) {
  			\Toastr::error('Error, se requieren mas datos');
  			return redirect()->back();
  		}

      $med = new ProductoMedida;
      $med->producto = $request->producto;
      $med->save();

      \Toastr::success('Creado Exitosamente');
  		return redirect()->route('productos.show', $request->producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductoMedida  $productoMedida
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoMedida $productoMedida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductoMedida  $productoMedida
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductoMedida $productoMedida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductoMedida  $productoMedida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductoMedida $productoMedida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductoMedida  $productoMedida
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoMedida $id) {
      if (empty($id)) {
  			\Toastr::error('Error al eliminar, intente mas tarde');
  			return redirect()->back();
  		}

      $id->delete();

      \Toastr::success('Eliminado Exitosamente');
      return redirect()->back();
    }
}
