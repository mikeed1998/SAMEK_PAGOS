<?php

namespace App\Http\Controllers;

use Auth;
use App\Domicilio;
use App\Factura;
use App\Producto;
use App\ProductosPhoto;
use App\ProductoVariante;
use App\Configuracion;
use App\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request as GuzzeReq;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;

class CartController extends Controller
{
	public $shipping;
	public function __construct(){
		if (!session()->has('cart_id')) {
			session(['cart_id' => rand(00000,99999)]);
		}
	}
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
		 public function show(){
 			if (!session()->has('cart_id')) {
 				session(['cart_id' => rand(00000,99999)]);
 			}

 			$config = Configuracion::first();

			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
 			$userId = session('cart_id');

 			$carrito = \Cart::session($userId)->getContent();
 			$cant = \Cart::session($userId)->getTotalQuantity();
 			$subtotal = $config->envioglobal;
			//$puntos = 0;
			$iva = 0;
 			foreach ($carrito as $item) {
 				$finalPrice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
 				$importe = $finalPrice*$item->quantity;
 				$subtotal = $subtotal + $importe + ($config->envio * $item->quantity);
 				$item->finalPrice  = $finalPrice ;
 				$item->importe  = $importe ;
 				$item->subto  = $subtotal ;
				//$puntos = $puntos + ($item->attributes['puntos'] * $item->quantity);
				$iva = $iva + ($config->iva * $importe)/100;
 			}
			// $iva = ($subtotal*$config->iva)/100;
 			$total = $subtotal + $iva;

 			$cuentas = collect([
 				'cant' => $cant,
 				'subtotal' => $subtotal,
 				'iva' => $iva,
 				//'puntos' => $puntos,
 				'total' => $total,
 				'enviopp' => $config->envio,
 				'envioglo' => $config->enviogloba,
 			]);

 			return view('cart.show',compact('carrito','cuentas'));
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


		public function addcart(Request $request){

			if (!session()->has('cart_id')) {
				session(['cart_id' => rand(00000,99999)]);
			}
			if (!session()->has('cart_alert')) {
				session(['cart_alert' => '1' ]);
			}

			$producto = ProductoVariante::find($request->key);

			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
			$userId = session('cart_id');

			$promo = (!empty($producto->descuento)) ? "-$producto->descuento%" : 0 ;
			$cant = ($request->has('fastcart')) ? 1 : $request->cant ;
			$imagen = ProductosPhoto::where('producto',$producto->producto)->orderBy('orden', 'asc')->get()->first();
			$imagen = (!empty($imagen->image)) ? $imagen->image : null ;
			$prodMain = Producto::find($producto->producto);
			// $promoCondition = new CartCondition(array(
			// 	'name' => 'Descuento en producto',
			// 	'type' => 'promo',
			// 	'value' => "-$promo"
			// ));
			//
			// $ivaCondition = new CartCondition(array(
			// 	'name' => 'IVA',
			// 	'type' => 'tax',
			// 	'value' => "+$producto->iva"
			// ));

			\Cart::session($userId)->add(array(
				'id' => $producto->id,
				'name' => "$producto->modelo",
				'price' => $producto->precio,
				'quantity' => $cant,
				'attributes' => array(
					'sku' => $producto->sku,
					'image' => $imagen,
					'producto' => $prodMain,
				),
				// 'conditions' => [$promoCondition, $ivaCondition],
				'associatedModel' => $producto
			));
			// for a specific user
			// $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
			$cartTotal = \Cart::session($userId)->getTotal();
			$cartgetSubTotal = \Cart::session($userId)->getSubTotal();

			$resp = collect([
				'resp' => true,
				'msg' => 'Se agrego exitosamente',
				// 'subtotal' => $cartgetSubTotal,
				// 'total' => $cartTotal
			]);

			session(['cart-items' => \Cart::session($userId)->getTotalQuantity()]);

			// return  \Cart::getContent()->toJson();
			// return  $cartConditions;
			// return  $producto;
			return  $resp;
			// return $cartgetSubTotal;
		}

		public function emptycart(){
			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
			$userId = session('cart_id');

			// \Cart::clear();
			\Cart::session($userId)->clearCartConditions();
			\Cart::session($userId)->clear();
			session()->forget('cart_alert');
			// return  \Cart::session($userId)->getContent()->toJson();
			$resp = collect([
				'resp' => true,
				'msg' => 'Se elimino exitosamente'
			]);

			session(['cart-items' => 0]);

			return redirect()->back();
		}


		public function updatecart(Request $request){
			$userId = session('cart_id');

			\Cart::session($userId)->update($request->item, array(
				'quantity' => array(
					'relative' => false,
					'value' => $request->cant
			  ),
			));

			$resp = collect([
				'resp' => true,
				'msg' => 'Carrito actualizado'
			]);

			session(['cart-items' => \Cart::session($userId)->getTotalQuantity()]);

			return response()->json($resp);
		}

		public function removecart(Request $request){
					if (empty($request->key)) {
						\Toastr::error('Error al editar el color o textura');
						return redirect()->back();
					}
					// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
					$userId = session('cart_id');

					\Cart::session($userId)->remove($request->key);

					$resp = collect([
						'resp' => true,
						'msg' => 'Se elimino exitosamente'
					]);

					return $resp;
					// return $request;
				}

		public function getcart(){
			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
			$userId = session('cart_id');

			\Cart::session($userId);

			return  \Cart::session($userId)->getContent()->toJson();
		}

		public function confirm(){

			if (!Auth::check()){
				// $usersess = session('cart_id');
				// $request->session('cartUser-'.$usersess , \Cart::session($usersess)->getContent());
				return redirect()->route('login')->with('status', 'Debes iniciar sesion o registrarte para realizar tu pedido');
			}

			$user = Auth::user();
			$factura = Factura::where('user',$user->id)->get()->first();
			$user = User::find($user->id);
			$domicilios = Domicilio::where('user',$user->id)->get();
			$estados = DB::table('estados')->get();

			$config = Configuracion::first();

			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
			$userId = session('cart_id');

 			$carrito = \Cart::session($userId)->getContent();
 			$cant = \Cart::session($userId)->getTotalQuantity();
 			$subtotal = $config->envioglobal;
			$iva = 0;
			$packages = array();

 			foreach ($carrito as $item) {
 				$finalPrice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
 				$importe = $finalPrice*$item->quantity;
 				$subtotal = $subtotal + $importe + ($config->envio * $item->quantity);

 				$item->finalPrice  = $finalPrice ;
 				$item->importe  = $importe ;
 				$item->subto  = $subtotal ;
				$iva = $iva + ($config->iva * $importe)/100;

				$weight = ($item->associatedModel->peso < 1 ) ? round($item->associatedModel->peso, 0, PHP_ROUND_HALF_UP) : intval($item->associatedModel->peso);
				$packages[] = array(
					"content" => $item->attributes['producto']['nombre'],
					"amount" => intval($item->quantity),
					"type" => $item->associatedModel->tipo_envio,
					"dimensions" => array(
						"length" => intval($item->associatedModel->largo),
						"width" => intval($item->associatedModel->ancho),
						"height" => intval($item->associatedModel->alto)
					),
					"weight" => $weight,
					"insurance" => 0,
					"declaredValue" => 0,
					"weightUnit" => "KG",
					"lengthUnit" => "CM"
				);
 			}
			// $iva = ($subtotal*$config->iva)/100;
 			$total = $subtotal + $iva;

 			$cuentas = collect([
 				'cant' => $cant,
 				'subtotal' => $subtotal,
				'iva' => $iva,
 				'total' => $total,
 				'enviopp' => $config->envio,
 				'envioglo' => $config->envioglobal
 			]);
			session(['shipItems'=>$packages]);
			$carriersArray;
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://queries.envia.com/available-carrier/MX/0/1",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"Authorization: Bearer " . $config->envia_key
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$carriersArray = json_decode($response,true);
			$carriersArray = $carriersArray['data'];

			return view('cart.confirm',compact('carrito','cuentas','factura','user','domicilios','estados','carriersArray'));
		}

		public function sendMail(Request $request) {
			$userId = session('cart_id');

			$carrito = \Cart::session($userId)->getContent();

			$user = User::find($request->user);

			$html = view('cart.invoice',compact('carrito','user'))->render();
			$uuid = rand(0000,999999);
			PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
			$fname = '/OrSub-'.$uuid.'.pdf';
			return PDF::loadHTML($html)->setPaper('letter', 'portrait')->stream();
		}


		public function getDomicilio(Request $request) {
			$domicilio = Domicilio::find($request->domicilio);
				session(['shipAdd'=>$domicilio->id]);
				if (session('shipAdd')) {
					return response('success', 200);
				} else {
					return response('error', 308);
				}
			}

		public function getPackages(Request $request){
			$config = Configuracion::first();

			session(['shipCarrier'=>$request->carrier]);
			$dom = session('shipAdd');
			$dom = Domicilio::find($dom);
			$user = Auth::user();
			$package = session('shipItems');

			$origin = array(
				"name" => "Rodarte Mexico",
				"company" => "Rodarte Mexico",
				"email" => $config->envio_email,
				"phone" => $config->envio_telefono,
				"street" => $config->envio_calle,
				"number" => $config->envio_numero,
				"district" => $config->envio_colonia,
				"city" => $config->envio_ciudad,
				"state" => $config->envio_estado_code,
				"country" => "MX",
				"postalCode" => $config->envio_cp,
				"reference" => ""
			);

			$destination = array(
				"name" => "$user->name $user->lastname",
				"company" => "",
				"email" => $user->email,
				"phone" => $user->telefono,
				"street" => $dom->calle,
				"number" => $dom->numext,
				"district" => $dom->colonia,
				"city" => $dom->municipio,
				"state" => $dom->estado_code,
				"country" => 'MX',
				"postalCode" => $dom->cp,
				"reference" => ''
			);

			$shipment = array(
				'carrier' => $request->carrier
			);

			$datacode = json_encode(array(
				'origin' => $origin,
				'destination' => $destination,
				'packages' => $package,
				'shipment' => $shipment
			));

			$env = config('envia.env');
			$urlBase= "https://".$env.".envia.com";

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.envia.com/ship/rate/?name=string&company=string&email=string&carrier=string",
				// CURLOPT_URL => $urlBase . "/ship/rate/?name=string&company=string&email=string&carrier=string",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $datacode,
				CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json",
					"Authorization: Bearer " . $config->envia_key
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$rateResponse = json_decode($response,true);
			// $rateResponse = $rateResponse['data'];

			return $rateResponse;
			// print_r($datacode);
		}
}
