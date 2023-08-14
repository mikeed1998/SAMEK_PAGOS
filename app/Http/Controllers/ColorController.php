<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ColorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$colors = Color::orderBy('orden', 'asc')->get();
			return view('configs.colors.index',compact('colors'));
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
		$color = new Color;

		$color->name = $request->name;

		if (!$request->texturaBool) {
			$color->hexa = $request->hexa;

		} else {
			if ($request->hasFile('textura')) {

				$file = $request->file('textura');
				$extension = $file->getClientOriginalExtension();
				$namef = Str::random(30).'.'.$extension;

				\Storage::disk('local')->put("/img/photos/others/".$namef , \File::get($file));

				// $path = $request->textura->store('img/photos/others/');
				$color->textura = $namef;
				// $path = $request->file('textura')->store('img/photos/others');
				// echo $namef;
			}
		}

		$color->save();
		\Toastr::success('Guardado');
		return redirect()->back();
		// return $path;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Color  $color
	 * @return \Illuminate\Http\Response
	 */
	public function show(Color $color)
	{
		 //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Color  $color
	 * @return \Illuminate\Http\Response
	 */
	public function edit($color)
	{
		$color = Color::find($color);
		return view('configs.colors.edit',compact('color'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Color  $color
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$color = Color::find($id);

		if (empty($color)) {
			\Toastr::error('Error al editar el color o textura');
			return redirect()->back();
		}

		$color->name = $request->name;

		if (!$request->texturaBool) {

			$color->hexa = $request->hexa;

		} else {

			if ($request->hasFile('textura')) {
				$oldTexture = $color->textura;

				$file = $request->file('textura');
				$extension = $file->getClientOriginalExtension();
				$namef = Str::random(30).'.'.$extension;

				\Storage::disk('local')->put("/img/photos/others/".$namef , \File::get($file));

				\Storage::disk('local')->delete("/img/photos/others/".$oldTexture);

				$color->textura = $namef;
			}
		}

		$color->save();

		\Toastr::success('Guardado Exitosamente');
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Color  $color
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request)
	{
		if (empty($request->color)) {
			\Toastr::error('Error, intentalo mas tarde');
			return redirect()->back();
		}

		$color = Color::find($request->color);

		if (!empty($color)) {
			$color->delete();
			\Toastr::success('Eliminado Exitosamente');
			return redirect()->back();
			// return $color;
		}
	}
}
