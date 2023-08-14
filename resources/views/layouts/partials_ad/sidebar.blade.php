

<style>
	/* mas estilisado */	
	body{
		background-color: #e5e8eb  !important;
	}

	.card-header {
		background-color: #b0c1d1  !important;
		border-radius: 25px;
	}

	.black-skin .btn-primary {
		background-color: #b0c1d1  !important;
	}

	.btn {
		box-shadow: none;
		border-radius: 15px;
	}
	/* mas estilisado */

</style>
	

	 <div id="slide-out" class="side-nav  fixed">
		<ul class="custom-scrollbar" >
			<li class="logo-sn waves-effect py-3">
				<div class="text-center" >
					<a href="{{ url('admin') }}" class="pl-0">
						<img class="img-fluid" style="width: 200px;" src="{{asset('img/design/logo_woz.png')}}">
						 {{-- <div class="card mx-3 text-center d-flex justify-content-center align-items-centers" style="border-radius: 16px; height: 50px;" >
							<div><img class="" style="width: 130px; " src="{{asset('img/design/logo_woz.png')}}"></div>
						</div>  --}}
						
					</a>
				</div>
				<hr>
			</li>
			
			<li>
				<ul class="collapsible collapsible-accordion">
					{{-- <li>
						<a href="{{ route('pedidos.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/pedidos')) ? 'active' : '' }}"><i class="fas fa-box-open"></i>Pedidos</a>
					</li> --}}
					{{-- <li>
						<a href="{{ route('productos.index') }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/servicios')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-box-open"></i>Servicios</a>
					</li> --}}
					{{-- <li>
						<a href="{{ route('clientes.index') }}" class="collapsible-header waves-effect"><i class="fas fa-users"></i></i>Clientes</a>
					</li> --}}
					{{-- <li>
						// <a href="{{ url('admin/config/') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config')) ? 'active' : '' }}"><i class="w-fa fas fa-cog"></i>Configuración</a>
						<a href="{{ route('vacante.index') }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/vacantes')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="w-fa fas fa-search"></i>Vacantes</a>
					</li> --}}
					<li>
						<a href="{{ route('config.general') }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config/general')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-bookmark"></i> Nombre de la página </a>
					</li>
					<li>
						<a href="{{ route('config.faq.index') }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config/faq')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-question"></i> FAQ </a>
					</li>
					<li>
						<a href="{{ route('config.politica.index') }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config/politicas')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-shield-alt"></i> Políticas </a>
					</li>
					<li>
						<a href="{{ route('config.seccion.show', ['slug' => 'home']) }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config/secciones/home')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-home"></i> Home </a>
					</li>
					<li>
						<a href="{{ route('config.seccion.show', ['slug' => 'store']) }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config/secciones/store')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fab fa-servicestack"></i> Tienda </a>
					</li>
					<li>
						<a href="{{ route('config.seccion.show', ['slug' => 'solutios']) }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config/secciones/solutios')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-box-open"></i> Soluciones </a>
					</li>
					<li>
						<a href="{{ route('config.seccion.show', ['slug' => 'about-us']) }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config/secciones/about-us')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-info"></i> Nosotros </a>
					</li>
					<li>
						<a href="{{ route('config.seccion.show', ['slug' => 'contact']) }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config/secciones/contact')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-mail-bulk"></i> Contacto </a>
					</li> 
					{{-- <li>
						<a href="{{ route('config.seccion.show', ['slug' => 'contact']) }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config*')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-paper-plane"></i> Contacto </a>
					</li> --}}
					{{-- <li>
						<a href="{{ route('config.contact') }}" class="mx-3 my-1 collapsible-header waves-effect {{ (request()->is('admin/config/contacto')) ? 'active' : '' }}" style="border-radius: 16px;"><i class="fas fa-cogs"></i> Configuración </a>
					</li> --}}
					
				</ul>
			</li>
		</ul>

		<div class="sidenav-bg mask-strong"></div>
	
		<div class="fixed-action-btn clearfix d-none" style="bottom: 45px; right: 24px;">
			<a class="btn-floating btn-lg red">
				<i class="fas fa-pencil-alt"></i>
			</a>
			<ul class="list-unstyled">
				<li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
				<li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
				<li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
				<li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
			</ul>
		</div>
	</div> 
	