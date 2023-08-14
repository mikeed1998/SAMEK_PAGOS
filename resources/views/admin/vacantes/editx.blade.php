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
		<a href="{{ route('productos.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="col-12  mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{route('productos.update',$product->id)}}" method="post">
					@csrf
					@method('put')
					<div class="row text-center">
						{{-- <div class="col-md">
							<label for="clave">SKU</label>
							<input type="text" name="clave" id="clave" class="form-control" value="{{ old('clave') }}" required>
						</div> --}}
						<div class="col-md form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" value="{{ $product->nombre }}" required>
						</div>
					{{-- </div>
					<div class="form-group row text-center"> --}}

						<div class="col-md form-group">
							<label for="categoria">Categoria</label>
							<select name="categoria" id="categoria" class="custom-select">
								<option disabled selected>Seleccionar Categoria</option>
								@foreach ($categParent as $parent)
									<optgroup label="{{$parent->nombre}}">
										@foreach ($categAll as $cat)
											@if ($cat->subcats )
												@if ($parent->id == $cat->parent )
													<optgroup class="sub" label="&nbsp;&nbsp;{{ $cat->nombre }}">
														{{-- <option value="{{$cat->id}}">{{ $cat->nombre }}</option> --}}
														@foreach ($categAll as $cat2)
															@if ($cat->id == $cat2->parent )
																<option @if ($product->categoria == $cat2->id) selected @endif value="{{$cat2->id}}">&nbsp;{{ $cat2->nombre }}</option>
															@endif
														@endforeach
													</optgroup>
												@endif
											@else
												@if ( $parent->id == $cat->parent )
														<option @if ($product->categoria == $cat2->id) selected @endif value="{{$cat->id}}">{{ $cat->nombre }}</option>
												@endif
											@endif
											{{-- @if ($parent->id == $cat->parent )
												<optgroup class="sub" label="&nbsp;&nbsp;{{ $cat->nombre }}">
													@foreach ($categAll as $cat2)
														@if ($cat->id == $cat2->parent )
															<option value="{{$cat2->id}}">&nbsp;{{ $cat2->nombre }}</option>
														@endif
													@endforeach
												</optgroup>
											@endif --}}
										@endforeach
									</optgroup>
								@endforeach
							</select>
						</div>
						<div class="col-md form-group">
							<label for="marca">Marca</label>
							<select name="marca" id="marca" class="custom-select">
								<option disabled selected>Seleccionar Marca</option>
								@foreach ($marcas as $marca)
									<option  @if ($product->marca == $marca->id) selected @endif value="{{ $marca->id}}">{{ $marca->titulo}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group text-center">
						<label for="descripcion">Descripción</label>
						<textarea name="descripcion" id="descripcion" rows="10" class="texteditor form-control" style="resize:none;">{{ $product->descripcion}}</textarea>
					</div>
					<hr>
					<div class="form-group">
						<div class="col-lg-12 ">
							<div class="row text-center">
								<div class="col-md">
									<label for="precio">Precio  <small class="text-muted">(Muestra, no sera el precio final)</small></label>
									<input type="text" name="precio" id="precio" class="form-control" value="{{ $product->precio }}">
								</div>
								{{-- <div class="col-md">
									<label for="descuento">Descuento <small class="text-muted">(Porcentaje)</small></label>
									<input type="text" name="descuento" id="descuento" class="form-control" placeholder="%"  value="{{ $product->descuento }}">
								</div> --}}
							</div>
						</div>
					</div>
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
