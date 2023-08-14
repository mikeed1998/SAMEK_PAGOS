@extends('layouts.front')

@section('title', 'Tienda')

@section('styleExtras')
<style>
	.producto > .card {
		display: none;
	}
   
	.producto:hover > .card {
		display: block;
		border: none;
		background-color: rgba(243, 243, 243, 0.7);
	}
</style>

<style>      
	@media(min-width: 1800px) {

	}

	/* xxl */
	@media (min-width: 1400px) {
	   
	}

	/* xl */
	@media (min-width: 1200px) and (max-width: 1400px) {
		

	}

	/* lg */
	@media (min-width: 992px) and (max-width: 1200px) {
	 
	}

	/* md */
	@media (min-width: 768px) and (max-width: 992px) {
	  

	}

	/* sm */
	@media (min-width: 576px) and (max-width: 768px) {
	  

	}

	/* xs */
	@media (min-width: 0px) and (max-width: 576px) {
	   
	}
</style>
@endsection

@section('content')
<style>
	.accordion-link {
		display: block;
		padding: 20px 40px 20px 20px; /* Aumenta el espacio para el icono */
		background-color: transparent;
		color: #000;
		text-decoration: none;
		border: none;
		border-bottom: 1px solid #2244D7;
		position: relative; /* Añade posición relativa para posicionar el icono */
		transition: background-color 0.3s;
	}

	.accordion-link:hover {
		background-color: #e0e0e0;
	}

	.accordion-link:active {
		background-color: #d0d0d0;
	}

	.accordion-link .icon {
		position: absolute; /* Posiciona el icono absolutamente */
		top: 50%; /* Lo centra verticalmente */
		right: 20px; /* Lo posiciona a la derecha */
		transform: translateY(-50%); /* Ajusta la posición vertical */
	}
</style>

<div class="container-fluid mb-5" style="box-shadow: inset 0 0 40px rgba(0, 0, 0, 0.1);">
	<div class="row">
		<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5 col-sm-12 col-xs-12 col-12 mx-auto mt-5 py-5">
			<div id="filtro">
				<style>
					.cate-style {
						font-size: 26px;
					}

					.icon-style {
						font-size: 40px;
						font-weight: 100;
					}
				</style>
				<ul class="categorias">

					@foreach ($categorias as $c) 
						<li data-filter=".categoria{{ $c->id }}" style="list-style-type: none;">
							<a class="categoria cate-style fw-bolder text-center accordion-link" href="#" style="color: #2244D7;  text-decoration: none;"><p class="m-0 fs-3 fw-bold">{{ $c->categoria }}</p> <span class="icon icon-style" style="color: #00AD61;"><i class="fa-solid fa-plus"></i></span></a>
							<ul class="subcategorias" style="list-style-type: none;">
								<li data-filter=".categoria{{ $c->id }}"><a href="#" class="fs-4 fw-normal" style="color: black;">Todos</a></li>
								@foreach ($subcategorias as $sc)
									@if ($sc->categoria == $c->id)
									<li data-filter=".categoria{{ $c->id }}.subcategoria{{ $sc->id }}"><a href="#" class="fs-4 fw-normal text-dark" style="color: #2244D7;">{{ $sc->subcategoria }}</a></li>										
									@endif
								@endforeach
							</ul>
						</li>
					@endforeach

				</ul>
			</div>
		</div>
		<div class="col-xxl-9 col-xl-9 col-lg-8 col-md-7 col-sm-12 col-xs-12 col-12 mt-5 py-5">
			<div id="contenido">
				<div id="items-container">
					@foreach ($productos as $prod)
					<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-11 col-sm-12 col-xs-12 col-12 px-3 mb-5 item categoria{{ $prod->categoria }} subcategoria{{ $prod->subcategoria }}">
						<div class="card border" style="border-radius: 16px;">
							<div class="row">
								<div class="col-12 position-relative">
									<div class="row">
										<div class="col-2"></div>
										<div class="col-8" style="border: 2px solid #00AD61;"></div>
										<div class="col-2"></div>
									</div>
									<div class="col-6 mx-auto" style="
										background-image: url('{{ asset('img2/photos/productos/'.$prod->imagen) }}');
										background-size: contain;
										background-position: center center;
										background-repeat: no-repeat;
										height: 360px;
										width: 70%;
									"></div>
									<div class="col-12 position-absolute top-0 bottom-0 start-0 px-2 producto">
										<div class="card h-100" style="border-top-left-radius: 18px; border-top-right-radius: 18px;">
											<div class="card-body py-5 d-flex align-items-center justify-content-center">
												<div class="row mt-5">
													<div class="col mt-5 d-flex align-items-center justify-content-center">
														<a href="{{ route('addToCart', ['id' => $prod->id]) }}">
															<img src="{{ asset('img/design/carrito2.png') }}" alt="" class="px-3">
														</a>
														<a href="{{ route('front.tienda_detalle', ['producto' => $prod->id]) }}">
															<img src="{{ asset('img/design/view.png') }}" alt="">
														</a>                          
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>   
							</div>     
							<div class="card-body border-top m-0">
								<div class="row">
									<div class="col-12 text-center fs-4 text-black">
										{{ $prod->nombre }}
									</div>
									<div class="col-12 text-center fs-4 text-secondary">
										${{ $prod->precio }}
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('jqueryExtra')
<script>

	$(document).ready(function() {
		 // Ocultar subcategorías por defecto
		$('.subcategorias').hide();

		var $grid = $('#contenido').isotope({
			itemSelector: '.item',
			layoutMode: 'fitRows'
		});

		// Variables para mantener el filtro actual
		var filtroActual = '*';

		// Cambiar icono al hacer clic en la categoría
		$('.categorias > li > a').on('click', function(e) {
			e.preventDefault();
			
			var $categoria = $(this).parent();
			var $subcategorias = $categoria.find('.subcategorias');
			var $icon = $categoria.find('.icon');

			if ($subcategorias.is(':hidden')) {
				$categoria.addClass('active');
			$subcategorias.slideDown();
			$icon.find('i').removeClass('fa-plus').addClass('fa-minus'); // Cambiar a icono de "fa-minus"
		} else {
			$categoria.removeClass('active');
			$subcategorias.slideUp();
			$icon.find('i').removeClass('fa-minus').addClass('fa-plus'); // Cambiar a icono de "fa-plus"
		}
	});

		// Filtrar al hacer clic en una subcategoría
		$('.subcategorias a').on('click', function(e) {
			e.preventDefault();
			e.stopPropagation();

			var $subcategoria = $(this).parent();
			var $categoriaPadre = $subcategoria.closest('.categorias > li');
			var categoria = $categoriaPadre.attr('data-filter');
			var subcategoria = $subcategoria.attr('data-filter');

			// Obtener el filtro actual
			var filtro = categoria + subcategoria;

			// Verificar si la subcategoría seleccionada es la misma que la subcategoría vacía
			var subcategoriaVacia = '.categoria' + categoria;
			var esSubcategoriaVacia = (subcategoria === subcategoriaVacia);

			if (esSubcategoriaVacia) {
				// Si la subcategoría seleccionada es la subcategoría vacía, se establece el filtro solo con la categoría
				filtro = categoria;
			} else {
				// Si se selecciona una subcategoría diferente, se agrega la clase 'active' a la categoría padre
				$categoriaPadre.addClass('active');
			}

			// Filtrar los elementos según la selección de categoría y subcategoría
			$grid.isotope({ filter: filtro });

			// Actualizar el filtro actual
			filtroActual = filtro;
		});
	});

</script>
@endsection
