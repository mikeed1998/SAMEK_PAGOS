<?php

namespace App\Http\Controllers;

use App\CategTamano;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategTamanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
			$cats = CategTamano::orderBy('orden','asc')->get();
			return view('configs.sizes.cats',compact('cats'));
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
			if (empty($request->talla)) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back();
			}
			$size = new CategTamano;

			$size->sizeName = $request->talla;
			$size->slug = Str::slug($request->talla , '-');
			$size->save();

			\Toastr::success('Guardado Exitosamente');
			return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategTamano  $categTamano
     * @return \Illuminate\Http\Response
     */
    public function show(CategTamano $categTamano)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategTamano  $categTamano
     * @return \Illuminate\Http\Response
     */
    public function edit(CategTamano $categTamano)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategTamano  $categTamano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategTamano $categTamano)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategTamano  $categTamano
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
			if (empty($request->size)) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back();
			}

			$tam = CategTamano::find($request->size);

			if (!empty($tam)) {
				// NOTE: eliminar productos de los tamanos relacionados
				$tamanos = $tam->tallas()->get();
				foreach ($tamanos as $t) {
					$t->delete();
				}
				
				$tam->delete();
				\Toastr::success('Eliminado Exitosamente');
				return redirect()->back();
			}
    }
}
