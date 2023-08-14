@extends('layouts.admin')

@section('cssExtras')
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
	<style media="screen">
		.cat{
			font-size: 1.3em;
		}
	</style>
	<div class="row mb-4 px-2">
		<a href="{{ route('productos.version.show',$variante->id) }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="col-12  mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{route('productos.version.update',$variante->id)}}" method="post">
					@csrf
					@method('put')
					<div class="row">
						<div class="form-group text-center col-12 col-lg-6">
							<label for="sku">SKU</label>
							<input type="text" name="sku" id="sku" class="form-control" value="{{ $variante->sku }}">
						</div>
						<div class="form-group text-center col-12 col-lg-6">
							<label for="modelo">Modelo</label>
							<input type="text" name="modelo" id="modelo" class="form-control" value="{{ $variante->modelo }}">
						</div>
						<div class="form-group text-center col-12 col-lg">
							<label for="stock">Stock</label>
							<input type="text" name="stock" id="stock" class="form-control" value="{{ $variante->stock }}">
						</div>
						<div class="form-group text-center col-12 col-lg">
							<label for="precio">Precio</label>
							<input type="text" name="precio" id="precio" class="form-control" value="{{ $variante->precio }}">
						</div>
						<div class="form-group text-center col-12 col-lg">
							<label for="descuento">Descuento</label>
							<input type="text" name="descuento" id="descuento" class="form-control" value="{{ $variante->descuento }}">
						</div>
					</div>
					<div class="form-group text-center">
						<label for="descripcion">Descripción</label>
						<textarea name="descripcion" id="descripcion" rows="10" class="texteditor form-control" style="resize:none;">{{$variante->descripcion}}</textarea>
					</div>
					<hr>
					<div class="card-title h5 text-center">Medidas del Envío</div>
					<div class=" text-center">
						<div class="row mx-auto">
							<div class="col-12 col-lg form-group">
								<label for="tipo_envio"> Tipo de envío</label>
								<select name="tipo_envio" id="tipo_envio" class="form-control">
									<option @if ($variante->tipo_envio == 'envelope') selected @endif value="envelope">Sobre</option>
									<option @if ($variante->tipo_envio == 'box') selected @endif value="box">Paquete</option>
									<option @if ($variante->tipo_envio == 'pallet') selected @endif value="pallet">Tarima</option>
									<option @if ($variante->tipo_envio == 'full_truck_load') selected @endif value="full_truck_load">Camión</option>
								</select>
							</div>
							<div class="col-12 col-lg form-group">
								<label for="">Peso</label>
								<div class="input-group mb-2 mr-sm-2">
									<input type="text" class="form-control" id="peso" name="peso" value="{{ $variante->peso }}" placeholder="Peso">
									<div class="input-group-append">
										<div class="input-group-text">
											KG
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mx-auto">
							<div class="col-12 col-lg-4 form-group">
								<label for="largo">Largo</label>
								<div class="input-group mb-2 mr-sm-2">
									<input type="text" class="form-control" id="largo" name="largo" value="{{ $variante->largo }}" placeholder="Largo">
									<div class="input-group-append">
										<div class="input-group-text">
											cm
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4 form-group">
								<label for="ancho">Ancho</label>
								<div class="input-group mb-2 mr-sm-2">
									<input type="text" class="form-control" id="ancho" name="ancho" value="{{ $variante->ancho }}" placeholder="Peso">
									<div class="input-group-append">
										<div class="input-group-text">
											cm
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4 form-group">
								<label for="alto">Alto</label>
								<div class="input-group mb-2 mr-sm-2">
									<input type="text" class="form-control" id="alto" name="alto" value="{{ $variante->alto }}" placeholder="Peso">
									<div class="input-group-append">
										<div class="input-group-text">
											cm
										</div>
									</div>
								</div>
							</div>
							{{-- <div class="col-12 col-lg-4 form-group d-flex align-items-end">
								Peso Volumétrico: KG
							</div> --}}
						</div>
					</div>

					@method('put')
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

@endsection
@section('jsLibExtras2')
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {

		});
	</script>
@endsection
