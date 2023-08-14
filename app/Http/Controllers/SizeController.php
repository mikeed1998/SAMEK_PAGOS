<?php

namespace App\Http\Controllers;

use App\Size;
use App\CategTamano;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($size){
			$categ = CategTamano::where('slug',$size)->first();
			if (empty($categ->slug)) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back();
			}
			$sizes = Size::where('catSize',$categ->id)->orderBy('orden','asc')->get();
			if (empty($sizes)) {
				\Toastr::error('Error, al cargar los tamaños');
				return redirect()->back();
			}
			return view('configs.sizes.index',compact('categ','sizes'));

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
			if (empty($request->tamano)) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back();
			}
			$size = new Size;

			$size->size = $request->tamano;
			$size->catSize = $request->cat;
			$size->save();

			\Toastr::success('Guardado Exitosamente');
			return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show($size)
    {
			return $size;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
			if (empty($request->size)) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back();
			}

			$size = Size::find($request->size);

			if (!empty($size)) {
				// NOTE: eliminar productos relacionados al size

				$size->delete();
				\Toastr::success('Eliminado Exitosamente');
				return redirect()->back();
			}
    }
}
