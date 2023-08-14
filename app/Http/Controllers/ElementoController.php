<?php

namespace App\Http\Controllers;

use App\Elemento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ElementoController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Elemento  $elemento
     * @return \Illuminate\Http\Response
     */
    public function show(Elemento $elemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Elemento  $elemento
     * @return \Illuminate\Http\Response
     */
    public function edit(Elemento $elemento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Elemento  $elemento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $elem) {
		$elem = Elemento::find($elem);

		if (empty($elem)) {
			\Toastr::error('Error al buscar, intente mas tarde');
			return redirect()->back();
		}

		if (!$elem->contenido) {
			$elem->texto = $request->descripcion;
		} else {

			$file = $request->file('imagen');
			$extension = $file->getClientOriginalExtension();
			$namefile = Str::random(30) . '.' . $extension;

			\Storage::disk('local')->put("/img/photos/seccions/" . $namefile, \File::get($file));

			if (!empty($elem->imagen)) {
				\Storage::disk('local')->delete("/img/photos/seccions/" . $elem->imagen);
			}

			$elem->imagen = $namefile;
		}


		$elem->save();

		\Toastr::success('Guardado');
		return redirect()->back();
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Elemento  $elemento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Elemento $elemento)
    {
        //
    }
}
