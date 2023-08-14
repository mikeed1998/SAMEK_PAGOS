<?php

namespace App\Http\Controllers;

use App\Novedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NovedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		// $news = Novedad::all();
		$news = Novedad::orderBy('orden', 'asc')->get();
		return view('admin.novedades.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
		return view('admin.novedades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
		$validate = Validator::make($request->all(), [
			'titulo' => 'required',
			'descripcion' => 'required',
			'portada' => 'required|image',
			'pdf' => 'required',
		], [], []);

		if ($validate->fails()) {
			\Toastr::error('Error, se requieren mas datos');
			return redirect()->back()->withErrors($validate);
		}

		$novedad = new Novedad;

		$file = $request->file('pdf');
		$extension = $file->getClientOriginalExtension();
		$pdf = Str::slug($request->titulo) . '.' . $extension;
		\Storage::disk('local')->put("img/photos/novedades/" . $pdf, \File::get($file));

		$file = $request->file('portada');
		$extension = $file->getClientOriginalExtension();
		$portada = Str::random(30) . '.' . $extension;
		\Storage::disk('local')->put("img/photos/novedades/" . $portada, \File::get($file));

		$novedad->titulo = $request->titulo;
		$novedad->descripcion = $request->descripcion;
		$novedad->portada = $portada;
		$novedad->pdf = $pdf;

		$novedad->save();
		\Toastr::success('Guardado');
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Novedad  $novedad
     * @return \Illuminate\Http\Response
     */
    public function show($novedad) {
			if (empty($novedad)) {
				\Toastr::error('No se encontro información');
				return redirect()->back();
			}
			$detail = Novedad::find($novedad);

			return view('admin.novedades.show',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Novedad  $novedad
     * @return \Illuminate\Http\Response
     */
    public function edit($novedad) {
      $novedad = Novedad::find($novedad);
      return view('admin.novedades.edit',compact('novedad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Novedad  $novedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $novedad) {
      $novedad = Novedad::find($novedad);

      if (empty($novedad)) {
        \Toastr::error('Error al recuperar informacion');
    		return redirect()->back();
      }

      if ($request->hasFile('portada')) {
        $file = $request->file('portada');
        $extension = $file->getClientOriginalExtension();
        $portada = Str::random(30) . '.' . $extension;
        \Storage::disk('local')->put("img/photos/novedades/" . $portada, \File::get($file));

        if (!empty($novedad->portada)) {
          \Storage::disk('local')->delete("img/photos/novedades/".$novedad->portada);
        }

        $novedad->portada = $portada;

				$novedad->save();
				\Toastr::success('Guardado');
				return redirect()->back();
      }

      if ($request->hasFile('pdf')) {
        $file = $request->file('pdf');
        $extension = $file->getClientOriginalExtension();
        $pdf = Str::slug($request->titulo) . '.' . $extension;
        \Storage::disk('local')->put("img/photos/novedades/" . $pdf, \File::get($file));

        if (!empty($novedad->pdf)) {
          \Storage::disk('local')->delete("img/photos/novedades/".$novedad->pdf);
        }

        $novedad->pdf = $pdf;

				$novedad->save();
				\Toastr::success('Guardado');
				return redirect()->back();
      }

      $novedad->titulo = $request->titulo;
      $novedad->descripcion = $request->descripcion;

			$novedad->save();
			\Toastr::success('Guardado');
			return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Novedad  $novedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
			$novedad = Novedad::find($request->novedad);

			if (empty($novedad)) {
				\Toastr::error('Error al recuperar informacion');
				return redirect()->back();
			}

			\Storage::disk('local')->delete("img/photos/novedades/".$novedad->pdf);
			\Storage::disk('local')->delete("img/photos/novedades/".$novedad->portada);
			$novedad->delete();

			\Toastr::success('Eliminado exitosamente');
			return redirect()->back();
    }
}
