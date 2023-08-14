<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Configuracion;
use App\Domicilio;
use App\Pedido;
use Illuminate\Http\Request;
use Redirect;

class PaymentController extends Controller
{
	private $apiContext;
	private $environment;
	private $client;
	public $config;

	public function __construct() {
		$this->config = Configuracion::first();
		// $this->environment = new SandboxEnvironment($this->config->paypalid, $this->config->paypalsecret);
		// $this->client = new PayPalHttpClient($this->environment);
	}

	public function payWithPayPal($pedido){
			$pedido = Pedido::where('uid', $pedido)->get()->first();
			// $pedido = Pedido::where('uid', '57837086-4c30-4eca-bdff-cf0021714429')->get()->first();

			// $iva = ($pedido->importe * $pedido->iva) / 100;
			$total = $pedido->importe + $pedido->iva + $pedido->envio;

			$callbackUrl = url('/paypal/status');

			// Build the query string
			$queryString  = "?cmd=_cart";
			$queryString .= "&upload=1";
			$queryString .= "&trackingId=" . $pedido->id;
			$queryString .= "&noshipping=0";
			$queryString .= "&charset=utf-8";
			$queryString .= "&currency_code=MXN";
			$queryString .= "&business=" . urlencode($this->config->paypalemail);
			// $queryString .= "&return=" . route('dash.compras.detalle', $pedido->uid);
			$queryString .= "&return=" . $callbackUrl;
			$queryString .= "&notify_url=" . $callbackUrl;
			// $queryString .= "&cancel_return=" . urlencode($ruta . 'mi-cuenta');
			$queryString .= "&cancel_return=" . $callbackUrl;
			$queryString .= "&rm=2";
			$queryString .= "&invoice=" . $pedido->uid;
			$queryString .= "&tax_cart=" . $pedido->iva;
			// $queryString .= '&tax=' . $iva;

			$count = 1;
			// echo $pedido->data;

			$data_ped =  json_decode($pedido->data);
			// https://www.paypal.com/cgi-bin/webscr?business=email@me.com&return=returnurl&cancel_return=cancelurl&rm=2¤cy_code=CAD&lc=CAD&bn=Mysite&no_note=1&charset=utf-8¬ify_url=https%3A%2F%2Fmysite.com%2F%3Fwpsc_action%3Dgateway_notification%26gateway%3Dwpsc_merchant_paypal_standard&invoice=2081379006142&upload=1&cmd=_ext-enter&redirect_cmd=_cart&handling_cart=0.00&item_name_1=Your+Shopping+Cart&amount_1=115.07&quantity_1=1&shipping_1=0&shipping2_1=0&handling_1=0&tax_cart=13.24

			$queryString .= '&item_number_' . $count . '=' . urlencode('1');
			$queryString .= '&item_name_' . $count . '=' . urlencode('envio paqueteria');
			$queryString .= '&amount_' . $count . '=' . urlencode($pedido->envio);
			$queryString .= '&quantity_' . $count . '=' . urlencode('1');

			foreach ( $data_ped as $data) {
					$count++;

					$prod = $data->associatedModel;

					$fprice = $prod->precio - ($prod->precio*$prod->descuento)/100;
					$fiva = ($fprice * $this->config->iva) / 100;

					$queryString .= '&item_number_' . $count . '=' . urlencode($prod->id);
					$queryString .= '&item_name_' . $count . '=' . urlencode($data->name);
					$queryString .= '&amount_' . $count . '=' . urlencode($fprice);
					$queryString .= '&quantity_' . $count . '=' . urlencode($data->quantity);
					$queryString .= '&shipping_' . $count . '= 0';
					// $queryString .= '&tax_' . $count . '=' . urlencode($fiva);
			}

			$sandbox = env('PAYPAL_SANDBOX');
			$url = 'https://www.'.$sandbox.'paypal.com/cgi-bin/webscr'.$queryString;
			return Redirect::to($url);
			// return $url;

			// echo ('Location: https://www.'.$sandbox.'paypal.com/cgi-bin/webscr' .$queryString);
			// header('Location: https://www.' . $sandbox . 'paypal.com/cgi-bin/webscr' . $queryString);

	}

	public function payPalStatus(Request $request){

		// return $request;
				// cambiar el estatus a pagado y hacer todo el proceso bla bla

				// return $request;
		$paymentId = $request->input('txn_id');
		$payerId = $request->input('payer_id');
		// $token = $request->input('token');

		if (!$paymentId || !$payerId ) {

			\Toastr::error('Lo sentimos! El pago a través de PayPal no se pudo realizar.');
			return redirect()->back();
		}

		// dd($result);
		$pedido = $request->input('invoice');
		$pedido = Pedido::where('uid', $pedido)->get()->first();
		$paymentStatus = $request->input('payment_status');

		if ($paymentStatus === 'Completed') {
			$pedido->estatus = 1 ;
			// NOTE: descontar stock en los productos comprados
			// NOTE: hacer el cargo a envia.com
			$pedido->save();

			// $payment = new Payment;
			//
			// $payment->pedido = $pedido->id;
			// $payment->email = $request->input('payer_email');
			// $payment->txn_id = $request->input('txn_id');
			// $payment->status = $paymentStatus;
			// $payment->dataret = $request->all();
			//
			// $payment->save();

			\Toastr::success('Gracias! El pago a través de PayPal se ha ralizado correctamente.');

			return redirect()->route('dash.compras.detalle',$pedido->uid)->with('status','Gracias! El pago a través de PayPal se ha ralizado correctamente. Sigue tu pedido en el panel de usuario');
		}

		\Toastr::error('Lo sentimos! El pago a través de PayPal no se pudo realizar.');
		\Toastr::warning('Comunicate con la tienda para realizar tu pago.');

		return redirect()->route('dash.compras.detalle',$pedido->uid);
	}
	public function payPalIpn(Request $request) {
		return $request;
	}
}
