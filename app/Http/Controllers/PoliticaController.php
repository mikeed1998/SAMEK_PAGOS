<?php

namespace App\Http\Controllers;

use App\Politica;
use Illuminate\Http\Request;

class PoliticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
			$politicas = Politica::all();
			return view('configs.politicas.index',compact('politicas'));
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
     * @param  \App\Politica  $politica
     * @return \Illuminate\Http\Response
     */
    public function show(Politica $politica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Politica  $politica
     * @return \Illuminate\Http\Response
     */
    public function edit(Politica $politica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Politica  $politica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
			$politica = Politica::find($id);

			$politica->descripcion = $request->descripcion;
			$politica->save();

			\Toastr::success('Guardado');
			return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Politica  $politica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Politica $politica)
    {
        //
    }
}
