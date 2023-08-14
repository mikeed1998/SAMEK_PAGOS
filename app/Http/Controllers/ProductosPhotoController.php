<?php

namespace App\Http\Controllers;

use App\ProductosPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductosPhotoController extends Controller
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
    public function store(Request $request) {
        // dd($request);
		$pic = new ProductosPhoto;
		$ret = array();

        // dd($_FILES);
	    // $error = $_FILES["uploadedfile"]["error"];
		//You need to handle  both cases
		//If Any browser does not support serializing of multiple files using FormData()
		// if (!is_array($_FILES["uploadedfile"]["name"])) //single file
		// {
			$fileName = $request->file('foto');
			$extension = $fileName->getClientOriginalExtension();
			$namefile = Str::random(30) . '.' . $extension;

			\Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($fileName));

			$pic->image = $namefile;
			$pic->producto = $request->producto;

			$ret[] = $namefile;
		// } else  //Multiple files, file[]
		// {
		// 	$fileCount = count($_FILES["uploadedfile"]["name"]);
		// 	for ($i = 0; $i < $fileCount; $i++) {
		// 		$fileName = $request->file('uploadedfile');
		// 		$extension = $fileName->getClientOriginalExtension();
		// 		$namefile = Str::random(30) . '.' . $extension;

		// 		\Storage::disk('local')->put("/img/photos/productos/" . $namefile, \File::get($fileName));

		// 		$pic->image = $namefile;
		// 		$pic->producto = $request->producto;

		// 		$ret[] = $namefile;
		// 	}
		// }
		\Toastr::success('Guardado');
		$pic->save();
        return redirect()->back();
		// echo json_encode($ret);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductosPhoto  $productosPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ProductosPhoto $productosPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductosPhoto  $productosPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductosPhoto $productosPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductosPhoto  $productosPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductosPhoto $productosPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductosPhoto  $productosPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
		if (empty($request->photo)) {
			\Toastr::error('Error, intentalo mas tarde');
			return redirect()->back();
		}
		$photo = ProductosPhoto::find($request->photo);

		if (!empty($photo)) {
			if (!empty($photo->image)) {
				\Storage::disk('local')->delete("/img/photos/productos/" . $photo->image);
			}

			$photo->delete();
			\Toastr::success('Eliminado Exitosamente');
			return redirect()->back();
			// return $color;
		}
    }
}
