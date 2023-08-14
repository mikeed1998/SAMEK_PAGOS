<?php

namespace App\Http\Controllers;

use App\Configuracion;
use App\PaymentStripe;
use App\Pedido;
use App\Domicilio;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class PaymentStripeController extends Controller {
	private $public_key;
	private $priv_key;
	private $config;

		public function __construct() {
			$this->config = Configuracion::find(1);
			$this->priv_key = $this->config->stripe_sk;
			Stripe::setApiKey("$this->priv_key");
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
		 * @param  \App\PaymentStripe  $paymentStripe
		 * @return \Illuminate\Http\Response
		 */
		public function show(PaymentStripe $paymentStripe)
		{
				//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\PaymentStripe  $paymentStripe
		 * @return \Illuminate\Http\Response
		 */
		public function edit(PaymentStripe $paymentStripe)
		{
				//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \App\PaymentStripe  $paymentStripe
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, PaymentStripe $paymentStripe)
		{
				//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\PaymentStripe  $paymentStripe
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(PaymentStripe $paymentStripe)
		{
				//
		}

		public function pay($uuid) {
			$pedido = Pedido::where('uid',$uuid)->get()->first();
			$pedido->pedidosDetalle;
			return view('cart.stripe',compact('pedido'));
		}

		public function webhook(Request $request) {

			$payload = @file_get_contents('php://input');
			$event = null;
			try {
				$event = \Stripe\Event::constructFrom(
					json_decode($payload, true)
				);
			} catch(\UnexpectedValueException $e) {
				// Invalid payload
				echo '⚠️  Webhook error while parsing basic request.';
				http_response_code(400);
				exit();
			}
			// Handle the event
			switch ($event->type) {
				case 'payment_intent.succeeded':
					$paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
					// Then define and call a method to handle the successful payment intent.
					// handlePaymentIntentSucceeded($paymentIntent);
					$trans = new PaymentStripe;

					$pedido = $event->data->object->charges->metadata->order_id;
					$pedido = Pedido::where('uid',$pedido)->get()->first();

					$trans->pedido = $event->data->object->charges->metadata->order_id;
					$trans->id_trans = $event->id ;
					$trans->last4 = $event->data->object->charges->data->payment_method_details->card->last4;
					$trans->event = $event;
					$trans->save();

					$pedido->estatus = 1 ;
					$pedido->save();

					break;
				case 'payment_method.attached':
					$paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
					// Then define and call a method to handle the successful attachment of a PaymentMethod.
					// handlePaymentMethodAttached($paymentMethod);
					break;
				default:
					// Unexpected event type
					echo 'Received unknown event type';
			}
			http_response_code(200);
		}

		public function process($uuid) {
			$pedido = Pedido::where('uid',$uuid)->get()->first();
			$email = Auth::user()->email;
			try {
				$paymentIntent = \Stripe\PaymentIntent::create([
					// 'amount' => $pedido->total,
					'amount' => (number_format($pedido->total, 2, '.', '') * 100),
					'currency' => 'mxn',
					'receipt_email' => "$email",
					'metadata' => array(
						'order_id' => $pedido->uid,
					)
				]);

				$output = [
					'clientSecret' => $paymentIntent->client_secret,
				];

				echo json_encode($output);

			} catch (Error $e) {
				http_response_code(500);
				echo json_encode(['error' => $e->getMessage()]);
			}
		}
}
