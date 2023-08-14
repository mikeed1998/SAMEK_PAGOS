<?php

namespace App\Http\Controllers;

use App\Cupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
			$cupons = Cupon::all();
			return view('configs.cupons.index',compact('cupons'));
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
					'codigo' => 'required',
					'vigencia' => 'required|date',
					'porcentaje' => 'required|numeric',
				],[],[])->validate();

			$cupon = new Cupon;

			$cupon->codigo = strtoupper(Str::slug($request->codigo));
			$cupon->description = $request->description;
			$cupon->porcentaje = $request->porcentaje;
			$cupon->vigencia = $request->vigencia;
			$cupon->save();

			\Toastr::success('Guardado');
			return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function show(Cupon $cupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupon $cupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupon $cupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
			if (empty($request->cuppon)) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back();
			}

			$cup = Cupon::find($request->cuppon);
			$cup->delete();
			\Toastr::success('Eliminado Exitosamente');
			return redirect()->back();
    }
}
