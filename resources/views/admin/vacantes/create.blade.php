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
		<a href="{{ route('vacante.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="col-12  mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{route('vacante.store')}}" method="post">
					@csrf
					<div class="row text-center">
						<div class="col-md-6 form-group">
							<label for="titulo">Titulo</label>
							<input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
							
						</div>
						<div class="col-md-6 form-group">
							<label for="subtitulo">subtitulo</label>
							<input type="text" name="subtitulo" id="subtitulo" class="form-control" value="{{ old('subtitulo') }}" required>
							
						</div>
					</div>
					<div class="form-group text-center">
						<label for="oferta">Descripción oferta</label>
						<textarea name="oferta" id="oferta" rows="10" class="texteditor form-control" style="resize:none;">{{old('oferta')}}</textarea>
					</div>
					<hr>
					<div class="col-md-12 form-group">
						<label for="requisitos">Requisitos : <small class="text-muted">Separa los requisitos con pinto y coma " ; "</small></label>
						<input type="text" name="requisitos" id="requisitos" class="form-control" placeholder=" ejemplo1; ejemplo2; ejemplo3" value="{{ old('requisitos') }}" required>
						
					</div>
					<hr>
					<div class="row text-center">
						<div class="col-md-6 form-group">
							<label for="vacantesdis">Vacantes disponibles</label>
							<input type="text" name="vacantesdis" id="vacantesdis" placeholder="0" class="form-control" value="{{ old('vacantesdis') }}" required>
							
						</div>
						<div class="col-md-6 form-group">
							<label for="salario">Salario</label>
							<input type="text" name="salario" id="salario" placeholder="$000 a $0000 libres" class="form-control" value="{{ old('salario') }}" required>
							
						</div>
						</div>
					<hr>
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
