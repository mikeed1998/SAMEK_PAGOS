<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $marcas = Marca::orderBy('orden','asc')->get();
        
        return view('admin.marcas.index',compact('marcas'));
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
        $marca = new Marca;

        if ($request->hasFile('marca')) {
            $file = $request->file('marca');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img/photos/marcas/".$namefile , \File::get($file));

            $marca->imagen = $namefile;
        }else{
            if (Str::contains($request->video, 'v=')) {
                    $pos=strpos($request->video, 'v');
                    $id_video=substr($request->video, ($pos+2));
                }

                if (Str::contains($request->video, 'youtu.be')) {
                    $pos=strrpos($request->video, '/');
                    $id_video=substr($request->video, ($pos+1));
                }
            $marca->llave = $id_video;
            $marca->video = $request->video;
            $marca->url = $request->video;
        }

        $marca->save();
        \Toastr::success('Guardado');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){

        if (empty($request->slide)) {
            \Toastr::error('Error, intentalo mas tarde');
            return redirect()->back();
        }
        $slider = Marca::find($request->slide);

        if (!empty($slider)) {
            if (!empty($slider->image)) {
                \Storage::disk('local')->delete("/img/photos/marcas/".$slider->image);
            }

            $slider->delete();
            \Toastr::success('Eliminado Exitosamente');
            return redirect()->back();
            // return $color;
        }
    }
}
