@extends('layouts.admin')

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Meta Datos</h5>
					<div class="form-group">
						<label for="title"> Título del sitio </label>
						<input type="text" class="form-control editarajax" id="title" name="title" data-id="{{$data->id}}" data-table="configuracion" data-campo="title"  value="{{ $data->title }}">
					</div>
					<div class="form-group">
						<label for="description"> Descripción del sitio</label>
						<textarea class="form-control editarajax" id="description" name="description" rows="2" data-id="{{$data->id}}" data-table="configuracion" data-campo="description"  style="resize:none;">{{ $data->description }}</textarea>
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">
						<label class="" for="banco">Datos para depósito</label>
					</h5>
					<div class="form-group">
						<textarea class="form-control editarajax" id="banco" name="banco" rows="6" data-id="{{$data->id}}" data-table="configuracion" data-campo="banco"  style="resize:none;">{{ $data->banco }}</textarea>
					</div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Impuestos</h5>
					<div class="form-group">
						<label for="iva">IVA</label>
						<input type="text" class="form-control editarajax" id="iva" name="iva" data-id="{{$data->id}}" data-table="configuracion" data-campo="iva" value="{{ $data->iva }}">
					</div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Cuenta Paypal</h5>
					<div class="form-group">
						<label for="paypalemail">Email</label>
						<input type="text" class="form-control editarajax" id="paypalemail" name="paypalemail" data-id="{{$data->id}}" data-table="configuracion" data-campo="paypalemail"  value="{{ $data->paypalemail }}">
					</div>
				</div>
			</div>
		</div> --}}

	</div>

@endsection

@section('jsLibExtras2')
@endsection
