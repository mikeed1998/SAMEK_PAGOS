<?php

namespace App\Http\Controllers;

use Auth;
use App\Domicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DomicilioController extends Controller
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
			$validate = Validator::make($request->all(),[
				'alias' => 'required',
				'address' => 'required',
				'number' => 'required',
				'numint' => '',
				'entrecalles' => 'required',
				'colonia' => 'required',
				'municipio' => 'required',
				'cp' => 'required',
				'estado' => 'required',
			],[],[
				'alias' => 'nombre',
				'address' => 'dirección',
				'number' => 'numero exterior',
				'numint' => 'numero interior',
				'entrecalles' => 'entre calles',
			]);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back()->withErrors($validate);
			}
			$userId = Auth::user()->id;
			$dirs = Domicilio::where('user',$userId)->get()->count();
			if ($dirs >= 5 ) {
				\Toastr::info('Solo se pueden almacenar 5 domicilios');
				return redirect()->back();
			}

			$estado = DB::table('estados')->where('code_2_digits',$request->estado)->get()->first();

			$direccion = new Domicilio;

			$direccion->alias = $request->alias;
			$direccion->calle = $request->address;
			$direccion->numext = $request->number;
			$direccion->numint = $request->numint;
			$direccion->entrecalles = $request->entrecalles;
			$direccion->colonia = $request->colonia;
			$direccion->cp = $request->cp;
			$direccion->municipio = $request->municipio;
			$direccion->estado = $estado->name;
			$direccion->estado_code = $estado->code_2_digits;
			$direccion->user = $userId;

			$direccion->save();

			if ($request->ajax()) {
				$resp = collect([
					'resp' => true,
					'msg' => 'Guardado'
				]);
				return  $resp;
			}

			\Toastr::success('Guardado');
			return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function show(Domicilio $domicilio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function edit(Domicilio $domicilio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domicilio $domicilio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
			if (empty($request->domicilio)) {
				\Toastr::error('Error, intentalo mas tarde');
				return redirect()->back();
			}

			$domicilio = Domicilio::find($request->domicilio);

			if (!empty($domicilio)) {

				$domicilio->delete();
				\Toastr::success('Eliminado Exitosamente');
				return redirect()->back();

			}
    }
}
