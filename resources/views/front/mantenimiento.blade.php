@extends('layouts.front')

@section('title', 'Mantenimiento')
{{-- @section('cssExtras')@endsection --}}
@section('styleExtras')
	<style media="screen">
		.butsub{
			background: #ffd401;
			color: black;
		}
		.bg-capaci{
			background: url('{{ asset('img/design/fondo-capacitacion.png') }}');
			background-size: cover;
			background-position-y: center;
		}

		@media (max-width: 992px){
			.bg-capaci{
				background-size: 0 0;
			}
		}
	</style>
@endsection
@section('content')

	<div class="container-fluid" style="background-color: #f5f5f5;">
		<h3 class="text-center" style="font-size: 30px;font-weight: 600;padding-top:100px!important">MANTENIMIENTOS DE MONTACARGAS</h3>
		<div class=" d-flex align-items-end justify-content-center" style="">
			<div class="col-md-6 pb-5" style="text-align: center; font-size:16px;line-height:1.2">{!!$elements[0]->texto !!}</div>
		</div>
		<div>
			<div class="row mx-auto" style="position:relative;z-index:2">
				<div class="col-12 col-lg-7">
					<img src="{{ asset('img/photos/seccions/'.$elements[2]->imagen)}}" alt="" class="img-fluid">
				</div>
			</div>
			<div class="row mx-auto p-0 m-0" style="margin-top:-140px!important;position:relative;z-index:1">
				<div class="col-12 offset-lg-5 col-lg-7 p-5 center-y-x" style="background-color:#fff;min-height:500px">
					<h3 class="text-right pt-5" style="font-size: 30px;font-weight: 600;padding-top:100px!important">MANTENIMIENTOS DE ELECTRICOS</h3>
					<p class="pb-5 pt-4" style="">
						{!! $elements[1]->texto !!}
					</p>
				</div>
			</div>
		</div>
		<div>
			<div class="row mx-auto pt-5" style="position:relative;z-index:2">
				<div class="col-12 col-lg-6 d-flex align-items-end justify-content-center"></div>
				<div class="col-12 col-lg-6">
					<img src="{{ asset('img/photos/seccions/'.$elements[4]->imagen)}}" alt="" class="img-fluid">
				</div>
			</div>
			<div class="row mx-auto py-5" style="margin-top:-180px!important;position:relative;z-index:1">
				<div class="col-12 col-lg-8 p-5 center-y-x" style="background-color:#fff;min-height:500px">
					<h3 class="text-left pt-5" style="font-size: 30px;font-weight: 600;padding-top:100px!important">MONTACARGAS DE COMBUSTIBLE</h3>
					<p class="pt-5">
						{!!$elements[3]->texto !!}
					</p>
				</div>
			</div>
		</div>
	</div>

	<section>
		<div style="background: url('{{asset('img/design/fondo-mantenimiento.png')}}'); background-size: cover;">
			<div class="container-fluid">
				<div class="row py-4">
					<div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
						<div class="text-white py-3" style="font-weight: 800; font-size: 1.3em;">CONTACTANOS PARA SABER MAS</div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="">
							<form class="col-9 mx-auto"  action="{{ route('formularioContac') }}" method="post">
								@csrf
								<div class="form-group">
									<input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp" style="border:solid 2px #000" placeholder="Nombre &nbsp;&nbsp;|" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="empresa" id="empresa" style="border:solid 2px #000" placeholder="Empresa &nbsp;|">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="ciudad" id="ciudad" style="border:solid 2px #000" placeholder="Ciudad &nbsp;&nbsp;&nbsp;&nbsp;|">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="telefono" id="telefono" style="border:solid 2px #000" placeholder="Teléfono &nbsp;&nbsp;|" required>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="correo" id="correo" style="border:solid 2px #000" placeholder="Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|" required>
								</div>
								<div class="form-group">
									<textarea class="form-control"  name="mensaje" id="mensaje" style="border:solid 2px #000;min-height:150px" placeholder="Mensaje &nbsp;&nbsp;|"></textarea>
								</div>
								<div class="form-group">
									<button class="btn butsub w-100" type="submit">Enviar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="bg-capaci">
			<div class="row mx-auto">
				<div class="col-12 col-lg-5 order-1 order-lg-0">
					<img src="{{ asset('img/design/personal-capacitado.png') }}" alt="" class="img-fluid">
				</div>
				<div class="col-12 col-lg-7 order-0 order-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start text-center text-lg-left my-3">
					<div>
						<h3 class="capacitacion-h3">CAPACITACIÓN</h3>
						<p class="capacitacion-p py-3">A OPERADORES  DE MONTACARGAS</p>
						<a href="{{ route('front.contacto','#contacto') }}"
						style="padding: .6em 1em;border: none; background-color: black; color: white; font-size: 1.2em; font-weight: bold;">
							Saber más
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

{{-- @section('jsLibExtras2')@endsection --}}
{{-- @section('jqueryExtra')@endsection --}}
