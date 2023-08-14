<?php

namespace App\Http\Controllers;

use App\Producto;
use App\ProductoVariante;
use App\Categoria;
use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductoVarianteController extends Controller
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
			$validate = Validator::make($request->all(), [
				'sku' => 'unique:producto_variantes,sku',
				'modelo' => 'required',
				'producto' => 'required',
				'precio' => 'required',
			], [], []);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back()->withErrors($validate);
			}

			$variant = new ProductoVariante;

			$variant->sku = $request->sku;
			$variant->modelo = $request->modelo;
			$variant->descripcion = $request->descripcion;
			$variant->stock = $request->stock;
			$variant->precio = $request->precio;
			// $variant->descuento = 0;
			$variant->producto = $request->producto;

			$variant->save();

			\Toastr::success('Guardado');
			return redirect()->route('productos.show', $request->producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductoVariante  $productoVariante
     * @return \Illuminate\Http\Response
     */
    public function show($productoVariante) {
			$var = ProductoVariante::find($productoVariante);
			$product = Producto::find($var->producto);
			$product->categoria = Categoria::find($product->categoria);
			$product->marca = Marca::find($product->marca);

			switch ($var->tipo_envio) {
				case 'envelope':
					$var->tipo_envio = 'Sobre';
				break;
				case 'pallet':
					$var->tipo_envio = 'Tarima';
				break;
				case 'full_truck_load':
					$var->tipo_envio = 'Camión';
				break;
				default:
					$var->tipo_envio = 'Paquete';
				break;
			}

			return view('admin.variantes.show',compact('var','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductoVariante  $productoVariante
     * @return \Illuminate\Http\Response
     */
    public function edit($productoVariante) {

			$variante = ProductoVariante::find($productoVariante);

			if (empty($variante)) {
				\Toastr::error('Error, no se encontro el producto');
				return redirect()->back();
			}

			return view('admin.variantes.edit',compact('variante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductoVariante  $productoVariante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productoVariante) {
			$variant = ProductoVariante::find($productoVariante);
			$validate = Validator::make($request->all(), [
				'sku' => 'unique:producto_variantes,sku,'.$variant->id.',id',
				'modelo' => 'required',
				'precio' => 'required',
			], [], []);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back()->withErrors($validate);
			}

			if (empty($variant)) {
				\Toastr::error('Error, no se encontro el producto');
				return redirect()->back()->withErrors($validate);
			}

			$variant->sku = $request->sku;
			$variant->modelo = $request->modelo;
			$variant->descripcion = $request->descripcion;
			$variant->stock = $request->stock;
			$variant->precio = $request->precio;
			$variant->descuento = $request->descuento;
			$variant->tipo_envio = $request->tipo_envio;
			$variant->peso = $request->peso;
			$variant->largo = $request->largo;
			$variant->ancho = $request->ancho;
			$variant->alto = $request->alto;

			$variant->save();

			\Toastr::success('Guardado');
			return redirect()->route('productos.version.show', $variant->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductoVariante  $productoVariante
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoVariante $productoVariante)
    {
        //
    }
}
