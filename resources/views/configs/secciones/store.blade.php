@extends('layouts.admin')

@section('cssExtras')
<!-- Incluye la librería SweetAlert -->
<script src="ruta/a/sweetalert.min.js"></script>
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
@endsection

@section('jsLibExtras')

@endsection

@section('styleExtras')

@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="container-fluid" style="box-shadow: inset 0 0 40px rgba(0, 0, 0, 0.1);">
		<div class="row">
			<div class="col-3 border border-dark py-5 text-center">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary fs-5 fw-bolder" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
					Administrar categorías
  				</button>
  
  				<!-- Modal -->
  				<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl">
	  					<div class="modal-content">
							<div class="modal-header">
		 	 					<h1 class="modal-title fs-1 text-center" id="staticBackdropLabel">Categorías y Subcategorías</h1>
		  						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
		  						<div class="row">
									<div class="col-6">
										<div class="accordion" id="accordionExample">
											@foreach ($categorias as $cat)
												<div class="accordion-item">
													<h2 class="accordion-header">
												  	<button class="accordion-button border" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $cat->id }}" aria-expanded="true" aria-controls="collapse-{{ $cat->id }}">
														
														<textarea class="form-control text-start bg-transparent border-dark fs-5 editarajax m-0" id="" rows="1" name="texto" data-id="{{ $cat->id }} " data-table="SCategoria" data-campo="categoria">{{ $cat->categoria }} </textarea>  
		
														<form action="{{ route('config.seccion.delCategoriaSide', ['categoria' => $cat->id]) }}" method="POST" style="display: inline;" id="formu-{{ $cat->id }}">						
															@csrf
															@method('DELETE') 
															<button type="submit" class="btn btn-danger bg-danger rounded-pill" onclick="eliminar(event, {{ $cat->id }})"><i class="fas fa-trash"></i></button>
														</form>

												  	</button>
												</h2>
												<div id="collapse-{{ $cat->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
												  	<div class="accordion-body">
														<ul class="list-group">
															@foreach ($subcategorias as $subcat)
																@if ($subcat->categoria == $cat->id)
																	<li class="list-group-item">
																		<div class="row">
																			<div class="col-6 fs-5 text-start">
																				
																				<textarea class="form-control text-start bg-transparent border-dark fs-5 editarajax m-0" id="" rows="1" name="texto" data-id="{{ $subcat->id }} " data-table="SSubCategoria" data-campo="subcategoria">{{ $subcat->subcategoria }} </textarea>  
																			
																			</div>
																			<div class="col-6 text-end">
																				<form action="{{ route('config.seccion.delSubCategoriaSide', ['subcategoria' => $subcat->id]) }}" method="POST" style="display: inline;" id="formu2-{{ $cat->id }}-{{ $subcat->id }}">						
																					@csrf
																					@method('DELETE') 
																					<button type="submit" class="btn btn-danger bg-danger rounded-pill" onclick="eliminarSubcategoria(event, '{{ $cat->id }}', '{{ $subcat->id }}')"><i class="fas fa-trash"></i></button>
																				</form>
																			</div>
																		</div>
																		
																		
																	</li>
																@endif	
															@endforeach
														</ul>
													</div>
												</div>
										  	</div>
											@endforeach
										</div>
									</div>
									<div class="col-6">
										<div class="row">
											<div class="col-9 mx-auto fs-5">
												<form action="{{ route('config.seccion.categoriaSide') }}" method="POST">
													@csrf
													<div class="row py-2 border">
														<div class="col-12">
															Agregar Categoría
														</div>
														<div class="col-12 py-2">
															<input type="text" name="categoria" class="form-control" placeholder="Nombre de la categoría" required>
														</div>
														<div class="col-12">
															<input type="submit" class="btn btn-primary" value="Agregar nueva categoría">
														</div>
													</div>
												</form>
											</div>
										</div>
										<div class="row">
											<div class="col-9 mx-auto fs-5 mt-3">
												<form action="{{ route('config.seccion.subCategoriaSide') }}" method="POST">
													@csrf
													<div class="row py-2 border">
														<div class="col-12">
															Agregar Subcategoría
														</div>
														<div class="col-12 py-2">
															@if ($contCat != 0)
																<input type="text" name="subcategoria" class="form-control" placeholder="Nombre de la subcategoria" required>
															@else
																<input type="text" name="subcategoria" class="form-control" placeholder="Nombre de la subcategoria" required disabled>
															@endif
														</div>
														<div class="col-12 py-2">
															<label for="categoria_padre">Asignar categoría (disponibles)</label>
															<select name="categoria_padre" class="form-control" id="">
																@if ($contCat != 0)
																	@foreach ($categorias as $cat_aux)
																		<option value="{{ $cat_aux->id }}" required>{{ $cat_aux->categoria }}</option>
																	@endforeach
																@else
																	<option value="0" disabled>No hay categorias disponibles</option>
																@endif
																
															</select>
														</div>
														<div class="col-12">
															@if ($contCat != 0)
																<input type="submit" class="btn btn-primary" value="Agregar nueva categoría">
															@else
																<input type="submit" class="btn btn-primary" value="Agrega al menos una categoria" disabled>
															@endif
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
				  				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
							</div>
	  					</div>
					</div>
  				</div>
			</div>
			<div class="col-9 border border-dark py-5 text-center">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary fs-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
					Crear nuevo producto
  				</button>
  
  				<!-- Modal -->
  				<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
					<div class="modal-dialog modal-xl">
	  					<div class="modal-content">
							<div class="modal-header">
		 	 					<h1 class="modal-title fs-1" id="staticBackdropLabel2">Nuevo producto</h1>
		  						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
		  						<div class="row">
									<div class="col">
										<form action="{{ route('config.seccion.productoSide') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="form-group row">
												<div class="col-10 mx-auto text-start">
													<label for="nombre" class="fs-5">Nombre del producto</label>
													<input type="text" name="nombre" class="form-control border border-dark fs-5" placeholder="Nombre" required>
												</div>
												<div class="col-10 py-3 mx-auto text-start">
													<label for="descripcion">Descripción</label>
													<textarea name="descripcion" id="" cols="30" rows="20" class="form-control border border-dark texteditor fs-5" placeholder="Descripción del producto" style="max-height: 200px;"></textarea>
												</div>
												<div class="col-10 py-3 mx-auto text-start">
													<label for="precio" class="fs-5">Precio</label>
													<input type="text" name="precio" class="form-control border border-dark fs-5" placeholder="Precio del producto">
												</div>
												<div class="col-10 py-3 mx-auto text-start">
													<label for="imagen" class="fs-5">Imagen del producto</label>
													<input type="file" name="imagen" class="form-control border border-dark fs-5">
												</div>
												<div class="col-10 mx-auto text-start">
													@if ($contCat != 0)
														<select name="subcate" class="form-control border border-dark fs-5">
															@foreach ($categorias as $cat_axu)
																@if ($contSubC != 0)
																	@foreach ($subcategorias as $su_c)
																		@if ($su_c->categoria == $cat_axu->id)
																			<option value="{{ $su_c->id }}_{{ $cat_axu->id }}" class="fs-5">{{ $cat_axu->categoria }} - {{ $su_c->subcategoria }}</option>
																		@endif
																	@endforeach
																@else
																	<option value="0" class="fs-5">Asegurate de agregar subcategorias para poder crear productos</option>
																@endif
															@endforeach
														</select>
														<small>Asegurate de agregar subcategorias, de lo contrario no podrás agregar productos en la categoria deseada</small>
													@else

													@endif
												</div>
												<div class="col-10 mx-auto text-start">
													<input type="submit" class="btn btn-primary" value="Crear producto">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="modal-footer">
				  				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
	  					</div>
					</div>
  				</div>
			</div>
		</div>
	</div>

    <div class="container-fluid mb-5" style="box-shadow: inset 0 0 40px rgba(0, 0, 0, 0.1);">
	<div class="row">
		<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5 col-sm-12 col-xs-12 col-12 mx-auto py-5">
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

					@foreach ($categorias as $catcat)
						<li data-filter=".categoria{{ $catcat->id }}" style="list-style-type: none;">
							<a class="categoria cate-style fw-bolder text-center accordion-link" href="#" style="color: #2244D7;  text-decoration: none;"><p class="m-0 fs-4 fw-bold">{{ $catcat->categoria }}</p> <span class="icon icon-style" style="color: #00AD61;"><i class="fa-solid fa-plus"></i></span></a>
							<ul class="subcategorias" style="list-style-type: none;">
								<li data-filter=".categoria{{ $catcat->id }}">
									<a href="#" class="fs-4 fw-normal" style="color: black;">Todos</a>
								</li>
								@foreach ($subcategorias as $subsub)
									@if ($subsub->categoria == $catcat->id)
										<li data-filter=".categoria{{ $catcat->id }}.subcategoria{{ $subsub->id }}">
											<a href="#" class="fs-4 fw-normal text-dark" style="color: #2244D7;">
												{{ $subsub->subcategoria }}
											</a>
										</li>
									@endif
								@endforeach
							</ul>
						</li>
					@endforeach


					{{-- @for ($i = 1; $i < 7; $i++)
						<li data-filter=".categoria{{ $i }}" style="list-style-type: none;">
							<a class="categoria cate-style fw-bolder text-center accordion-link" href="#" style="color: #2244D7;  text-decoration: none;"><p class="m-0 fs-4 fw-bold">Categoría {{ $i }}</p> <span class="icon icon-style" style="color: #00AD61;"><i class="fa-solid fa-plus"></i></span></a>
							<ul class="subcategorias" style="list-style-type: none;">
								<li data-filter=".categoria{{ $i }}"><a href="#" class="fs-4 fw-normal" style="color: black;">Todos</a></li>
						@for ($j = 1; $j <= 4; $j++)
								<li data-filter=".categoria{{ $i }}.subcategoria{{ $j }}"><a href="#" class="fs-4 fw-normal text-dark" style="color: #2244D7;">Subcategoría {{ $j }}</a></li>
						@endfor
							</ul>
						</li>
					@endfor --}}

				
				</ul>
			</div>
		</div>
		<div class="col-xxl-9 col-xl-9 col-lg-8 col-md-7 col-sm-12 col-xs-12 col-12 mt-5 py-5">
			<div id="contenido">
				<div id="items-container">
					@foreach ($productos as $prod)
					
					<div class="col-4 px-3 mb-5 item categoria{{ $prod->categoria }} subcategoria{{ $prod->subcategoria }}">
						
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
										width: 100%;
									">
									
									</div>
									<div class="col-12 position-absolute top-0 bottom-0 start-0 px-2 producto">
										<div class="card h-100" style="border-top-left-radius: 18px; border-top-right-radius: 18px;">
											<div class="card-body py-5 d-flex align-items-center justify-content-center">
												<div class="row mt-5">
													<form action="{{ route('config.seccion.imgProducto', ['producto' => $prod->id]) }}" method="POST" enctype="multipart/form-data">
														@csrf
														@method('PUT')
														<input type="hidden" name="tipo" value="producto">
														<div class="form-group row">
															<div class="col">
																<input type="file" name="imagen_nueva" class="form-control" required>
																<input type="submit" class="btn-block btn-secondary" value="Cambiar Imágen">
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 text-end position-absolute top-0 start-50 translate-middle">
										<form action="{{ route('config.seccion.delProductoSide', ['producto' => $prod->id]) }}" method="POST" style="display: inline;" id="formu-{{ $prod->id }}">						
											@csrf
											@method('DELETE') 
											<button type="submit" class="btn btn-danger bg-danger rounded-pill"><i class="fas fa-trash fs-3"></i></button>
										</form>
									</div>
									<div class="col-6 py-3 position-absolute top-0 start-50 translate-middle">
										<form action="{{ route('config.seccion.switchHome', ['modelo' => $prod->id, 'tipo' => 'producto']) }}" method="POST">
											@csrf
											@method('PUT')
											<input type="hidden" name="tipo_modelo" value="producto">
											@if ($prod->inicio == 0)
												<input type="hidden" name="switch_o" value="1">
												<button type="submit" id="mostrarInicioBtn-{{ $prod->id }}" data-modelo="{{ $prod->id }}" class="btn btn-danger btn-block rounded-pill" style="font-size: 12px;">Mostrar en inicio</button>
											@else
												<input type="hidden" name="switch_o" value="0">
												<button type="submit" id="mostrarInicioBtn-{{ $prod->id }}" data-modelo="{{ $prod->id }}" class="btn btn-success btn-block rounded-pill" style="font-size: 12px;">Quitar de inicio</button>	
											@endif
										</form>
									</div>
								</div>   
							</div>     
							<div class="card-body border-top m-0">
								<div class="row">
									<div class="col-12 py-2 text-center fs-4 text-black">
										{{ $prod->nombre }}
									</div>
									<div class="col text-center fs-4 text-black">
										<div class="row">
											<div class="col-6 text-end">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-outline border" data-bs-toggle="modal" data-bs-target="#staticBackdrop-prod-{{ $prod->id }}">
													<span uk-icon="icon: pencil; ratio: 3;"></span>
  												</button>
  
  												<!-- Modal -->
  												<div class="modal fade" id="staticBackdrop-prod-{{ $prod->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-prod-{{ $prod->id }}" aria-hidden="true">
													<div class="modal-dialog modal-xl">
	  													<div class="modal-content">
															<div class="modal-header">
							  									<h1 class="modal-title fs-5" id="staticBackdropLabel-prod-{{ $prod->id }}">Modificando producto</h1>
	  															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body text-start">
		  														<div class="row">
																	<div class="col-9 py-3 mx-auto">
																		<label for="">Cambiar nombre</label>
																		<textarea class="form-control text-start bg-transparent border-dark fs-5 editarajax m-0" id="" rows="1" name="" data-id="{{ $prod->id }} " data-table="SProducto" data-campo="nombre">{{ $prod->nombre }} </textarea>  
																	</div>

																	<div class="col-9 py-3 mx-auto">
																		<form action="{{ route('config.seccion.textoProducto', ['producto' => $prod->id]) }}" method="POST" id="fomrm-{{ $prod->id }}">
																			@csrf
																			@method('PUT')
																			<label for="">Cambiar descripción</label>
																			<textarea class="form-control text-start bg-transparent border-dark fs-5 texteditor m-0" id="" rows="10" name="desc2" data-id="{{ $prod->id }} " data-table="SProducto" data-campo="descripcion">{!! $prod->descripcion !!} </textarea>  
																			<input type="submit" class="btn btn-secondary" value="Actualizar descripción">
																		</form>
																	</div>

																	<div class="col-9 py-3 mx-auto">
																		<label for="">Actualizar Precio</label>
																		<textarea class="form-control text-start bg-transparent border-dark fs-5 editarajax m-0" id="" rows="1" name="" data-id="{{ $prod->id }} " data-table="SProducto" data-campo="precio">{{ $prod->precio }} </textarea>  
																	</div>
																	<div class="col-9 py-3 mx-auto">
																		<form action="{{ route('config.seccion.categoriaProductoSide', ['producto' => $prod->id]) }}" method="POST" id="formunn-{{ $prod->id }}">
																			@csrf
																			@method('PUT')
																			<label for="">Cambiar categoría/subcategoria</label>
																			@if ($contCat != 0)
																				<select name="subcate2" class="form-control border border-dark fs-5">
																					@foreach ($categorias as $cat_axu)
																						@foreach ($subcategorias as $su_c)
																							@if ($su_c->categoria == $cat_axu->id)
																								<option value="{{ $su_c->id }}_{{ $cat_axu->id }}">{{ $cat_axu->categoria }} - {{ $su_c->subcategoria }}</option>
																							@endif
																						@endforeach
																
																					@endforeach
																				</select>
																			@else

																			@endif
																			<input type="submit" class="btn btn-outline mt-2 border border-dark text-center" value="Actualizar categoría/subcategoría">
																		</form>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
		  														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
															</div>
	  													</div>
													</div>
  												</div>
											</div>
											<div class="col-6 text-start">
												<a href="{{ route('config.seccion.galeriaSide', ['producto' => $prod->id]) }}" class="btn btn-outline border"><span uk-icon="icon: camera; ratio: 3;"></span></a>
											</div>
										</div>
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

@section('jsLibExtras2')

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

<script>
	function eliminar(event, categoriaId) {
	  // Evitar el envío del formulario de manera predeterminada
	  event.preventDefault();
	
	  // Mostrar una confirmación antes de eliminar
	  if (confirm('¿Estás seguro de que deseas eliminar esta categoría? Si eliminas una categoria, todas las subcategorias relacionadas a esta categoría también serán eliminadas y por jerarquía, todos los productos pertenecientes a cada subcategoria perteneciente a la categoría también serán eliminados.')) {
		// Si el usuario confirma, enviar el formulario para eliminar
		document.getElementById('formu-' + categoriaId).submit();
	  }
	}
</script>

<script>
	function eliminarSubcategoria(event, categoriaId, subcategoriaId) {
	  // Evitar el envío del formulario de manera predeterminada
	  event.preventDefault();
	
	  // Mostrar una confirmación antes de eliminar la subcategoría
	  if (confirm('¿Estás seguro de que deseas eliminar la subcategoría? Si eliminas una subcategoria, todos los produtos dependientes de esta también serán eliminados.')) {
		// Si el usuario confirma, enviar el formulario para eliminar la subcategoría
		document.getElementById('formu2-' + categoriaId + '-' + subcategoriaId).submit();
	  }
	}
	</script>
@endsection
