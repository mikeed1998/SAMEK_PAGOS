@extends('layouts.admin')

@section('cssExtras')
<style>
        .carta {
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 0px;
            height: 334px;
            width: 100%; 
        }

        .cardo {
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: white;
            background-color: rgba(0, 0, 0, 0.5); /* Ajusta la opacidad según tus necesidades */
            z-index: 0;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 0px;
        }

        .cardo:hover .overlay {
            opacity: 1;
        }

        .cardo:hover .overlay > .textt {
            display: none;
			
        }

        .cardo-title, .cardo-body, .cardo-title {
            position: relative;
            z-index: 999;
            color: white; /* Fuente de color blanco */
        }

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
    /* input con opacidad y sin boton de selecciond e archivo */
		.file-upload input[type="file"] {
                    position: absolute;
                    left: -9999px;
                    }

                    .file-upload label {
                    display: inline-block;
                    background-color: #00000031;
                    color: #fff;
                    padding: 6px 12px;
                    cursor: pointer;
                    border-radius: 4px;
                    font-weight: normal;
                    opacity: 0%;
                    }

                    .file-upload input[type="file"] + label:before {
                    content: "\f07b";
                    font-family: "Font Awesome 5 Free";
                    font-size: 16px;
                    margin-right: 5px;
                    transition: all 0.5s;
                    }

                    .file-upload input[type="file"] + label {
                        transition: all 0.5s;
                    }

                    .file-upload input[type="file"]:focus + label,
                    .file-upload input[type="file"] + label:hover {
                    backdrop-filter: blur(5px);
                    background-color: #41464a37;
                    opacity: 100%;
                    transition: all 0.5s;
                    }
    /* input con opacidad y sin boton de selecciond e archivo */
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



    <div class="container-fluid" style="box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.1);">
	<div class="row">
		<div class="col text-center display-1 fw-bold" style="color: #00AD61;">
			Soluciones
		</div>
	</div>
	<div class="row py-4">
		<div class="col-4 border border-3"></div>
		<div class="col-4" style="border: 3px solid #1B44DD;"></div>
		<div class="col-4 border border-3"></div>
	</div>
	<div class="row">
		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-11 col-xs-11 col-11 position-relative text-center mx-auto">
			<textarea class="form-control border border-dark bg-transparent text-start editarajax m-0 titulo" id="aux" rows="4" name="" data-id="{{ $elements[2]->id }}" data-table="Elemento" data-campo="texto"> {{ $elements[2]->texto }} </textarea>
			<div class="col-12 text-center position-absolute top-0 start-100 translate-middle">
				<div uk-icon="icon: pencil; ratio: 2;"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col mt-5 text-center">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
				Agregar solución
  			</button>
  
  			<!-- Modal -->
  			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
	  				<div class="modal-content">
						<div class="modal-header">
		 	 				<h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva Solución</h1>
		  					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
		  					<form action="{{ route('config.seccion.solucionesSide') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="form-group row">
									<div class="col-9 mx-auto">
										<label for="titulo">Titulo</label>
										<input type="text" name="titulo" class="form-control" placeholder="Titulo de la solución" required>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-9 mx-auto">
										<label for="descripcion">Descripción</label>
										<textarea name="descripcion" id="" cols="30" rows="10" class="form-control" placeholder="Descripción de la solución"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-9 mx-auto">
										<input type="file" name="imagen" class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-9 mx-auto">
										<input type="submit" class="btn btn-outline border" value="Agregar solución">
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
		  					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						</div>
	  				</div>
				</div>
  			</div>
		</div>
	</div>

	<div class="row py-5">
		<div class="col-11 mx-auto">
			<div class="row">
				
				@foreach ($soluciones as $slt)
				<div class="col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-11 col-xs-11 col-11 mx-auto py-5 position-relative">
					<div class="card cardo border carta px-2" style="
						background-image: url('{{ asset('img2/photos/soluciones/'.$slt->imagen) }}');
						background-size: cover;
						background-repeat: no-repeat;
						background-position: center center;
						width: 100%;
					">
						<div class="overlay">
							<div class="card cardo  carta px-2" style="background-color:#1B44DD;">
								<div class="card-title cardo-title col-11 position-relative mx-auto fs-2 mt-3 fw-bolder text-white">
									<span class="text-white border-bottom border-white">
										<textarea class="form-control bg-transparent border-0 fs-2 mt-3 text-start text-white editarajax m-0 titulo" style="border-bottom: 2px solid white; " id="aux" rows="1" name="" data-id="{{ $slt->id }}" data-table="SSoluciones" data-campo="titulo"> {{ $slt->titulo }} </textarea>
									</span>
									<div class="col position-absolute top-0 start-50 translate-middle-y">
										<div uk-icon="icon: pencil; ratio: 2;"></div>
									</div>
								</div>
								<div class="card-body cardo-body">
									<div class="row">
										<div class="col-9 position-relative mx-1" style="line-height: 1;">
											<textarea class="form-control border border-white bg-transparent text-start text-white editarajax m-0 titulo" id="aux" rows="4" name="" data-id="{{ $slt->id }}" data-table="SSoluciones" data-campo="descripcion"> {{ $slt->descripcion }} </textarea>
											<div class="col position-absolute top-0 start-100">
												<div uk-icon="icon: pencil; ratio: 2;"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 text-end">
											<a href="#/">
												<img src="{{ asset('img/design/mision.png') }}" alt="" class="img-fluid">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- Overlay -->
						<div class="card-title col-11 mx-auto fs-2 mt-3 fw-bolder textt" style="color: #1B44DD;">
							{{ $slt->titulo }}
						</div>
						<div class="card-body">

						</div>
					</div>
					<div class="col-4 py-3 position-absolute top-0 end-0">
						<form action="{{ route('config.seccion.delSolucion', [$slt->id]) }}" method="POST" style="display: inline;">						
							@csrf
							@method('DELETE') 
							<button type="submit" class="btn btn-danger btn-block bg-danger rounded-pill"><i class="fas fa-trash"></i></button>
						</form>
					</div>
					<div class="col-4 py-3 position-absolute top-0 start-0">
						<form action="{{ route('config.seccion.switchHome', ['modelo' => $slt->id, 'tipo' => 'solution']) }}" method="POST">
							@csrf
							@method('PUT')
							<input type="hidden" name="tipo_modelo" value="solucion">
							@if ($slt->inicio == 0)
								<input type="hidden" name="switch_o" value="1">
								<button type="submit" id="mostrarInicioBtn-{{ $slt->id }}" data-modelo="{{ $slt->id }}" class="btn btn-danger btn-block rounded-pill">Mostrar en inicio</button>
							@else
								<input type="hidden" name="switch_o" value="0">
								<button type="submit" id="mostrarInicioBtn-{{ $slt->id }}" data-modelo="{{ $slt->id }}" class="btn btn-success btn-block rounded-pill">Quitar de inicio</button>	
							@endif
						</form>
					</div>
					<div class="col-2 position-absolute bottom-0 start-50 translate-middle">
						
						<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdroppp-{{ $slt->id }}">
							<div uk-icon="icon: camera; ratio: 2;"></div>
  						</button>
  
  						
					</div>
					<!-- Modal -->
					<div class="modal fade" id="staticBackdroppp-{{ $slt->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelp-{{ $slt->id }}" aria-hidden="true">
						<div class="modal-dialog">
							  <div class="modal-content">
								<div class="modal-header">
									  <h1 class="modal-title fs-5" id="staticBackdropLabelp-{{ $slt->id }}">Cambiar imágen</h1>
									  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<h4>Solución: {{ $slt->titulo }}</h4>
									<form action="{{ route('config.seccion.imgSolucion', ['solucion' => $slt->id]) }}" method="POST" class="mt-5" enctype="multipart/form-data">
									@csrf
									@method('PUT')
										<input type="hidden" name="tipo" value="solucion">
										<div class="form-group row">
											<div class="col">
												<input type="file" name="imagen_nueva" class="form-control" required>
												<input type="submit" class="btn-block btn-secondary" value="Cambiar Imágen">
											</div>
										</div>
									</form>
								<!-- Button trigger modal -->
								</div>
								<div class="modal-footer">
									  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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

@endsection

@section('jsLibExtras2')

@endsection

@section('jqueryExtra')
<script>
	$(document).ready(function() {
		// Inicializar todos los switches de Bootstrap
		$('[id^="mostrarInicioBtn"]').bootstrapSwitch();
	
		// Manejar clic en el botón para mostrar en inicio
		$(document).on('click', '[id^="mostrarInicioBtn"]', function(e) {
			e.preventDefault(); // Evitar el envío predeterminado del formulario
			var modeloId = $(this).data('modelo');
			var switchValue = $(this).bootstrapSwitch('state');
			enviarSolicitudAjax(modeloId, switchValue);
		});
	
		// Manejar clic en el botón para quitar de inicio
		$(document).on('click', '[id^="quitarInicioBtn"]', function(e) {
			e.preventDefault(); // Evitar el envío predeterminado del formulario
			var modeloId = $(this).data('modelo');
			var switchValue = $(this).bootstrapSwitch('state');
			enviarSolicitudAjax(modeloId, switchValue);
		});
	
		// Función para enviar la solicitud Ajax al servidor
		function enviarSolicitudAjax(modeloId, switchValue) {
			$.ajax({
				type: 'PUT',
				url: '/switchHome/' + modeloId + '/solution',
				data: {
					_token: '{{ csrf_token() }}',
					switch_o: switchValue ? 1 : 0 // Convertir el valor del switch a 0 o 1
				},
				success: function(response) {
					// La solicitud se ha procesado con éxito
					// Puedes realizar acciones adicionales aquí si es necesario
					// Por ejemplo, actualizar el botón o mostrar una notificación
					// alert('La solicitud se ha procesado con éxito');
				},
				error: function(error) {
					// Hubo un error al procesar la solicitud
					// Puedes manejar el error aquí si es necesario
					// alert('Error al procesar la solicitud');
				}
			});
		}
	});
</script>


	

@endsection
