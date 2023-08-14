<?php

namespace App\Http\Controllers\Admin;

use App\Configuracion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$cards = array(
				array('icon' => 'fas fa-cogs', 'route' => 'config.general', 'text' => 'Config. general'),
				array('icon' => 'fas fa-paper-plane', 'route' => 'config.contact', 'text' => 'Contacto'),
				// array('icon' => 'fas fa-palette', 'route' => 'config.color.index', 'text' => 'Colores'),
                // array('icon' => 'fas fa-users', 'route' => 'admin.show', 'text' => 'Usuarios'),
				// array('icon' => 'fas fa-ticket-alt', 'route' => 'config.cupons.index', 'text' => 'Cupones'),
				// array('icon' => 'fas fa-arrows-alt', 'route' => 'config.size.index', 'text' => 'Tamaños'),
				// array('icon' => 'fas fa-question', 'route' => 'config.faq.index', 'text' => 'FAQ'),
				// array('icon' => 'fas fa-images', 'route' => 'config.slider.index', 'text' => 'Sliders'),
				// array('icon' => 'fas fa-shield-alt', 'route' => 'config.politica.index', 'text' => 'Politicas'),
				array('icon' => 'fab fa-buromobelexperte', 'route' => 'config.seccion.index', 'text' => 'Secciones'),
			);

			return view('configs.index',compact('cards'));
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
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function show(Configuracion $configuracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuracion $configuracion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuracion $configuracion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuracion $configuracion)
    {
        //
    }

		public function general(){
			$data = Configuracion::first();
			return view('configs.general',compact('data'));
		}

		public function contact(){
			$data = Configuracion::first();
			return view('configs.contacto',compact('data'));
		}

}
