<style>
    @media(min-width: 1800px) {
        .menu-grande {
            display: block;
        }

        .menu-movil {
            display: none;
        }

        .boton-xs {
            display: none;
        }
    }

    /* xxl */
    @media (min-width: 1400px) and (max-width: 1799px) {
        .menu-grande {
            display: block;
        }

        .menu-movil {
            display: none;
        }

        .boton-xs {
            display: none;
        }
    }

    /* xl */
    @media (min-width: 1200px) and (max-width: 1399px) {
        .menu-grande {
            display: block;
        }

        .menu-movil {
            display: none;
        }

        .boton-xs {
            display: none;
        }
    }

    /* lg */
    @media (min-width: 992px) and (max-width: 1199px) {
        .menu-grande {
            display: none;
        }

        .menu-movil {
            display: block;
        }

        .boton-xs {
            display: none;
        }
    }

    /* md */
    @media (min-width: 768px) and (max-width: 991px) {
        .menu-grande {
            display: none;
        }

        .menu-movil {
            display: block;
        }

        .boton-xs {
            display: none;
        }
    }

    /* sm */
    @media (min-width: 576px) and (max-width: 767px) {
        .menu-grande {
            display: none;
        }

        .menu-movil {
            display: block;
        }

        .boton-xs {
            display: none;
        }
    }

    /* xs */
    @media (min-width: 0px) and (max-width: 575px) {
        .menu-grande {
            display: none;
        }

        .menu-movil {
            display: block;
        }

        .boton-md {
            display: none;
        }

        .boton-xs {
            display: block;
        }
    }
</style>

<header class="menu-grande">
	<div class="row mt-3">
		<div class="col fs-3 fw-bolder mt-4 text-center">
			<a href="{{ route('front.index') }}" class="text-dark" style="text-decoration: none;">
				INICIO
			</a>
		</div>
		<div class="col fs-3 fw-bolder mt-4 text-center">
			<a href="{{ route('front.tienda') }}" class="text-dark" style="text-decoration: none;">
				TIENDA
			</a>
		</div>
		<div class="col fs-3 fw-bolder mt-4 text-center">
			<a href="{{ route('front.soluciones') }}" class="text-dark" style="text-decoration: none;">
				SOLUCIONES
			</a>
		</div>
		<div class="col fs-3 text-center">
			<img src="{{ asset('img/design/logo.png') }}" class="img-fluid"/>
		</div>
		<div class="col fs-3 fw-bolder mt-4 text-center">
			<a href="{{ route('front.aboutus') }}" class="text-dark" style="text-decoration: none;">
				NOSOTROS
			</a>
		</div>
		<div class="col fs-3 fw-bolder mt-4 text-center">
			<a href="{{ route('front.contacto') }}" class="text-dark" style="text-decoration: none;">
				CONTACTO
			</a>
		</div>
		{{-- <div class="col fs-3 fw-normal mt-4 text-success text-center">
			<a href="{{ route('user.signup') }}" style="text-decoration: none; color: #00AD61;">
				USUARIO <span uk-icon="icon: cart; ratio: 1.6;"></span>
			</a>
		</div> --}}
		<div class="col fs-3 fw-normal mt-4 text-success text-start">
			<ul class="row" style="list-style-type: none; padding-left: 0;">
				<li class="dropdown col-6" style="list-style-type: none; padding-left: 0;">
					<a href="#" class="dropdown-toggle fs-3 fw-normal" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration: none; color: #00AD61;">USUARIO</a>
					@if (Auth::check())
					<ul class="dropdown-menu" style="list-style-type: none; padding-left: 0;">
						<li class="dropdown-item fs-4"><a href="{{ route('user.profile') }}" style="text-decoration: none; color: #00AD61;">Perfil</a></li>
						<li><hr class="dropdown-divider"></li>
						<li class="dropdown-item fs-4"><a href="{{ route('user.logout') }}" style="text-decoration: none; color: #00AD61;">Salir</a></li>
					</ul>
					@else
						<ul class="dropdown-menu" style="list-style-type: none; padding-left: 0;">
							<li class="dropdown-item fs-4"><a href="{{ route('user.signup') }}" style="text-decoration: none; color: #00AD61;">Registrarse</a></li>
							<li class="dropdown-item fs-4"><a href="{{ route('user.signin') }}" style="text-decoration: none; color: #00AD61;">Ingresar</a></li>
						</ul>
					@endif
					
					

				</li>
				<li class="col-6 text-start" style="list-style-type: none; padding-left: 0;">
					<a href="{{ route('shoppingCart') }}">
						<button type="button" class="btn btn-outline position-relative">
							<div uk-icon="icon: cart; ratio: 1.6;"></div>
								<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
									{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
								</span>
						</button>
					</a>
				</li>
			</ul>
			
		</div>
	</div>
</header>   

<header class="menu-movil">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12 col-12 fs-3 text-center">
			<div class="boton-md">
				<img src="{{ asset('img/design/logo.png') }}" class="img-fluid"/>
			</div>
			<div class="boton-xs">
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 col-12 text-center">
			<!-- Botón para colapsar/mostrar las columnas -->
			<div class="boton-md">
				<button class="btn btn-outline border-dark mt-md-4 mt-sm-4 mt-xs-4 mt-0" data-bs-toggle="collapse" data-bs-target="#miColapso"><span uk-icon="icon: menu; ratio: 2;"></span></button>
			</div>
			<div class="boton-xs">
				<button class="btn-link btn-outline bg-white border-0 mt-md-4 mt-sm-4 mt-xs-4 mt-0" data-bs-toggle="collapse" data-bs-target="#miColapso" style="text-decoration: none;"><img src="{{ asset('img/design/logo.png') }}" class="img-fluid"/></button>
			</div>
			<!-- <button class="btn-link w-100 btn-outline border-0 bg-white m-0 btn-p-0" data-bs-toggle="collapse" data-bs-target="#miColapso"><img src="img/logo.png" class="img-fluid" style=""/></button> -->
		</div>
		<div class="col-12">
			<!-- Elemento colapsable que contiene las columnas -->
			<div id="miColapso" class="collapse">
				<div class="row">
					<div class="col-12 fs-3 fw-bolder mt-4 text-center">
						<a href="{{ route('front.index') }}" class="text-dark" style="text-decoration: none;">
							INICIO
						</a>
					</div>
					<div class="col-12 fs-3 fw-bolder mt-4 text-center">
						<a href="{{ route('front.tienda') }}" class="text-dark" style="text-decoration: none;">
							TIENDA
						</a>
					</div>
					<div class="col-12 fs-3 fw-bolder mt-4 text-center">
						<a href="{{ route('front.soluciones') }}" class="text-dark" style="text-decoration: none;">
							SOLUCIONES
						</a>
					</div>
					<div class="col-12 fs-3 fw-bolder mt-4 text-center">
						<a href="{{ route('front.aboutus') }}" class="text-dark" style="text-decoration: none;">
							NOSOTROS
						</a>
					</div>
					<div class="col-12 fs-3 fw-bolder mt-4 text-center">
						<a href="{{ route('front.contacto') }}" class="text-dark" style="text-decoration: none;">
							CONTACTO
						</a>
					</div>
					<div class="col fs-3 fw-normal mt-4 text-success text-end">
						<ul class="row" style="list-style-type: none; padding-left: 0;">
							<li class="dropdown col-6" style="list-style-type: none; padding-left: 0;">
								<a href="#" class="dropdown-toggle fs-3 fw-normal" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration: none; color: #00AD61;">USUARIO</a>
								@if (Auth::check())
								<ul class="dropdown-menu" style="list-style-type: none; padding-left: 0;">
									<li class="dropdown-item fs-4"><a href="{{ route('user.profile') }}" style="text-decoration: none; color: #00AD61;">Perfil</a></li>
									<li><hr class="dropdown-divider"></li>
									<li class="dropdown-item fs-4"><a href="{{ route('user.logout') }}" style="text-decoration: none; color: #00AD61;">Salir</a></li>
								</ul>
								@else
									<ul class="dropdown-menu" style="list-style-type: none; padding-left: 0;">
										<li class="dropdown-item fs-4"><a href="{{ route('user.signup') }}" style="text-decoration: none; color: #00AD61;">Registrarse</a></li>
										<li class="dropdown-item fs-4"><a href="{{ route('user.signin') }}" style="text-decoration: none; color: #00AD61;">Ingresar</a></li>
									</ul>
								@endif
								
								
			
							</li>
							<li class="col-6 text-start" style="list-style-type: none; padding-left: 0;">
								<a href="{{ route('shoppingCart') }}">
									<button type="button" class="btn btn-outline position-relative">
										<div uk-icon="icon: cart; ratio: 1.6;"></div>
											<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
												{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
											</span>
									</button>
								</a>
							</li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</header>  