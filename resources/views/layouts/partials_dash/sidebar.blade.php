<div class="sidebar-fixed position-fixed" style="z-index:2000;">

	<a class="logo-wrapper waves-effect">
		<img src="{{asset('img/design/logoFooter.png')}}" class="img-fluid" alt="">
	</a>

	<div class="list-group list-group-flush">
		<a href="{{ route('dash.index') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }} waves-effect">
			<i class="fa fa-home mr-3"></i>Inicio
		</a>
		<a href="{{ route('dash.perfil') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/perfil')) ? 'active' : '' }} waves-effect">
			<i class="fa fa-user mr-3"></i>Perfil
		</a>
		<a href="{{ route('dash.compras.index') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/mis-compras')) ? 'active' : '' }} waves-effect">
			<i class="fas fa-shopping-bag mr-3"></i> Mis compras
		</a>
	</div>

</div>
