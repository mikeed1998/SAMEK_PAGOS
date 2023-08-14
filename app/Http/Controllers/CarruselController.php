<?php

namespace App\Http\Controllers;

use App\Carrusel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CarruselController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

			$sliders = Carrusel::orderBy('orden','asc')->get();
			foreach ($sliders as $sli) {
				if ($sli->video) {
					if (Str::contains($sli->video, 'v=')) {
						$pos=strpos($sli->video, 'v');
						$videoPhoto=substr($sli->video, ($pos+2));
					}

					if (Str::contains($sli->video, 'youtu.be')) {
						$pos=strrpos($sli->video, '/');
						$videoPhoto=substr($sli->video, ($pos+1));
					}

					$sli->video = [
						'url' => $sli->video,
						'idVideo' => $videoPhoto
					];
				}
			}
			return view('configs.sliders.index',compact('sliders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(){

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request){
			$slider = new Carrusel;

			if ($request->hasFile('slider')) {
				$file = $request->file('slider');
				$extension = $file->getClientOriginalExtension();
				$namefile = Str::random(30).'.'.$extension;

				\Storage::disk('local')->put("/img/photos/sliders/".$namefile , \File::get($file));

				$slider->image = $namefile;
			}

			if ($request->video) {
				$slider->video = $request->video;
			}

			$slider->save();
			\Toastr::success('Guardado');
			return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Carrusel  $carrusel
	 * @return \Illuminate\Http\Response
	 */
	public function show(Carrusel $carrusel)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Carrusel  $carrusel
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Carrusel $carrusel)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Carrusel  $carrusel
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Carrusel $carrusel)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Carrusel  $carrusel
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request){

		if (empty($request->slide)) {
			\Toastr::error('Error, intentalo mas tarde');
			return redirect()->back();
		}
		$slider = Carrusel::find($request->slide);

		if (!empty($slider)) {
			if (!empty($slider->image)) {
				\Storage::disk('local')->delete("/img/photos/sliders/".$slider->image);
			}

			$slider->delete();
			\Toastr::success('Eliminado Exitosamente');
			return redirect()->back();
			// return $color;
		}
	}
}
