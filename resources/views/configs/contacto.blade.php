@extends('layouts.admin')

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Teléfonos</h5>
					<div class="form-group">
						<label for="telefono"> Teléfono fijo</label>
						<input type="text" class="form-control editarajax" id="telefono" name="telefono" data-id="{{$data->id}}" data-table="configuracion" data-campo="telefono"  value="{{ $data->telefono }}">
					</div>
					<div class="form-group">
						<label for="whatsapp"> Whatsapp </label>
						<input type="text" class="form-control editarajax" id="whatsapp" name="whatsapp" data-id="{{$data->id}}" data-table="configuracion" data-campo="whatsapp"  value="{{ $data->whatsapp }}">
					</div>
					{{-- <div class="form-group">
						<label for="whatsapp2"> Whatsapp 2</label>
						<input type="text" class="form-control editarajax" id="whatsapp2" name="whatsapp2" data-id="{{$data->id}}" data-table="configuracion" data-campo="whatsapp2"  value="{{ $data->whatsapp2 }}">
					</div> --}}
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Redes sociales</h5>
					<div class="form-group">
						<label for="fb"> Facebook</label>
						<input type="text" class="form-control editarajax" id="fb" name="fb" data-id="{{$data->id}}" data-table="configuracion" data-campo="facebook"  value="{{ $data->facebook }}">
					</div>
					<div class="form-group">
						<label for="ig"> Instagram</label>
						<input type="text" class="form-control editarajax" id="ig" name="ig" data-id="{{$data->id}}" data-table="configuracion" data-campo="instagram"  value="{{ $data->instagram }}">
					</div>
					<div class="form-group">
						<label for="yt"> YouTube </label>
						<input type="text" class="form-control editarajax" id="yt" name="yt" data-id="{{$data->id}}" data-table="configuracion" data-campo="youtube"  value="{{ $data->youtube }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Envío de correo</h5>
					<div class="form-group">
						<label for="destinatario">  Destinatario 1 </label>
						<input type="text" class="form-control editarajax" id="destinatario" name="destinatario" data-id="{{$data->id}}" data-table="configuracion" data-campo="destinatario"  value="{{ $data->destinatario }}">
					</div>
					<div class="form-group">
						<label for="destinatario2">  Destinatario 2 </label>
						<input type="text" class="form-control editarajax" id="destinatario2" name="destinatario2" data-id="{{$data->id}}" data-table="configuracion" data-campo="destinatario2"  value="{{ $data->destinatario2 }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-center">Mapa</h5>
					<div class="form-group">
						<label for="mapa">  URL de Mapa </label>
						<input type="text" class="form-control editarajax" id="mapa" name="mapa" data-id="{{$data->id}}" data-table="configuracion" data-campo="mapa"  value="{{ $data->mapa }}">
					</div>
					<div class="form-group">
						<label for="direccion">  Dirección </label>
						<textarea rows="3" style="resize:none;" class="form-control editarajax" id="direccion" name="direccion" data-id="{{$data->id}}" data-table="configuracion" data-campo="direccion">{{ $data->direccion }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Autentificación</h5>
					<div class="form-group">
						<label for="remitente"> Remitente</label>
						<input type="text" class="form-control editarajax" id="remitente" name="remitente" data-id="{{$data->id}}" data-table="configuracion" data-campo="remitente"  value="{{ $data->remitente }}">
					</div>
					<div class="form-group">
						<label for="remitentepass"> Contraseña</label>
						<input type="text" class="form-control editarajax" id="remitentepass" name="remitentepass" data-id="{{$data->id}}" data-table="configuracion" data-campo="remitentepass"  value="{{ $data->remitentepass }}">
					</div>
					<div class="form-group">
						<label for="remitentehost"> Servidor</label>
						<input type="text" class="form-control editarajax" id="remitentehost" name="remitentehost" data-id="{{$data->id}}" data-table="configuracion" data-campo="remitentehost"  value="{{ $data->remitentehost }}">
					</div>
					<div class="form-group">
						<label for="remitenteport"> Puerto</label>
						<input type="text" class="form-control editarajax" id="remitenteport" name="remitenteport" data-id="{{$data->id}}" data-table="configuracion" data-campo="remitenteport"  value="{{ $data->remitenteport }}">
					</div>
					<div class="form-group">
						<label for="remitenteseguridad">  Seguridad </label>
						<select class="form-control editarajax" id="remitenteseguridad" name="remitenteseguridad" data-id="{{$data->id}}" data-table="configuracion" data-campo="remitenteseguridad"  value="{{ $data->remitenteseguridad }}">
							<option value="ssl">SSL</option>
							<option value="tls">TLS</option>
							<option value="starttls">STARTTLS</option>
						</select>
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection

@section('jsLibExtras2')
<script type="text/javascript">

</script>
@endsection
