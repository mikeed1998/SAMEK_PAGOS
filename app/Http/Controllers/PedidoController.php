<?php

namespace App\Http\Controllers;

use Auth;
use App\Configuracion;
use App\Pedido;
use App\Producto;
use App\ProductoVariante;
use App\Domicilio;
use App\Factura;
use App\PedidoDetalle;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pedidos = Pedido::orderBy('id','desc')->get();

        foreach ($pedidos as $pedido){
            switch ($pedido->estatus) {
                case 0:
										$pedido->status = array(
											'txt' => 'Registrado',
											'class' => 'dark'
										);
                    break;

                 case 1:
										$pedido->status = array(
											'txt' => 'Pagado',
											'class' => 'info'
										);
                    break;

                case 2:
										$pedido->status = array(
											'txt' => 'Enviado',
											'class' => 'warning'
										);
                    break;

										case 3:
										$pedido->status = array(
											'txt' => 'Entregado',
											'class' => 'success'
										);
                    break;
            }

         $pedido->user = $pedido->usuario()->get();
				 // $pedido->date = $date->format('d-m-y');
				 $pedido->date = Carbon::parse($pedido->created_at)->format('d/m/y');
        }
        return view('admin.pedidos.index',compact('pedidos'));
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
			$cartId = session('cart_id');
			$carrito = \Cart::session($cartId)->getContent();
 			$cant = \Cart::session($cartId)->getTotalQuantity();
			$config = Configuracion::first();
			$subtotal = $config->envioglobal;
			$domicilio = Domicilio::find($request->domicilio);

			$user = Auth::user();

			$pedido = new Pedido;

			$pedido->uid = Str::uuid();
			$pedido->domicilio = $domicilio;
			$pedido->cantidad = $cant;
			// $pedido->envio = ($config->envio * $cant) + $config->envioglobal;
			$pedido->envio = $request->envio_price;
			$pedido->importe = $request->subtotal;
			$iva = 0;
			// $pedido->iva = ($request->subtotal*$config->iva)/100;
			$pedido->usuario = $user->id;
			$pedido->data = $carrito;
			$pedido->save();

 			foreach ($carrito as $item) {
				$pedDet = new PedidoDetalle;
 				$finalPrice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
 				$importe = $finalPrice*$item->quantity;
 				$subtotal = $subtotal + $importe + ($config->envio * $item->quantity);
				$iva = $iva + ($config->iva * $importe)/100;

				$producto = ProductoVariante::find($item->id);

				$pedDet->cantidad = $item->quantity;
				$pedDet->precio = $finalPrice;
				$pedDet->importe = $importe;
				$pedDet->total = $importe + $iva;
				$pedDet->pedido = $pedido->id;
				$pedDet->producto = $producto->id;
				$pedDet->log = $item;
				$pedDet->save();
 			}

			$pedido->iva = $iva;
			$pedido->total = $request->subtotal + $iva + $pedido->envio;

			$dom = session('shipAdd');
			$dom = Domicilio::find($dom);
			$package = session('shipItems');
			$carrier = session('shipCarrier');

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
				'carrier' => $carrier,
				'service' => $request->envio_service,
				'type' => 1
			);

			$settings = array(
				'printFormat' => "PDF",
				'printSize' => "STOCK_4X6"
			);

			$datacode = json_encode(array(
				'origin' => $origin,
				'destination' => $destination,
				'packages' => $package,
				'shipment' => $shipment,
				'settings' => $settings
			));

			$env = config('envia.env');
			$urlBase= "https://".$env.".envia.com";

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $urlBase.'/ship/generate/',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => $datacode,
				CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json",
					// "Authorization: Bearer " . $config->envia_key
					"Authorization: Bearer 070e3c998ef2c703b8cef55c77f63e9ff004e62ac69d7ca60140ce0cd7332bf0"
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$rateResponse = json_decode($response,true);


			$pedido->envia_resp = $rateResponse;
			// $pedido->envia_data = ($rateResponse['meta'] == 'generate') ? $pedido->envia_data = $rateResponse['data'] : $rateResponse ;
			$pedido->save();


			switch ($request->route) {
				case 'deposito':
					return redirect()->route('dash.compras.detalle',$pedido->uid);
				break;
				case 'paypal':
				return redirect()->route('paypal.paypalpay',$pedido->uid);
				break;
				case 'stripe':
				return redirect()->route('stripe.pay',$pedido->uid);
				break;
			}

			// return $rateResponse;
		}

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($pedidoId){

        $pedido = Pedido::find($pedidoId);
        $pedido->user = $pedido->usuario()->get();
        $pedido->domicilio = json_decode($pedido->domicilio,true);
        $factura=Factura::where('user',$pedido->usuario)->get()->first();

        //buscamos el detalle
        $pedido->detalles = $pedido->pedidosDetalle()->get();
        foreach ($pedido->detalles as $value) {
					$var = ProductoVariante::find($value->producto);
					$main = Producto::find($var->producto);

						$value->producto = array(
							'prod' => $main,
							'var' => $var,
						);
        }

        if (empty($pedido)){
             \Toastr::error('Error al buscar, intente mas tarde');
             return redirect()->back();
        }
        return view('admin.pedidos.show',compact('pedido','factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (empty($request->ped)) {
            \Toastr::error('Error, intentalo mas tarde');
            return redirect()->back();
        }
        $pedido = Pedido::find($request->ped);

        if (!empty($pedido)) {

            if (!empty($pedido->comprobante)) {
                \Storage::disk('local')->delete("/img/photos/pedidos/".$slider->comprobante);
            }
            $detalles = PedidoDetalle::where('pedido',$pedido->id)->delete();

            $pedido->delete();
            \Toastr::success('Eliminado Exitosamente');
            return redirect()->back();
            // return $color;
        }
    }

    public function changeStatus(Request $request){

        if (Pedido::find($request->id)->update(["estatus" => "$request->estatus"])) {
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
        }else {
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }
    }
}
