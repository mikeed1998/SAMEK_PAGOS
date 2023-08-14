<header>
	@include('layouts.partials_ad.sidebar')
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
	<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav" style="box-shadow: none; background: none; color: #222;">

		<div class="float-left">
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
		</div>

		<!-- Breadcrumb -->
		<div class="breadcrumb-dn mr-auto">
			<div class="card p-3 mx-4" style="border-radius: 16px; box-shadow: none;">
				Administrador de SAMEK
			</div>
			
		</div>

		<div class="d-flex change-mode">
			<ul class="nav navbar-nav nav-flex-icons ml-auto">
				<li class="nav-item dropdown notifications-nav d-none">
					<a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="badge red">3</span> <i class="fas fa-bell"></i>
						<span class="d-none d-md-inline-block">Notifocaciones</span>
					</a>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">
							<i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
							<span>New order received</span>
							<span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
						</a>
						<a class="dropdown-item" href="#">
							<i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
							<span>New order received</span>
							<span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
						</a>
						<a class="dropdown-item" href="#">
							<i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
							<span>Your campaign is about to end</span>
							<span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
						</a>
					</div>
				</li>
				<div class="card p-2 mx-4" style="border-radius: 16px; box-shadow: none;">
				<li class="nav-item dropdown" style="color: #222;">
					<a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i style="color: #222;" class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block" style="color: #222;">Perfil</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" style="color: #222;">
						{{-- <a class="dropdown-item" href="#">Mi cuenta</a> --}}
						<a class="dropdown-item" href="{{ route('admin.logout') }}"
							 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								{{ __('Salir') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
						</form>
					</div>
				</li>
			</div>
			</ul>
		</div>
	</nav>

</header>

