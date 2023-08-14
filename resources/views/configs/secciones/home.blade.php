@extends('layouts.admin')

@section('cssExtras')

<style>

	.slider-container {
		position: relative;
		margin-top: -1px;
		overflow: hidden;
	}

	.slider-dots-container {
		position: absolute;
		left: 0;
		
		transform: translateX(-50%);
		top: 10%;
		transform-origin: top;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		z-index: 1;
	}

	.slider-dots {
		display: flex;
		flex-direction: column;
		list-style: none;
		margin: 0;
		padding: 0;
	}

	.slider-dots li {
		margin-bottom: 10px;
	}

	.slider-dots button {
		width: 24px;
		height: 24px;
		border-radius: 50%;
		background-color: transparent;
		border: 3px solid white;
		cursor: pointer;
	}   

	.slider-dots button.slick-active {
		background-color: white;
	}

	/* Para navegadores WebKit */
	.scroll-1::-webkit-scrollbar {
		width: 12px; /* Cambia el ancho de la barra de desplazamiento */
		background-color: transparent; /* Establece el fondo de la barra de desplazamiento como transparente */
	}

	.scroll-1::-webkit-scrollbar-thumb {
		background-color: transparent; /* Establece el color del pulgar de la barra de desplazamiento como transparente */
	}

	.textt {
		margin-top: -60px;
	}

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
	/*  Píxeles	REM
		1px	0.06rem */
	/*  REM	Píxeles
		0.01rem	0.16px */

	.image-container {
		width: 100%;
		padding-bottom: 75%; /* Proporción de aspecto de la imagen (por ejemplo, 4:3 = 75%) */
		background-size: cover;
		background-position: center;
	}

   @media(min-width: 1800px) {
		.slider-dots-container {
			left: 130px;
			bottom: 210px;
		}

		.slider_pri-img {
			height: 55rem; 
		}

		.titulo-slider-pri {
			font-size: 80px;
		}

		.fondo-azul {
			background-color: #1B44DD; 
			height: 940px;
			border-bottom-right-radius: 360px;
		}

		.margen-dots-container {
			margin-left: 1400px;
		}

	}


	/* xxl */
	@media (min-width: 1400px) and (max-width: 1799px) {
		.slider-dots-container {
			left: 130px;
			bottom: 210px;
		}

		.slider_pri-img {
			height: 55rem; 
		}

		.titulo-slider-pri {
			font-size: 60px;
		}

		.fondo-azul {
			background-color: #1B44DD; 
			height: 660px; 
			border-bottom-right-radius: 360px;
		}

		.margen-dots-container {
			margin-left: 700px;
		}

	}

	/* xl */
	@media (min-width: 1200px) and (max-width: 1399px) {

		.slider-dots-container {
			left: 120px;
			bottom: 210px;
		}

		.slider_pri-img {
			height: 55rem; 
		}

		.titulo-slider-pri {
			font-size: 60px;
		}

		.fondo-azul {
			background-color: #1B44DD; 
			height: 700px; 
			border-bottom-right-radius: 360px;
		}

		.margen-dots-container {
			margin-left: 600px;
		}

	}

	/* lg */
	@media (min-width: 992px) and (max-width: 1199px) {
		
		.slider-dots-container {
			left: 120px;
			bottom: 120px;
		}

		.slider_pri-img {
			height: 44rem; 
		}

		.titulo-slider-pri {
			font-size: 40px;
		}

		.fondo-azul {
			background-color: #1B44DD; 
			height: 600px; 
			border-bottom-right-radius: 360px;
		}

		.margen-dots-container {
			margin-left: 800px;
		}

	}

	/* md */
	@media (min-width: 768px) and (max-width: 991px) {
		.apartado {
			margin-left: 1px;
		}

		.slider-dots-container {
			left: 120px;
			bottom: 50px;
		}

		.slider_pri-img {
			height: 34rem; 
		}

		.titulo-slider-pri {
			font-size: 40px;
		}

		.fondo-azul {
			background-color: #1B44DD; 
			height: 700px; 
			border-bottom-right-radius: 360px;
		}

		.margen-dots-container {
			margin-left: 600px;
		}

	}

	/* sm */
	@media (min-width: 576px) and (max-width: 767px) {
		.slider-dots-container {
			left: 110px;
			bottom: 15px;
		}

		.slider_pri-img {
			height: 27rem; 
		}

		.titulo-slider-pri {
			font-size: 20px;
		}

		.fondo-azul {
			background-color: #1B44DD; 
			height: 600px; 
			border-bottom-right-radius: 360px;
		}

		.margen-dots-container {
			margin-left: 400px;
		}

	}

	/* xs */
	@media (min-width: 0px) and (max-width: 575px) {
		.slider-dots-container {
			left: 70px;
			bottom: 8px;
		}

		.slider_pri-img {
			height: 20rem; 
		}

		.fondo-azul {
			background-color: #1B44DD; 
			height: 400px; 
			border-bottom-right-radius: 360px;
		}
		
		.margen-dots-container {
			margin-left: 300px;
		}

	}

    .cuadro:hover {
        background-color: black; opacity: 80%;
    }

    .cuadro:hover > .btn {
        display: block;
        color: black;
        background-color: white;
        opacity: 100%;
    }

    .cuadro:hover > .btn:hover {
        display: block;
        color:black;
        background-color: red;
        opacity: 100%;
    }

    .cuadro > .btn {
        display: none;
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

    
<div class="container-fluid border-0 px-0">
	<div class="row">
		<div class="col">

			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center flex-column mt-2 text-center">
					<h3 class="fs-1 fw-bolder" style="color:black; font-family: Arial, sans-serif;">Agregar slider</h3>
					<form id="form_image_slider" action="imgSider" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
						@csrf
						<input id="input_slider_img" class="m-0 p-0" type="file" name="archivo">
						<label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_img" style="opacity: 100%; !important; border-radius: 26px; background-color: #44B2E3;">Seleccionar archivo</label>
					</form>
				</div>
			</div>
			
			<div class="slider-container px-0">
				
				<div class="slider px-0">

					@foreach ($slider_principal as $spd)
					<div class="col position-relative">
						<div class="slider_pri-img" style="
							background-image: url('{{ asset('img2/photos/slider_principal/'.$spd->imagen) }}');
							background-repeat: no-repeat;
							background-size: cover;
							background-position: center center;
							width: 100%;
						"></div>
						<div class="col-xxl-9 col-xl-9 col-lg-9 col-md-6 col-sm-6 col-xs-6 col-6 position-absolute py-1 px-0 top-50 start-0">
							<div class="row">
								<div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-11 col-xs-11 mx-2"></div>
								<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
									<div class="row">
										<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-9 col-xs-9 col-9 position-relative mx-auto titulo-slider-pri fw-bolder scroll-1 text-white textt" style="overflow: auto; max-height: 300px; line-height: 1;">
											<textarea class="form-control fs-2 fw-bolder text-white bg-transparent text-start editarajax m-0 titulo display-1" id="aux" rows="3" name="" data-id="{{ $spd->id }}" data-table="SSliderPrincipal" data-campo="titulo"> {{ $spd->titulo }} </textarea>
											<div class="col-6 position-absolute top-0 start-0 translate-middle-y" style="z-index: 999;">
												<div uk-icon="icon: pencil; ratio: 1.4;"></div>
											</div>
										</div>
									</div>
									<div class="row mt-5">
										<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-9 col-xs-9 col-9 mx-auto text-white scroll-1" style="overflow: auto; max-height: 70px;">
											<a href="#/" class="btn btn-outline text-white" style="background-color: #00AD61; border-radius: 32px;"><span class="fs-2 px-xxl-5 px-xl-5 px-lg-5 px-md-5 px-sm-3 px-xs-3 px-3">TIENDA</span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-1 py-3 position-absolute top-0 end-0">
							<form action="{{ route('config.seccion.delSide', [$spd->id]) }}" method="POST" style="display: inline;">						
								@csrf
								@method('DELETE') 
								<button type="submit" class="btn btn-danger btn-block bg-danger rounded-pill"><i class="fas fa-trash"></i></button>
							</form>
						</div>
					</div>
					@endforeach

					
				
					
					
						
				</div>
				<div class="slider-dots-container margen-dots-container">
					<ul class="slider-dots"></ul>
						</div>
					</div>
				</div>      
			</div>
		</div>
	</div>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-11 mx-auto position-relative">
			<div class="row">
				
				@foreach ($soluciones as $slt)
				@if ($slt->inicio == 1)
				<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-11 col-sm-11 col-xs-11 col-11 mx-auto py-5">
					<div class="card cardo border carta px-2" style="
						background-image: url('{{ asset('img2/photos/soluciones/'.$slt->imagen) }}');
						background-size: cover;
						background-repeat: no-repeat;
						background-position: center center;
						width: 100%;
					">
						<div class="overlay">
							<div class="card cardo border carta px-2" style="background-color:#1B44DD;">
								<div class="card-title cardo-title col-11 mx-auto fs-2 mt-3 fw-bolder">
									<span class="text-white">{{ $slt->titulo }}</span>
								</div>
								<div class="card-body cardo-body">
									<div class="row">
										<div class="col-9 mx-1" style="line-height: 1;">
											{{ $slt->descripcion }}
										</div>
									</div>
									<div class="row mt-2">
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
							Impermeabilizantes
						</div>
						<div class="card-body">

						</div>
					</div>
				</div>
				@endif
				@endforeach

				
				
				


			</div>

            <div class="col position-absolute top-0 bottom-0 start-0 cuadro d-flex align-items-center text-center flex-column justify-content-center">
                <a href="{{ route('config.seccion.show', ['slug' => 'solutios']) }}" class="btn bg-white text-center">
                    Editar desde la sección "soluciones"
                </a>
            </div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col text-center fs-2" style="color: #1B44DD;">
			PRODUCTOS
		</div>
	</div>
	<div class="row">
		<div class="col text-center display-4 fw-bold" style="color: #00AD61;">
			Destacados
		</div>
	</div>
	<div class="row py-4">
		<div class="col-4 border border-3"></div>
		<div class="col-4" style="border: 3px solid #1B44DD;"></div>
		<div class="col-4 border border-3"></div>
	</div>
	<div class="row">
		<div class="col-md-11 mx-auto py-5 position-relative">
			<div class="row">
				<div class="productos">

					@foreach ($productos as $prod)
						@if($prod->inicio == 1)
						<div class="col-md-3 px-3">
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
														<a href="#/">
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
										{{ $prod->precio }}
									</div>
								</div>
							</div>
						</div>
					</div>
						@endif
					@endforeach

				</div>
			</div>

            <div class="col position-absolute top-0 bottom-0 start-0 cuadro d-flex align-items-center text-center flex-column justify-content-center">
                <a href="{{ route('config.seccion.show', ['slug' => 'store']) }}" class="btn bg-white text-center">
                    Editar desde la sección "Tienda"
                </a>
            </div>
		</div>
	</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col position-relative">

        <div class="row">
		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-10 col-xs-9 col-9 position-relative">
			<div class="row">
				<div class="col-md-9 fondo-azul" style="">
				</div>
			</div>
			<div class="col-xxl-10 col-xl-10 col-lg-9 col-md-9 col-sm-11 col-xs-10 col-12 position-absolute top-50 start-50 translate-middle" style="margin-left: 60px;">
				<img src="{{ asset('img/design/nosotros.png') }}" alt="" style="border-radius: 66px;">
			</div>
		</div>
		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12  mt-5">
			<div class="row">
			<div class="col-10 mx-auto mt-5">
				<div class="row mt-1">
					<div class="col mt-5 display-1 fw-bold" style="color: #1B44DD;">
						Nosotros
					</div>
				</div>
				<div class="row">
					<div class="col-xxl-10 col-xl-12 col-lg-10 col-md-10 col-sm-12 col-xs-12 col-12 fs-5 py-3 text-black" style="line-height: 1;">
						<p>Somos una empresa 100% mexicana dedicada a la comercialización de productos de impermeabilizante ofreciendo soluciones integrales por problemas de humedades</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi atque maiores incidunt consequatur ad, eligendi quam cumque! Explicabo ab, vel sit tempore, odio minima veniam nobis reiciendis rem repudiandae suscipit.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-6 py-3">
						<a href="#/" class="btn btn-outline w-100 fs-3 py-3 text-white" style="background-color: #00AD61; border-radius: 32px;">VER MÁS</a>
					</div>
				</div>
			</div>
			</div>
		</div>
		
	</div>

            <div class="col position-absolute top-0 bottom-0 start-0 cuadro d-flex align-items-center text-center flex-column justify-content-center">
                <a href="{{ route('config.seccion.show', ['slug' => 'solutios']) }}" class="btn bg-white text-center">
                    Editar desde la sección "Nosotros"
                </a>
            </div>
        </div>
    </div>
	
</div>

<div class="container-fluid mt-5 mb-2">
	<div class="row mt-5">
		<div class="col mt-5 py-5 position-relative" style="background-color: #00AD61;">
			<div class="row py-3">
				<div class="col-xxl-8 col-xl-9 col-lg-9 col-md-9 col-sm-11 col-xs-11 col-11 mx-auto text-white display-2 fw-bold">
					Contacto
				</div>
			</div>
			<div class="row">
				<div class="col-xxl-8 col-xl-9 col-lg-9 col-md-9 col-sm-11 col-xs-11 col-11 mx-auto">
					<div class="row">
						<div class="col-xxl-6 col-xl-6 col-lg-11 col-md-12 col-sm-12 col-12  mt-4">
							<div class="row">
								<div class="col-xxl-11 col-xl-11 col-lg-11 col-md-12 col-sm-12 col-xs-12 col-12 py-2 bg-white" style="border-radius: 32px;">
									<div class="row">
										<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-3 col-sm-3 col-xs-3 col-4 text-center">
											<label for="nombre" class="fs-3 form-control border-0" style="color:#00AD61;">
												Nombre
											</label>
										</div>
										<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-9 col-8 text-start" style="border-left: 2px solid #00AD61;">
											<input type="text" name="nombre" class="form-control border-0 fs-3" style="box-shadow: none; color:#00AD61;">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-6 col-xl-6 col-lg-11 col-md-12 col-sm-12 col-xs-12 col-12 mt-4">
							<div class="row">
								<div class="col-xxl-12 col-xl-12 col-lg-11 col-md-12 col-sm-12 col-xs-12 col-12 py-2 bg-white" style="border-radius: 32px;">
									<div class="row">
										<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-3 col-sm-3 col-xs-3 col-4  text-center">
											<label for="correo" class="fs-3 form-control border-0" style="color:#00AD61;">
												Correo
											</label>
										</div>
										<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-9 col-8  text-start" style="border-left: 2px solid #00AD61;">
											<input type="text" name="correo" class="form-control border-0 fs-3" style="box-shadow: none; color:#00AD61;">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row py-xxl-5 py-xl-5 py-lg-4 py-md-4 py-sm-4 py-xs-4 py-4">
				<div class="col-xxl-8 col-xl-9 col-lg-9 col-md-9 col-sm-11 col-xs-11 col-11 mx-xxl-auto mx-xl-auto mx-lg-auto mx-md-auto mx-sm-auto mx-xs-auto mx-auto ">
					<div class="row">
						<div class="col py-2 bg-white" style="border-radius: 32px;">
							<div class="row">
								<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-4 text-center">
									<label for="mensaje" class="fs-3 form-control border-0" style="color:#00AD61;">
										Mensaje
									</label>
								</div>
								<div class="col-xxl-9 col-xl-9 col-lg-8 col-md-9 col-sm-9 col-xs-8 col-8" style="border-left: 2px solid #00AD61;">
									<input type="text" name="mensaje" class="form-control border-0 fs-3" style="box-shadow: none; color:#00AD61;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xxl-8 col-xl-9 mx-auto">
					<div class="row">
						<div class="col-xxl-4 col-xl-3 col-lg-3 col-md-6 mx-auto text-center">
							<a href="#/" class="btn w-100 btn-outline py-3 fs-3 text-white" style="background-color: #1B44DD; border-radius: 32px; text-decoration: none;">ENVIAR</a>
						</div>
					</div>
				</div>
			</div>
            
            <div class="col position-absolute top-0 bottom-0 start-0 cuadro d-flex align-items-center text-center flex-column justify-content-center">
                <a href="{{ route('config.seccion.show', ['slug' => 'solutios']) }}" class="btn bg-white text-center">
                    No es editable
                </a>
            </div>
            
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 d-flex justify-content-center align-items-center flex-column mt-2 text-center">
			<h3 class="fs-1 fw-bolder" style="color:black; font-family: Arial, sans-serif;">Agregar logo</h3>
			<form id="form_image_slider2" action="{{ route('config.seccion.clientesSide') }}" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
				@csrf
				<input id="input_slider_img2" class="m-0 p-0" type="file" name="archivo">
				<label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_img2" style="opacity: 100%; !important; border-radius: 26px; background-color: #44B2E3;">Seleccionar archivo</label>
			</form>
		</div>
	</div>
	<div class="row py-5">
		<div class="col-11 py-5 mx-auto">
			<div class="row">
				<div class="clientes">

					@foreach ($clientes as $clie)
					<div class="col position-relative">
						<div style="
							background-image: url('{{ asset('img2/photos/clientes/'.$clie->imagen) }}');
							background-size: contain;
							background-position: center center;
							background-repeat: no-repeat;
							height: 120px;
							width: 100%;
						"></div>
						<div class="col-4 py-3 position-absolute top-0 end-0">
							<form action="{{ route('config.seccion.delCliente', [$clie->id]) }}" method="POST" style="display: inline;">						
								@csrf
								@method('DELETE') 
								<button type="submit" class="btn btn-danger btn-block bg-danger rounded-pill"><i class="fas fa-trash"></i></button>
							</form>
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
		var slider = $('.slider');

		slider.slick({
			// Opciones del slider
			arrows: false,
			vertical: false,
			verticalSwipping: false,
		});

		var dotsContainer = $('.slider-dots');
		var slideCount = slider.slick('getSlick').slideCount;

		for (var i = 0; i < slideCount; i++) {
			dotsContainer.append('<li><button></button></li>');
		}

		var dots = dotsContainer.find('button');

		dots.click(function() {
			var index = $(this).parent().index();
			slider.slick('slickGoTo', index);
		});

		slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
			dotsContainer.find('li').removeClass('slick-active');
			dotsContainer.find('li').eq(nextSlide).addClass('slick-active');
		});

		slider.on('afterChange', function(event, slick, currentSlide) {
			dots.removeClass('slick-active');
			dots.eq(currentSlide).addClass('slick-active');
		});
	});
</script>
<script>
	$('.productos').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	]
	});
</script>
<script>
	$('.clientes').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	]
	});
</script>
<script>
	$('#input_slider_img').change(function(e) {
		$('#form_image_slider').trigger('submit');
	});

	$('#input_slider_img2').change(function(e) {
		$('#form_image_slider2').trigger('submit');
	});
</script>
@endsection
