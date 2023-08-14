<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TestController extends Controller
{
	// public function referido($code) {
	//
	// 	return User::where('referido_by',$code)->get('distr_code');
	// }

	public function referido($code) {
		$user = User::where('referido_by',$code)->get();
		$data = array();

		foreach ($user as $us) {
			array_push($data,[$us->distr_code,$us->referido_by,'']);
		}

		return $data;
	}

	// public function referidosN($tope,$code) {
	// 	$referidos = User::where('referido_by',$code)->get();
	// 	$network = collect();
	//
	// 	$tope--;
	// 	if ($tope > 0) {
	// 		if (!empty($referidos)) {
	// 			foreach ($referidos as $ref) {
	// 				self::referidosN($tope,$ref->distr_code);
	// 				$network->push([
	// 					'user' => $code,
	// 					'referidos' => $referidos
	// 				]);
	// 			}
	// 			// self::referidosN();
	// 		}
	// 	}
	//
	// 	return $network;
	// }

	public function referidosN($tope,$code) {
		$referidos = User::where('referido_by',$code)->get('distr_code');
		$network = collect();

		// $network->push([
		// 	'user' => $code,
		// 	'referidos' => $referidos
		// ]);

		$tope--;

		foreach ($referidos as $ref) {
			if ($tope >= 0 ) {
				$data = self::referidosN($tope,$ref->distr_code);
				$network->push([
					// 'tope' => $tope,
					'user' => $ref->distr_code,
					'referidos' => $data
				]);
			}
		}

		return $network;
	}

	public function referidoschart($tope,$code) {
		$referidos = User::where('referido_by',$code)->get('distr_code');
		$network = collect();

		// $network->push([
		// 	'user' => $code,
		// 	'referidos' => $referidos
		// ]);

		$tope--;

		foreach ($referidos as $ref) {
			if ($tope >= 0 ) {
				$data = self::referidosN($tope,$ref->distr_code);
				$network->push([
					// 'tope' => $tope,
					'user' => $ref->distr_code,
					'referidos' => $data
				]);
			}
		}
		// $network = call_user_func_array('array_merge', $network);
		return $network;
	}
	

}
