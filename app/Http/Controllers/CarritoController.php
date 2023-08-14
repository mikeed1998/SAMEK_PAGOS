<?php

namespace App\Http\Controllers;

use App\Configuracion;
use App\SProducto;
use App\Carrito;
use Illuminate\Http\Request;

use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use App\SOrder;

class CarritoController extends Controller
{
    public function getAddToCart(Request $request, $id) {
        $product = SProducto::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Carrito($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('front.tienda');
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Carrito($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('shoppingCart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Carrito($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('shoppingCart');
    }

    public function getCart() {
        $data = Configuracion::first();
        if(!Session::has('cart')) {
            return view('front.carrito.shopping-cart', ['products' => null, 'data' => $data]);
        }

        $oldCart = Session::get('cart');
        $cart = new Carrito($oldCart);
        return view('front.carrito.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'data' => $data]);
    }

    public function getCheckoutStripe() {
        $data = Configuracion::first();
        if(!Session::has('cart')) {
            return view('front.carrito.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Carrito($oldCart);
        $total = $cart->totalPrice;

        return view('front.carrito.checkoutStripe', ['total' => $total, 'data' => $data]);
    }

    public function postCheckoutStripe(Request $request) {
        if(!Session::has('cart')) {
            return redirect()->route('shoppingCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Carrito($oldCart);

        Stripe::setApiKey('sk_test_51Nb8P9Kuq6E1vXOyXhk1dDg9nNnmZ8y5Beo9eIaHvdGkvTNhOcmYYxIMpEm2YScJOWWJSBXCCaPDvCUwzTaUcRvg00a0oFXRax');
        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                // "source" => $request->input('stripeToken'), // Obtained with Stripe.js source or customer
                "source" => "tok_mastercard",
                "description" => "Test Charge"
            ));
            $order = new SOrder();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        } catch(\Exception $e) {
            return redirect()->route('checkoutStripe')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('user.profile')->with('success', 'Successfully purchased products!');
    }

    public function getCheckoutConekta() {
        $data = Configuracion::first();
        if(!Session::has('cart')) {
            return view('front.carrito.shopping-cart');
        }
        
        $oldCart = Session::get('cart');
        $cart = new Carrito($oldCart);
        $total = $cart->totalPrice;

        return view('front.carrito.checkoutConekta', ['total' => $total, 'data' => $data]);
    }

    public function postCheckoutConekta(Request $request) {
        // dd('llegue');
        if(!Session::has('cart')) {
            return redirect()->route('shoppingCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Carrito($oldCart);

        $nombre_ = Auth::user()->name ." ". Auth::user()->lastname;
        $email_ = Auth::user()->email;
        $telefono_ = Auth::user()->telefono;

        // foreach($cart->items as $cat) {
        //     echo $cat['item']->nombre . "<br>";
        //     echo $cat['price'] . "<br>";
        //     echo $cat['qty'] . "<br>";
        // }

        // dd("stop");

        // dd($cart->items[14]);
        // dd($cart->items[14]['price']);
        // dd($cart->items[14]['qty']);
        // dd($cart->items[14]['item']->nombre);

        // Conekta::setApiKey('sk_test_51Nb8P9Kuq6E1vXOyXhk1dDg9nNnmZ8y5Beo9eIaHvdGkvTNhOcmYYxIMpEm2YScJOWWJSBXCCaPDvCUwzTaUcRvg00a0oFXRax');
        // try {
        //     $charge = Charge::create(array(
        //         "amount" => $cart->totalPrice * 100,
        //         "currency" => "usd",
        //         // "source" => $request->input('ConektaToken'), // Obtained with Conekta.js source or customer
        //         "source" => "tok_mastercard",
        //         "description" => "Test Charge"
        //     ));
        //     $order = new SOrder();
        //     $order->cart = serialize($cart);
        //     $order->address = $request->input('address');
        //     $order->name = $request->input('name');
        //     $order->payment_id = $charge->id;

        //     Auth::user()->orders()->save($order);
        // } catch(\Exception $e) {
        //     return redirect()->route('checkoutConekta')->with('error', $e->getMessage());
        // }

        require_once('vendor/libConekta/Conekta.php');
        // \Conekta\Conekta::setApiKey("key_Ax9YM8UMUQQUxHAeehKv9g");
        \Conekta\Conekta::setApiKey("key_smGi4GNG7dXpoUlMExZ0Vfg");

        \Conekta\Conekta::setApiVersion("2.0.0");

        $token_id= $request->conektaTokenId;

        

        try {
            $customer = \Conekta\Customer::create(
                array(
                    "name" => $nombre_,
                    "email" => $email_,
                    "phone" => "+52". $telefono_,
                    "payment_sources" => array(
                        array(
                            "type" => "card",
                            "token_id" => $token_id
                        )
                    )//payment_sources
                )//customer
            );
        } catch (\Conekta\ProccessingError $error){
            echo $error->getMesage();
        } catch (\Conekta\ParameterValidationError $error){
            echo $error->getMessage();
        } catch (\Conekta\Handler $error){
             echo $error->getMessage();
        }

        $lineItems = [];

        foreach($cart->items as $cat) {
            $lineItems[] = [
                "name" => $cat['item']->nombre,
                "unit_price" => $cat['price'] * 100,
                "quantity" => $cat['qty'] 
            ];
        }

        try{
            $order = \Conekta\Order::create(
                array(
                    "line_items" => $lineItems,
                     //line_items
                    "shipping_lines" => array(
                        array(
                            "amount" => 0,
                            "carrier" => "FEDEX"
                        )
                    ), //shipping_lines - physical goods only
                    "currency" => "MXN",
                    "customer_info" => array(
                        "customer_id" => $customer->id
                    ), //customer_info
                    "shipping_contact" => array(
                        "address" => array(
                            "street1" => "Calle 123, int 2",
                            "postal_code" => "06100",
                            "country" => "MX"
                        )//address
                    ), //shipping_contact - required only for physical goods
                    "metadata" => array(
                        "reference" => "12987324097", 
                        "more_info" => "lalalalala"),
                    "charges" => array(
                        array(
                            "payment_method" => array(
                                "type" => "default"
                            ) //payment_method - use customer's default - a card
                            //to charge a card, different from the default,
                            //you can indicate the card's source_id as shown in the Retry Card Section
                        ) //first charge
                    ) //charges
                )//order
            );

            $order = new SOrder();
            $order->cart = serialize($cart);
            $order->address = Auth::user()->address;
            $order->name =  Auth::user()->name;
            $order->payment_id = $customer->id;
            $order->entregado = 0;

            Auth::user()->orders()->save($order);
        } catch (\Conekta\ProcessingError $error){
            echo $error->getMessage();
        } catch (\Conekta\ParameterValidationError $error){
            echo $error->getMessage();
        } catch (\Conekta\Handler $error){
            echo $error->getMessage();
        }

        // echo "ID: ". $order->id;
        // echo "<br>Status: ". $order->payment_status;
        // echo "<br>$". $order->amount / 100 . $order->currency;
        // echo "<br>Order";
        // echo $order->line_items[0]->quantity .
        //     "-". $order->line_items[0]->name .
        //     "- $". $order->line_items[0]->unit_price / 100;
        // echo "<br>Payment info";
        // echo "<br>CODE:". $order->charges[0]->payment_method->auth_code;
        // echo "<br>Card info:" .
        //     "- ". $order->charges[0]->payment_method->name .
        //     "- ". $order->charges[0]->payment_method->last4 .
        //     "- ". $order->charges[0]->payment_method->brand .
        //     "- ". $order->charges[0]->payment_method->type;

        // Response
        // ID: ord_2fsQdMUmsFNP2WjqS
        // $ 135.0 MXN
        // Order
        // 12 - Tacos - $10.0
        // Payment info
        // CODE: 035315
        // Card info: 4242 - visa - banco - credit



        
        Session::forget('cart');
        return redirect()->route('user.profile')->with('success', 'Successfully purchased products!');
    }
}
