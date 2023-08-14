<?php

namespace App\Http\Controllers;

use App\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacantes = Vacante::orderBy('orden', 'asc')->get();
        return view('admin.vacantes.index' , compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vacantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
			'titulo' => 'required',
			'oferta' => 'required',
            'requisitos' => 'required',
            'vacantesdis' => 'required',
            'salario' => 'required',
		], [], [
            'Vacantesdis' => 'vacantes disponibles',
        ]);


		if ($validate->fails()) {
			\Toastr::error('Error, se requieren mas datos');
			return redirect()->back()->withErrors($validate);
		}

		$vacant = new Vacante;

		$vacant->titulo = $request->titulo;
		$vacant->subtitulo = $request->subtitulo;
        $vacant->oferta = $request->oferta;
        $vacant->requisitos = $request->requisitos;
        $vacant->vacantesdisp = $request->vacantesdis;
        $vacant->salario = $request->salario;
		// $product->descuento = $request->descuento;
		// $product->slug = Str::slug($request->nombre, '-');

		$vacant->save();

		\Toastr::success('Guardado');
		return redirect()->route('vacante.show', $vacant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show($vacant)
    {
        $vacantes = Vacante::find($vacant);
        if (empty($vacantes)) {
            \Toastr::error('Error al buscar, intente mas tarde');
            return redirect()->back();
        }
        $vacantes->requisitos=explode(";",$vacantes->requisitos);

        // return $product;
        return view('admin.vacantes.show', compact('vacantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit($vacante)
    {
        $vacantes = Vacante::find($vacante);

        return view('admin.vacantes.edit', compact('vacantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vacante)
    {
        $vacant = Vacante::find($vacante);

        if (empty($vacant)) {
            \Toastr::error('Error, no se encontro el producto a modificar');
            return redirect()->back();
        }
        $validate = Validator::make($request->all(), [
			'titulo' => 'required',
			'oferta' => 'required',
            'requisitos' => 'required',
            'vacantesdis' => 'required',
            'salario' => 'required',
		], [], [
            'Vacantesdis' => 'vacantes disponibles',
        ]);


		if ($validate->fails()) {
			\Toastr::error('Error, se requieren mas datos');
			return redirect()->back()->withErrors($validate);
		}

		$vacant->titulo = $request->titulo;
		$vacant->subtitulo = $request->subtitulo;
        $vacant->oferta = $request->oferta;
        $vacant->requisitos = $request->requisitos;
        $vacant->vacantesdisp = $request->vacantesdis;
        $vacant->salario = $request->salario;
		// $product->descuento = $request->descuento;
		// $product->slug = Str::slug($request->nombre, '-');

		$vacant->save();

		\Toastr::success('Guardado');
		return redirect()->route('vacante.show', $vacant->id);
    }

    public function updateimg(Request $request, $vacante) {
  		$vacant = Vacante::find($vacante);

      if ($request->hasFile('portada') || $request->hasFile('medidas')) {
        $field = $request->type;
  			$file = $request->file($field);
  			$extension = $file->getClientOriginalExtension();
  			$namefile = Str::random(30) . '.' . $extension;

  			\Storage::disk('local')->put("/img/photos/vacantes/" . $namefile, \File::get($file));

  			if (!empty($vacant->$field)) {
  				\Storage::disk('local')->delete("/img/photos/vacantes/" . $vacant->$field);
  			}

  			$vacant->$field = $namefile;
  		}

  		$vacant->save();

  		\Toastr::success('Guardado');
  		return redirect()->route('vacante.show', $vacant->id);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
			if (empty($request->producto)) {
				\Toastr::error('Error, intentalo mas tarde');
				return redirect()->back();
			}

			$vacantes = Vacante::find($request->producto);

			if (!empty($vacantes)) {

				if (!empty($vacantes->portada)) {
					\Storage::disk('local')->delete("/img/photos/vacantes/" . $vacantes->portada);
				}
				$vacantes->delete();
				\Toastr::success('Eliminado Exitosamente');
				return redirect()->back();

			}
    }
}
