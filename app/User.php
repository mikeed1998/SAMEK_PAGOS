<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasRoles;
	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
				'name','lastname','username', 'address','email','telefono','facebook','empresa','avatar','rfc','nivel','distr_code','referido_by','distribuidor','profile','activo','role','password', 'municipio', 'estado', 'codigo_postal', 'colonia',
		// 'email', 'password',
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function orders() {
		return $this->hasMany('App\SOrder');
	}

	public function user() {
		return $this->hasOney('App\User');
	}

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

		public function pedidos(){
			return $this->hasMany('App\Pedido','usuario');
		}

		public function referido($code){
			return static::where('referido_by',$code)->get()->pluck('distr_code');
		}

		public function referidosred($tope,$code){
			$referidos = $this->where('referido_by',$code)->get('distr_code');

			$network = collect();
			$tope--;

			foreach ($referidos as $ref) {
				if ($tope >= 0 ) {
					$data = self::referidosred($tope,$ref->distr_code);
					$network->push([
						'user' => $ref->distr_code,
						'referidos' => $data
					]);
				}
			}

			return $network;

		}

		// public function referidosn($code,$tope){
		//
		// 	return static::where('referido_by',$code)->get()->pluck('distr_code');
		// }
}
