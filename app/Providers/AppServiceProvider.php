<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Configuracion;
use App\Producto;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Schema::defaultStringLength(125);
				$configs = Configuracion::find(1);
                $product = Producto::where("activo",1)->orderBy("orden","asc")->get(["id","nombre"]);

				View::share([
					'config' => $configs,
                    'productos_menu' => $product,
				]);


    }
}
