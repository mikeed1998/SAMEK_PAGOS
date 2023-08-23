<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\Elemento;
use App\AuxProducto;
use App\SCategoria;
use App\SSubCategoria;
use App\SSliderPrincipal;
use App\SSoluciones;
use App\SCliente;
use App\SProducto;
use App\SGaleriaProducto;
use App\SOrder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
			$seccion = Seccion::all();
            
			foreach ($seccion as $sec) {
				$sec->elements = $sec->elementos()->count();
			}
 
          
			return view('configs.secciones.index',compact('seccion'));
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
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show($seccion) {
        $elements = Elemento::all();
        $slider_principal = SSliderPrincipal::all();
        $categorias = SCategoria::all();
        $subcategorias = SSubCategoria::all();
        $productos = SProducto::all();
        $soluciones = SSoluciones::all();
        $clientes = SCliente::all();
        $galeria_producto = SGaleriaProducto::all();
        $usuarios = User::all();
        $ordenes = SOrder::all();
        
        $ruta = 'configs.secciones.'.$seccion;

        $contCat = 0;
        foreach($categorias as $cat) $contCat++; 

        $contSubC = 0;
        foreach($subcategorias as $subcat) $contSubC++; 

   
        // $productos = AuxProducto::all();

		return view($ruta, compact('elements', 'productos', 'slider_principal', 'categorias', 'subcategorias', 'productos', 'soluciones', 'clientes', 'galeria_producto', 'contCat', 'contSubC', 'usuarios', 'ordenes'));
    }


    public function imgStatic(Request $request) {
        $elem = Elemento::find($request->id_static);

        if ($request->hasFile('archivo_s')) {
            $oldFile = $elem->imagen;
            $file = $request->file('archivo_s');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img2/photos/imagenes_estaticas/".$namefile , \File::get($file));
            \Storage::disk('local')->delete("/img2/photos/imagenes_estaticas/".$oldFile);

            $elem->imagen = $namefile;
        }

        $elem->save();
        
        \Toastr::success('Guardado');
        return redirect()->back();
    }


    public function categoriaSide(Request $request) {
        $categoria = new SCategoria;

        $categoria->categoria = $request->categoria;
        $categoria->save();

        \Toastr::success('Guardado');
		return redirect()->back();
    }


    public function SubCategoriaSide(Request $request) {
        $subcategoria = new SSubCategoria;

        $subcategoria->categoria = $request->categoria_padre;
        $subcategoria->subcategoria = $request->subcategoria;
        $subcategoria->save();

        \Toastr::success('Guardado');
		return redirect()->back();
    }


    public function productoSide(Request $request) {
        $producto = new SProducto;
        
        $select_result = explode('_', $request->subcate);
        
        $subcategoria = $select_result[0];
        $categoria = $select_result[1];

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img2/photos/productos/".$namefile , \File::get($file));

            $producto->imagen = $namefile;
        }

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->categoria = $categoria;
        $producto->stock = $request->stock;
        $producto->subcategoria = $subcategoria;

        $producto->save();

        \Toastr::success('Guardado');
		return redirect()->back();
    }


    public function switchHome(Request $request, $modelo, $tipo) {
        if($tipo == "solution") {
            $solucion = SSoluciones::find($modelo);
            if($request->switch_o == 1) {
                $solucion->inicio = $request->switch_o;
                $solucion->update();
                return redirect()->back();
            } else {
                $solucion->inicio = $request->switch_o;
                $solucion->update();
                return redirect()->back();
            }   
        }

        if($tipo == "producto") {
            $producto = SProducto::find($modelo);
            if($request->switch_o == 1) {
                $producto->inicio = $request->switch_o;
                $producto->update();
                return redirect()->back();
            } else {
                $producto->inicio = $request->switch_o;
                $producto->update();
                return redirect()->back();
            }   
        }


    }


    public function imgProducto(Request $request, SProducto $producto) {
        if ($request->hasFile('imagen_nueva')) {
            $oldFile = $producto->imagen;
            $file = $request->file('imagen_nueva');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;
    
            \Storage::disk('local')->put("/img2/photos/productos/".$namefile , \File::get($file));
            \Storage::disk('local')->delete("/img2/photos/productos/".$oldFile);
    
            $producto->imagen = $namefile;

            $producto->update();

            \Toastr::success('Guardado');
            return redirect()->back();
        }
    }


    public function imgSolucion(Request $request, SSoluciones $solucion) {
        if ($request->hasFile('imagen_nueva')) {
            $oldFile = $solucion->imagen;
            $file = $request->file('imagen_nueva');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;
    
            \Storage::disk('local')->put("/img2/photos/soluciones/".$namefile , \File::get($file));
            \Storage::disk('local')->delete("/img2/photos/soluciones/".$oldFile);
    
            $solucion->imagen = $namefile;

            $solucion->update();

            \Toastr::success('Guardado');
            return redirect()->back();
        }
    }


    public function textoProducto(Request $request, SProducto $producto) {
        $producto->descripcion = $request->desc2;
        
        $producto->update();

        \Toastr::success('Actualizado');
		return redirect()->back();
    }


    public function categoriaProductoSide(Request $request, SProducto $producto) {
        $select_result = explode('_', $request->subcate2);
        
        $subcategoria = $select_result[0];
        $categoria = $select_result[1];

        $producto->categoria = $categoria;
        $producto->subcategoria = $subcategoria;

        $producto->update();

        \Toastr::success('Actualizado');
		return redirect()->back();
    }


    public function delProductoSide($producto) {

        $prod_del = SProducto::find($producto);

        $imagen = 'img2/photos/productos/'.$prod_del->imagen;
        unlink($imagen);

        $galeria = SGaleriaProducto::all();

        foreach($galeria as $gaa) {
            if($gaa->producto == $prod_del->id) {
                $fotoAux = 'img2/photos/productos/galeria/'.$gaa->imagen;
                unlink($fotoAux);
    
                $gaa->delete();
            }
        }

        $prod_del->delete();
        
        \Toastr::success('Producto eliminado');
		return redirect()->back();
    }


    public function galeriaSide(SProducto $producto) {
        $galeria = SGaleriaProducto::all();

        return view('configs.secciones.galeria', compact('producto', 'galeria'));
    }


    public function addGaleriaSide(Request $request) {
        // dd($request);
        $galeria = new SGaleriaProducto;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img2/photos/productos/galeria/".$namefile , \File::get($file));

            $galeria->producto = $request->producto;
            $galeria->imagen = $namefile;
        }

        $galeria->save();

        \Toastr::success('Guardado');
		return redirect()->back();
    }


    public function imgSider(Request $request) {
        $slider = new SSliderPrincipal;
        // dd($request->archivo);
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img2/photos/slider_principal/".$namefile , \File::get($file));

            $slider->imagen = $namefile;
        }

        $slider->save();
        \Toastr::success('Guardado');
        return redirect()->back();
    }


    public function imgSiderGaleria(Request $request) {
        $galeria = new SGaleriaProducto;
        // dd($request->archivo);
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img2/photos/productos/galeria/".$namefile , \File::get($file));

            $galeria->producto = $request->producto_padre;
            $galeria->imagen = $namefile;
        }

        $galeria->save();
        
        \Toastr::success('Guardado');
        return redirect()->back();
    }


    public function delSide(SSliderPrincipal $slider) {
        $imagen = 'img2/photos/slider_principal/'.$slider->imagen;
        unlink($imagen);

        $slider->delete();

        \Toastr::success('Slider eliminado');
        return redirect()->back();
    }


    public function clientesSide(Request $request) {
        $cliente = new SCliente;
        // dd($request->archivo);
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img2/photos/clientes/".$namefile , \File::get($file));

            $cliente->imagen = $namefile;
        }

        $cliente->save();

        \Toastr::success('Guardado');
        return redirect()->back();
    }


    public function delCliente(SCliente $cliente) {
        $imagen = 'img2/photos/clientes/'.$cliente->imagen;
        unlink($imagen);

        $cliente->delete();

        \Toastr::success('Cliente eliminado');
        return redirect()->back();
    }


    public function solucionesSide(Request $request) {
        $solucion = new SSoluciones;
        // dd($request->archivo);
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img2/photos/soluciones/".$namefile , \File::get($file));

            $solucion->titulo = $request->titulo;
            $solucion->descripcion = $request->descripcion;
            $solucion->imagen = $namefile;
        }

        $solucion->save();

        \Toastr::success('Guardado');
        return redirect()->back();
    }


    public function delSolucion(SSoluciones $solucion) {
        $imagen = 'img2/photos/soluciones/'.$solucion->imagen;
        unlink($imagen);

        $solucion->delete();

        \Toastr::success('Solución eliminada');
        return redirect()->back();
    }


    public function delGaleriaSide(SGaleriaProducto $galeria) {
        $imagen = 'img2/photos/productos/galeria/'.$galeria->imagen;
        unlink($imagen);

        $galeria->delete();

        \Toastr::success('Imágen eliminada');
		return redirect()->back();
    }

    
    public function delCategoriaSide($categoria) {
        $cat_del = SCategoria::find($categoria);
        $subcategorias_hijas = SSubCategoria::all();
        
        foreach($subcategorias_hijas as $sc) {
            if($sc->categoria == $cat_del->id) {
                $this->delSubCategoriaSide($sc->id);
            }
        }

        $cat_del->delete();

        \Toastr::success('La Categoría y sus subcategorias han sido eliminadas');
		return redirect()->back();
    }


    public function delSubCategoriaSide($subcategoria) {
        $sub_del = SSubCategoria::find($subcategoria);
        $productos = SProducto::all();

        foreach($productos as $prod) {
            if($prod->subcategoria == $sub_del->id) {
                $this->delProductoSide($prod->id);
            }
        }
        
        $sub_del->delete();

        \Toastr::success('Subcategoría eliminada');
		return redirect()->back();
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $seccion) {

		if (empty($seccion)) {
			\Toastr::error('Error, intentalo mas tarde');
			return redirect()->back();
		}

		$seccion = Seccion::find($seccion);

		$file = $request->file('portada');
		$oldFile = $seccion->portada;
		$extension = $file->getClientOriginalExtension();
		$namefile = Str::random(30) . '.' . $extension;

		\Storage::disk('local')->put("/img/photos/seccions/" . $namefile, \File::get($file));

		\Storage::disk('local')->delete("/img/photos/seccions/" . $oldFile);

		$seccion->portada = $namefile;

		$seccion->save();
		\Toastr::success('Guardado');
		return redirect()->back();
    }

    public function usersList() {
        $ordenes = SOrder::all();

        return view('configs.secciones.users', compact('usuarios', 'ordenes'));
    }

    public function usuario_detalle($usuario) {
        $usuario = User::find($usuario);

        return view('configs.secciones.usuarios', compact('usuario'));
    }

    public function lista_usuarios() {
        $usuarios = User::all();

        return view('configs.secciones.users', compact('usuarios'));
    }

    public function checkUpdate(Request $request, $order)
    {
        $order = SOrder::find($order);
        $order->entregado = $request->estado;
        $order->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $seccion)
    {
        //
    }
}
