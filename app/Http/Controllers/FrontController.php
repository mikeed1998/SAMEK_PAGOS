<?php

namespace App\Http\Controllers;

use App\User;
use App\Seccion;
use App\ProductosPhoto;
use App\Elemento;
use App\Carrusel;
use App\Politica;
use App\Vacante;
use App\Faq;
use App\Categoria;
use App\Configuracion;
use App\Producto;
use App\AuxProducto;
use App\SCategoria;
use App\SSubCategoria;
use App\SSliderPrincipal;
use App\SSoluciones;
use App\SCliente;
use App\SProducto;
use App\SGaleriaProducto;
use App\Carrito;
use Carbon\Carbon;
use Session;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Brian2694\Toastr\Facades\Toastr;

class FrontController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		$data = Configuracion::first();
		$elements = Elemento::all();
        $slider_principal = SSliderPrincipal::all();
        $categorias = SCategoria::all();
        $subcategorias = SSubCategoria::all();
        $productos = SProducto::all();
        $soluciones = SSoluciones::all();
        $clientes = SCliente::all();
        $galeria_producto = SGaleriaProducto::all();

		$contCat = 0;
        foreach($categorias as $cat) $contCat++; 

        $contSubC = 0;
        foreach($subcategorias as $subcat) $contSubC++; 

		$contSol = 0;
		foreach($soluciones as $solu) $contSol++;

		$contCli = 0;
		foreach($clientes as $cliee) $contCli++;

		return view('front.index', compact('data', 'elements', 'productos', 'slider_principal', 'categorias', 'subcategorias', 'productos', 'soluciones', 'clientes', 'galeria_producto', 'contCat', 'contSubC', 'contSol', 'contCli'));
	}


	public function tienda() {
		$data = Configuracion::first();
		$elements = Elemento::all();
		$categorias = SCategoria::all();
		$subcategorias = SSubCategoria::all();
		$productos = SProducto::all();

		$contCat = 0;
        foreach($categorias as $cat) $contCat++; 

        $contSubC = 0;
        foreach($subcategorias as $subcat) $contSubC++; 

		$contProd = 0;
		foreach($productos as $prod) $contProd++;

		return view('front.tienda', compact('data', 'productos', 'categorias', 'subcategorias', 'contCat', 'contSubC', 'contProd'));
	}


	public function tienda_detalle(SProducto $producto) {
		$data = Configuracion::first();
		$elements = Elemento::all();
		$productos = SProducto::all();
		$galeria = SGaleriaProducto::where('producto', $producto->id)->get();

		return view('front.tienda_detalle', compact('data', 'elements', 'producto', 'productos', 'galeria'));
	}


	public function soluciones(){
		$data = Configuracion::first();
		$elements = Elemento::all();
		$soluciones = SSoluciones::all();

		return view('front.soluciones', compact('data', 'elements', 'soluciones'));
	}


	public function aboutus(){
		$data = Configuracion::first();
		$elements = Elemento::all();
		$clientes = SCliente::all();

		$contCli = 0;
		foreach($clientes as $cliee) $contCli++;

		return view('front.aboutus', compact('data', 'elements', 'clientes', 'contCli'));
	}


	public function contacto(){
		$data = Configuracion::first();
		$elements = Elemento::all();

		return view('front.contacto', compact('data', 'elements'));
	}

	public function admin() {
		$data = Configuracion::first();
		return view('front.admin_fake', compact('data'));
	}

	public function adminp(Request $request) {
		$data = Configuracion::first();

		if($request->email == "admin@wozial.com") {
			if($request->password == "wozial") {
				return redirect()->route('config.index');
			}
		}

		return view('front.admin_fake', compact('data'));
	}


	// public function servicios(Producto $serv){
		
	// 	if($serv->id == null){
	// 		return redirect()->back();
	// 	}
	// 	$seccion = Seccion::find(2);
	// 	$elements = Elemento::where('seccion', $seccion->id)->get();

	// 	$fianzas = Producto::where('activo',1)->where('categoria',1)->get(['id','nombre']);
	// 	$seguros = Producto::where('activo',1)->where('categoria',2)->get(['id','nombre']);
	// 	$servicios = array(
	// 		'fianzas' => $fianzas,
	// 		'seguros' => $seguros,
	// 	);

	// 	$productos_rel = $serv->relacionados()->get()->pluck('otroProducto');

	// 	$productos_rel = Producto::whereIn('id', $productos_rel)->get();

		
	// 	foreach ($productos_rel as $prodimg) {
	// 		$fphoto = ProductosPhoto::where('producto',$prodimg->id)->orderBy('orden','ASC')->get()->first();
	// 		$prodimg->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
	// 	}

	// 	$photo_product = ProductosPhoto::where('producto',$serv->id)->orderBy('orden','ASC')->get();

	// 	// if(!empty($productos_rel->count())){
	// 	// 	dd("viene con datos");
	// 	// }else{
	// 	// 	dd("No viene");
	// 	// }
	// 	// echo($productos_rel);
	// 	// dd($productos_rel);

	// 	$config = Configuracion::first();
		
	// 	return view('front.servicios',compact('elements','servicios','serv','productos_rel','photo_product','config'));
	// }

	// public function getServicio(Request $request){
	// 	$producto = Producto::find($request->service);
	// 	return response()->json($producto,200);
	// }

	

	// public function details(Producto $product){
	// 	// $product = Producto::find($producto);

	// 	$product->categoria = Categoria::find($product->categoria);

	// 	$product->gallery = $product->fotos()->orderBy('orden', 'asc')->get();

	// 	// $variantes = ProductoVariante::where('producto', $product->id)->get();
	// 	$medidas = ProductoMedida::where('producto',$product->id)->orderBy('orden', 'asc')->get();
	// 	// return view('front.detalles', compact('product','variantes','productos_rel','elements'));
	// 	$data = array(
	// 		'product' => $product,
	// 		'medidas' => $medidas,
	// 	);
	// 	return response()->json($data);
	// 	// return $product;
	// }

	
	public function vacantes(){
		$seccion = Seccion::find(4);
		$elements = Elemento::where('seccion', $seccion->id)->get();
		$vacantes = Vacante ::where('activo',1)->get();

		//$vacantes->requisitos=explode(";",$vacantes->requisitos);
		//dd($vacantes[]->requisitos=explode(";",$vacantes[]->requisitos));
		return view('front.vacantes',compact('elements','vacantes'));
		// return view('front.aboutus');
	}

	public function aviso_privacidad() {
		$data = Configuracion::first();
		$aviso_privacidad = Politica::find(1);
		$terminos = Politica::find(4);
		
		return view('front.aviso', compact('data', 'aviso_privacidad', 'terminos'));
	}


	public function metodos_pago() {
		$data = Configuracion::first();
		$metodos_pago = Politica::find(2);
		$devoluciones = Politica::find(3);
		$garantias = Politica::find(5);

		return view('front.metodo_pago', compact('data', 'metodos_pago', 'devoluciones', 'garantias'));
	}
	
	public function garantias(){
		$politica = Politica::find(5);
		return view('front.politicas',compact("politica"));
	}

	public function aviso(){
		$politica = Politica::find(1);
		return view('front.politicas',compact("politica"));
	}

	public function pagos(){
		$politica = Politica::find(2);
		return view('front.politicas',compact("politica"));
	}

	public function devoluciones(){
		$politica = Politica::find(3);
		return view('front.politicas',compact("politica"));
	}

	public function tyc(){
		$politica = Politica::find(4);
		return view('front.politicas',compact("politica"));
	}

	public function preguntas(){
		$data = Configuracion::first();
		$preguntas = Faq::all();
		return view('front.faq',compact('data', "preguntas"));
	}

	public function datosPerfil(Request $request, $user) {

		$user_ = User::find($user);

		$user_->name = $request->nombre_;
		$user_->lastname = $request->apellidos_;
		$user_->telefono = $request->telefono_;
		$user_->username = $request->usuario_;
		$user_->address = $request->direccion_;
		$user_->colonia = $request->colonia_;
		$user_->codigo_postal = $request->codigop_;
		$user_->estado = $request->estado_;
		$user_->municipio = $request->municipio_;

		$user_->update();

		return redirect()->route('user.profile');
	}


	// correo de contacto normal
	public function mailcontact(Request $request){
		// dd($request);
		
		$validate = Validator::make($request->all(),[
			'nombre' => 'required',
			'telefono' => 'required',
			'correo' => 'required',
			'asunto' => 'required',
			'tipo' => 'required',
			'mensaje' => 'nullable',
		],[],[]);

		if ($validate->fails()) {
			\Toastr::error('Error, se requieren todos los datos');
			return redirect()->back();
		}

		$data = array(
			'nombre' => $request->nombre,
			'telefono' => $request->telefono,
			'correo' => $request->correo,
			'asunto' => $request->asunto,
			'tipo' => $request->tipo,
			'mensaje' => $request->mensaje,
			'hoy' => Carbon::now()->format('d-m-Y')
		);

		$html = view('front.mailcontact',compact('data'));

		$config = Configuracion::first();

		$mail = new PHPMailer;

		try {
			$mail->isSMTP();
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
			// $mail->SMTPDebug = 2;
			$mail->Host = $config->remitentehost;
			$mail->SMTPAuth = true;
			$mail->Username = $config->remitente;
			$mail->Password = $config->remitentepass;
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port = $config->remitenteport;
			
			$mail->SetFrom($config->remitente, 'SAMEK Formulario de contacto');
			$mail->isHTML(true);
			
			$mail->addAddress($config->destinatario,'SAMEK Contacto');
			if (!empty($config->destinatario2)) {
				$mail->AddBCC($config->destinatario2,'SAMEK Contacto');
			}
			$mail->Subject = $data['asunto'];
			$mail->msgHTML($html);
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			$mail->send();

			
			\Toastr::success('Correo enviado Exitosamente!');
				return redirect()->back();
		} catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
			echo $e->getMessage(); //Boring error messages from anything else!
		}
		

	}

	

}
