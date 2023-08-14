<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
	<div class="container-fluid">

		<a class="navbar-brand waves-effect d-none d-block d-sm-block d-md-block d-lg-block d-xl-none " href="https://mdbootstrap.com/docs/jquery/" target="_blank">
			{{-- <strong class="blue-text">MDB</strong> --}}
			<img src="{{asset('img/design/logo.png')}}" class="img-fluid" alt="">

		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav mr-auto">
				<li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
					<a class="nav-link waves-effect" href="{{ route('dash.index') }}">Inicio
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link waves-effect" href="{{ route('front.productos')}}" target="_blank">Tienda</a>
				</li>
			</ul>

			<ul class="navbar-nav nav-flex-icons">
				@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Inicar Sesion') }}</a>
				</li>
				@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
				</li>
				@endif
				@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
																					 document.getElementById('logout-form').submit();">
							{{ __('Salir') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
				@endguest
			</ul>

		</div>

	</div>
</nav>
