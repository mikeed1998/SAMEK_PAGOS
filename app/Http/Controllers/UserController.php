<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Domicilio;
use App\Factura;
use App\Pedido;
use App\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function getSignup() {
		$data = Configuracion::first();
		return view('front.user.registro', compact('data'));
	}

	public function postSignup(Request $request) {
		$this->validate($request, [
			'email' => 'email|required|unique:users',
			'password' => 'required|min:4'
		]);

		$user = new User([
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password'))
		]);

		$user->save();

		Auth::login($user);

		if(Session::has('oldUrl')) {
			$oldUrl = Session::get('oldUrl');
			Session::forget('oldUrl');
			return redirect()->to($oldUrl);
		}

		return redirect()->route('user.profile');
	}

	public function getSignin() {
		$data = Configuracion::first();

		return view('front.user.login', compact('data'));
	}

	public function postSignin(Request $request) {
		$this->validate($request, [
			'email' => 'email|required',
			'password' => 'required|min:4'
		]);

		if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

			if(Session::has('oldUrl')) {
				$oldUrl = Session::get('oldUrl');
				Session::forget('oldUrl');
			}

			return redirect()->route('user.profile');
		}

		return redirect()->back();
	}

	public function getProfile() {
		$data = Configuracion::first();
		$user = Auth::user();
		$orders = Auth::user()->orders;

		$orders->transform(function($order, $key) {
			$order->cart = unserialize($order->cart);
			return $order;
		});

		return view('front.user.perfil', compact('data', 'orders', 'user'));
	}

	public function getLogout() {
		Auth::logout();
		Session::forget('cart');
		return redirect()->route('user.signin');
	}


    //  /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */  
    // public function index(){
		// 	$clientes = User::orderBy('created_at','desc')->get();

    //   foreach ($clientes as $cli) {
    //     $pedidos = Pedido::where('usuario',$cli->id)->get()->count();
    //     $cli->pedidos = $pedidos;
    //   }

		// 	return view('admin.clientes.index',compact('clientes'));
    // }

    //  /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Producto  $producto
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($userId){
		// 	$user = User::find($userId);
    //         $domicilios = Domicilio::where('user',$userId)->get();
    //         $factura = Factura::where('user',$userId)->get()->first();
    //         $pedidos = $user->pedidos()->get();

		// 	if (empty($userId)) {
		// 		\Toastr::error('Error al buscar, intente mas tarde');
		// 		return redirect()->back();
		// 	}
		// 	return view('admin.clientes.show',compact('user','domicilios','factura','pedidos'));
    // }

    // public function destroy(Request $request){
		// 	$user = User::find($request->user);

		// 	if (empty($user)) {
		// 		\Toastr::error('Error al buscar, intente mas tarde');
		// 		return redirect()->back();
		// 	}

		// 	$user->delete();

		// 	\Toastr::success('Usuario borrado exitosamente');
		// 	return redirect()->back();
    // }

}
