<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FuncGenController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function editajax(Request $request){
			if (empty($request->tabla)) {
				return false;
			}

			$nameSpace = '\\App\\';
			$model = $nameSpace . ucfirst($request->tabla);

			$field = $request->campo;
			$val = $request->valor;
			// $model = $model::find($request->id);
			// $model->$field = $request->valor;
			// $model->save();

			// $model::find($request->id)->update(["$field" => "$val"]);
			if ($model::find($request->id)->update(["$field" => "$val"])) {
				return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
			}else {
				// code...
				return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
			}
			// return $request->valor;
		}
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function orderajax(Request $request){
			if (empty($request->table)) {
				return response()->json(['success'=>false, 'mensaje'=>'Error al ordenar', 'x' => $request->all()]);
			}

			$nameSpace = '\\App\\';
			$model = $nameSpace . ucfirst($request->table);

			for ($i=0; $i < count($request->orden); $i++) {
				$id = $request->orden[$i];
				$color = $model::find($id);
				$color->orden = $i;
				$color->save();
			}
			return response()->json(['success'=>true, 'mensaje'=>'Ordenado Exitosamente']);
			// return true;
		}

		public function toggleajax(Request $request){
			if (empty($request->tabla)) {
				return false;
			}

			$nameSpace = '\\App\\';
			$model = $nameSpace . ucfirst($request->tabla);

			$field = $request->campo;
			$val = $request->valor;

			if ($model::find($request->id)->update(["$field" => "$val"])) {
				return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
			}else {
				return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
			}
		}
}
